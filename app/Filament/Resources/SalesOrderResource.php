<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SalesOrderResource\Pages;
use App\Filament\Resources\SalesOrderResource\RelationManagers;
use App\Models\SalesOrder;
use App\Models\SalesDone;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SalesOrderResource extends Resource
{
    protected static ?string $model = SalesOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationGroup = 'Sales';
    protected static ?string $navigationLabel = 'Sales Orders';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('product_id')
                    ->label('Product')
                    ->relationship('product', 'name')
                    ->required(),
                Forms\Components\TextInput::make('quantity')
                    ->label('Quantity')
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->label('Price')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('total_amount')
                    ->label('Total Amount')
                    ->disabled(),
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->default('pending')
                    ->required(),
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
                Tables\Columns\TextColumn::make('status')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                     default => ucfirst($state),
                    })
                    
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'pending' => 'warning',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('complete')
                    ->label('Complete')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn ($record) => $record->status === 'pending')
                    ->action(function ($record) {
                        // Mark order as completed
                        $record->update(['status' => 'completed']);

                        // Create corresponding SalesDone record
                        SalesDone::create([
                            'product_id' => $record->product_id,
                            'quantity' => $record->quantity,
                            'price' => $record->price,
                            'total_amount' => $record->quantity * $record->price,
                            'sale_type' => 'order',
                        ]);
                    }),
            
            Tables\Actions\Action::make('cancel')
                ->label('Cancel')
                //->icon('heroicon-o-x')
                ->color('danger')
                ->requiresConfirmation()
                ->visible(fn ($record) => $record->status === 'pending')
                ->action(fn ($record) => $record->update(['status' => 'cancelled'])),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListSalesOrders::route('/'),
            //'create' => Pages\CreateSalesOrder::route('/create'),
            'edit' => Pages\EditSalesOrder::route('/{record}/edit'),
        ];
    }
}
