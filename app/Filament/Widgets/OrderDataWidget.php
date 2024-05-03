<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrderDataWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $lastOrder = Order::latest()->first();

        $price = number_format($lastOrder->price,2) . ' ' . $lastOrder->getCurrencySymbol();

        return [
            Stat::make('Latest Order', "$lastOrder->name, $price")
                ->icon('heroicon-o-currency-dollar'),
        ];
    }
}
