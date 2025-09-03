<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TransactionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Transaksi')
                    ->description('Informasi lengkap mengenai transaksi')
                    ->schema([
                        TextEntry::make('user.name')
                            ->label('User'),

                        TextEntry::make('date')
                            ->label('Tanggal')
                            ->date(),

                        TextEntry::make('type')
                            ->label('Jenis')
                            ->badge() 
                            ->colors([
                                'success' => 'income',
                                'danger' => 'expense',
                            ]),

                        TextEntry::make('category.name')
                            ->label('Kategori')
                            ->badge()
                            ->color('info'),

                        TextEntry::make('amount')
                            ->label('Nominal')
                            ->money('IDR', true), 
                    ])
                    ->columns(2),

                Section::make('Meta Data')
                    ->description('Informasi sistem')
                    ->collapsed()
                    ->schema([
                        TextEntry::make('created_at')
                            ->label('Dibuat')
                            ->dateTime(),

                        TextEntry::make('updated_at')
                            ->label('Diperbarui')
                            ->dateTime(),
                    ])
                    ->columns(2),
            ]);
    }
}
