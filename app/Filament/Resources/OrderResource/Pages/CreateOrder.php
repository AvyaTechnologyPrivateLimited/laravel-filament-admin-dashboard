<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use App\Models\{Order, Customer};

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    public function form(Form $form): Form
    {
        $customers = Customer::pluck('name', 'id');
        return $form
            ->schema([
                Select::make('customer_id')
                ->options($customers)
                ->required(),
                TextInput::make('order_num')
                ->default('ORD-' . time())
                ->readOnly()
                ->label('Order Number')
                ->readOnly(),
                Select::make('product_name')
                ->options(['T-Shirt'=>'T-Shirt', 'Shirt'=>'Shirt', 'Paint'=>'Paint', 'Watch'=>'Watch'])
                ->required(),
                TextInput::make('quantity')->numeric()->required(),
                TextInput::make('price')->numeric()->required()
            ]);
    }
}
