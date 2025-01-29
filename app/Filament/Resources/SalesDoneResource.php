<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SalesDoneResource\Pages;
use App\Filament\Resources\SalesDoneResource\RelationManagers;
use App\Models\SalesDone;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Exports\SalesExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SalesDoneResource extends Resource
{
    protected static ?string $model = SalesDone::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationLabel = 'Sales Done';
    protected static ?string $navigationGroup = 'Sales';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('product_id')
                    ->label('Product')
                    ->options(Product::all()->pluck('name', 'id'))
                    ->required()
                    ->searchable(),

                Forms\Components\TextInput::make('quantity')
                    ->label('Quantity')
                    ->required()
                    ->numeric()
                    ->minValue(1),

                Forms\Components\TextInput::make('price')
                    ->label('Price')
                    ->required()
                    ->numeric()
                    ->minValue(0),

                Forms\Components\TextInput::make('total_amount')
                    ->disabled()
                    ->default(fn ($get) => $get('quantity') * $get('price')),

                Forms\Components\Select::make('sale_type')
                    ->options([
                        'direct' => 'Direct',
                        'order' => 'Order',
                    ])
                    ->default('direct'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product.name')
                    ->label('Product'),
                Tables\Columns\TextColumn::make('quantity')
                    ->label('Quantity'),
                Tables\Columns\TextColumn::make('price')
                    ->label('Price'),
                Tables\Columns\TextColumn::make('total_amount')
                    ->label('Total Amount'),
                Tables\Columns\TextColumn::make('sale_type')
                    ->label('Sales Type'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                Tables\Actions\Action::make('Export Sales Excel')
                    ->url(route('export.sales', ['format' => 'excel']))
                    //->icon('heroicon-o-download')
                    ->color('success')
                    ->label('Export Sales Excel'),

                Tables\Actions\Action::make('Export Sales PDF')
                    ->url(route('export.sales', ['format' => 'pdf']))
                    //->icon('heroicon-o-download')
                    ->color('primary')
                    ->label('Export Sales PDF'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSalesDones::route('/'),
            //'create' => Pages\CreateSalesDone::route('/create'),
            'edit' => Pages\EditSalesDone::route('/{record}/edit'),
        ];
    }
}
