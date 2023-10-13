<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // 群組名稱
    protected static ?string $navigationGroup = '內容管理';

    // 名稱
    protected static ?string $modelLabel = '廣告';

    // 複數名
    protected static ?string $pluralModelLabel = '廣告';

    // 主要顯示欄位
    protected static ?string $recordTitleAttribute = 'name';

    // 目錄順位,在navigationGroups也可以排列
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('名稱')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('link')
                    ->label('連結')
                    ->required()
                    ->url()
                    ->maxLength(255),

                SpatieMediaLibraryFileUpload::make('cover')
                    ->label('封面')
                    ->collection('cover')
                    ->conversion('thumb')
                    ->disk('minio-medialibrary'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('order_column', 'desc')
            ->paginated([10, 25, 50])
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID'),

                SpatieMediaLibraryImageColumn::make('cover')
                    ->label('封面')
                    ->collection('cover'),

                Tables\Columns\TextColumn::make('name')
                    ->label('名稱')
                    ->searchable(),

                // Tables\Columns\TextColumn::make('order_column')
                //     ->label('排序'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),

                Action::make('up')
                    ->action(fn (Model $record) => $record->moveOrderDown()),

                Action::make('down')
                    ->action(fn (Model $record) => $record->moveOrderUp()),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}
