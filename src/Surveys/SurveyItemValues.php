<?php

namespace BondarDe\LaravelToolbox\Surveys;

use Bond211\Utils\Support\Arrays;
use Illuminate\Support\Str;

abstract class SurveyItemValues
{
    abstract public static function all(): array;

    private static function flatAll(): array
    {
        $res = [];
        $flattened = Arrays::flattenKeys(static::all());

        foreach ($flattened as $key => $value) {
            $parts = explode('.', $key);
            $key = last($parts);

            $res[$key] = $value;
        }

        return $res;
    }

    public static function keys(): array
    {
        return array_keys(self::flatAll());
    }

    public static function label(?string $key): string
    {
        if ($key === null) {
            return '—';
        }

        $all = self::flatAll();

        if (!isset($all[$key])) {
            return $key;
        }

        return $all[$key];
    }

    public static function matching(string $pattern): array
    {
        $res = [];

        foreach (static::all() as $key => $val) {
            if (!Str::is($pattern, $key)) {
                continue;
            }

            $res[$key] = $val;
        }

        return $res;
    }

    public static function without(array $missingOptions): array
    {
        $res = [];

        foreach (static::all() as $key => $val) {
            if (in_array($key, $missingOptions)) {
                continue;
            }

            $res[$key] = $val;
        }

        return $res;
    }
}
