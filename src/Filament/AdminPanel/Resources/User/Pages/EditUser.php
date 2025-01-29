<?php

namespace BondarDe\Lox\Filament\AdminPanel\Resources\User\Pages;

use BondarDe\Lox\Filament\AdminPanel\Resources\User\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
