<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use App\Models\{Order, Customer};
use Filament\Forms\Components\Select;

class EditOrder extends EditRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function form(Form $form): Form
    {
        $customers = Customer::pluck('name', 'id');
        return $form
            ->schema([
                Select::make('customer_id')
                ->options($customers)
                ->required(),
                TextInput::make('order_num')
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
