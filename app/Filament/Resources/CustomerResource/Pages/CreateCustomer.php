<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use App\Models\Customer;

class CreateCustomer extends CreateRecord
{
    protected static string $resource = CustomerResource::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('email')->required()->unique(),
                TextInput::make('password')->required()
            ]);
    }
}
