<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Stock;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationLabel = 'Products';
    protected static ?string $navigationGroup = 'Product Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                
                Forms\Components\Textarea::make('description')
                    ->nullable(),
                
                Forms\Components\TextInput::make('purchase_price')
                    ->required()
                    ->numeric()
                    ->minValue(0),
                
                Forms\Components\TextInput::make('selling_price')
                    ->required()
                    ->numeric()
                    ->minValue(0),
                
                Forms\Components\TextInput::make('quantity')
                    ->required()
                    ->numeric()
                    ->minValue(0),
                
                Forms\Components\Select::make('supplier_id')
                    ->label('Supplier')
                    ->options(Supplier::all()->pluck('name', 'id'))
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('purchase_price')
                    ->money('KES')
                    ->label('Purchase Price'),
                Tables\Columns\TextColumn::make('selling_price')
                    ->money('KES')
                    ->label('Selling Price'),
                Tables\Columns\TextColumn::make('stock_balance') // Use the accessor
                ->label('Stock Balance')
                ->sortable(),
                Tables\Columns\TextColumn::make('supplier.name')->label('Supplier'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
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
                Tables\Actions\Action::make('Export Excel')
                    ->action(fn () => Excel::download(new ProductsExport, 'products.xlsx'))
                    ->color('success'),
                Tables\Actions\Action::make('Export PDF')
                    ->action(fn () => redirect()->route('export.products', 'pdf'))
                    ->color('danger'),
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
            'index' => Pages\ListProducts::route('/'),
            //'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
