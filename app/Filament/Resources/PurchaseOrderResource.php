<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PurchaseOrderResource\Pages;
use App\Filament\Resources\PurchaseOrderResource\RelationManagers;
use App\Models\PurchaseOrder;
use App\Models\Stock;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PurchaseOrderResource extends Resource
{
    protected static ?string $model = PurchaseOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationLabel = 'Purchase Orders';
    protected static ?string $navigationGroup = 'Purchase Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('product_id')
                    ->label('Product')
                    ->options(Product::all()->pluck('name', 'id'))
                    ->required(),

                Forms\Components\TextInput::make('quantity')
                    ->required()
                    ->numeric()
                    ->minValue(1),

                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->helperText('Price at the time of purchase order'),

                Forms\Components\Select::make('status')
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
                Tables\Columns\TextColumn::make('product.name')->label('Product'),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('price')->money('KES'),
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
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                //
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
                        // Update the status to 'completed'
                        $record->update(['status' => 'completed']);

                        // Create a stock entry for completed order
                        Stock::create([
                            'product_id' => $record->product_id,
                            'quantity' => $record->quantity,
                            'type' => 'in',  // Type of stock movement (inbound)
                            'price' => $record->price,  // Price at the time of stock movement
                            'stock_balance' => Stock::updateStockBalance($record->product_id, $record->quantity), // Get new balance
                        ]);
                    }),

                Tables\Actions\Action::make('cancel')
                    ->label('Cancel')
                   // ->icon('heroicon-o-x')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->visible(fn ($record) => $record->status === 'pending')
                    ->action(fn ($record) => $record->update(['status' => 'cancelled'])),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
             ->headerActions([
                    Tables\Actions\Action::make('Export Purchases Excel')
                        ->url(route('export.purchases', ['format' => 'excel']))
                        //->icon('heroicon-o-download')
                        ->color('success')
                        ->label('Export Purchases Excel'),

                    Tables\Actions\Action::make('Export Purchases PDF')
                        ->url(route('export.purchases', ['format' => 'pdf']))
                       // ->icon('heroicon-o-download')
                        ->color('primary')
                        ->label('Export Purchases PDF'),
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
            'index' => Pages\ListPurchaseOrders::route('/'),
            //'create' => Pages\CreatePurchaseOrder::route('/create'),
            'edit' => Pages\EditPurchaseOrder::route('/{record}/edit'),
        ];
    }
}
