<?php

namespace BondarDe\LaravelToolbox\Support\ModelList;

use BondarDe\LaravelToolbox\ModelList\ModelFilter;
use Illuminate\Database\Eloquent\Model;

class ModelListFilterStatsUtil
{
    public static function toFilterStats(
        string $model,
        array  $allFilters,
        array  $activeFilters,
        int    $hideCountsOver,
    ): array
    {
        $calculateCounts = true;
        $res = [];

        $flattenedFilters = array_merge([], ...$allFilters);

        foreach ($flattenedFilters as $filter => $dbFilter) {
            if (!$calculateCounts) {
                continue;
            }
            /** @var ModelFilter $dbFilter */
            /** @var Model $model */

            $query = $model::query();
            if ($filter === 'deleted') {
                $query = $model::query()->withTrashed();
            }

            $query->whereRaw($dbFilter->sql);

            $count = $query->count();
            $res[$filter] = [
                'count' => $count,
            ];

            if ($count >= $hideCountsOver) {
                $calculateCounts = false;
                continue;
            }

            self::addActiveFilters($res, $query, $filter, $activeFilters, $flattenedFilters);
        }

        return $res;
    }

    private static function addActiveFilters(
        &$res,
        $query,
        string $filter,
        array $activeFilters,
        array $allFilters,
    ): void
    {
        if (!in_array($filter, $activeFilters)) {
            $activeFilters[] = $filter;
        }

        sort($activeFilters);
        $key = ModelListUrlQueryUtil::toQueryString($activeFilters);

        if (isset($res[$key])) {
            return;
        }

        foreach ($activeFilters as $activeFilter) {
            $query->whereRaw($allFilters[$activeFilter]->sql);
        }

        $count = $query->count();
        $res[$key] = [
            'count' => $count,
        ];
    }
}
