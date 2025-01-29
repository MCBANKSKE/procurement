<?php

namespace App\Filament\Resources\SalesDoneResource\Pages;

use App\Filament\Resources\SalesDoneResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSalesDones extends ListRecords
{
    protected static string $resource = SalesDoneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
