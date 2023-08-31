<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Hash;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    // 放置Actions在表單上方
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    // FormData填值前
    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Model使用$hidden就不需要清空,
        $data['password'] = '';

        return $data;
    }

    // FormData儲存前
    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (is_null($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        return $data;
    }

    // Customizing redirects
    // 自訂返回頁,列表,
    protected function getRedirectUrl(): string
    {
        // 返回資源主頁
        return $this->getResource()::getUrl('index');
    }

    // 顯示操作按鈕
    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            // Actions\ForceDeleteAction::make(),
            // Actions\RestoreAction::make(),
        ];
    }
}
