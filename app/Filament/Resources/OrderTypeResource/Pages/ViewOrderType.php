<?php

namespace App\Filament\Resources\OrderTypeResource\Pages;

use App\Filament\Resources\OrderTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewOrderType extends ViewRecord
{
    protected static string $resource = OrderTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
