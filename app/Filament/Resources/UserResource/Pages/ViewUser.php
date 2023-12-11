<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('name'),

                TextEntry::make('provider')->hidden(fn (User $uesr): bool => ! $uesr->provider),

                TextEntry::make('provider_id')->hidden(fn (User $uesr): bool => ! $uesr->provider),

                SpatieMediaLibraryImageEntry::make('avatar')
                    ->collection('avatar')
                    // ->conversion('thumb') // 使用縮圖
                    ->disk('medialibrary'),
            ]);
    }
}
