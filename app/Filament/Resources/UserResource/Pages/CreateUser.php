<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    // 資料新增前操作
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['password'] = Hash::make($data['password']);

        return $data;
    }

    // 定義返回路徑
    // public ?string $previousUrl = '/users';

    // Customizing redirects
    // 自訂返回頁,列表,
    protected function getRedirectUrl(): string
    {
        // 返回資源主頁
        return $this->getResource()::getUrl('index');

        // 定義返回路徑或返回資源主頁
        // return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    // Lifecycle hooks
    // (填入,驗證,新增)前後掛勾,events
    protected function beforeFill(): void
    {
        // Runs before the form fields are populated with their default values.

        // 發送通知
        Notification::make()
            ->info() // 提示方式(danger,info,success,warning),或是不使用
            ->title('Notification Title')
            ->body('Notification Body')
            ->seconds(6) // 6秒後關閉
            ->actions([
                Action::make('Go')
                    ->button()
                    ->url($this->getResource()::getUrl('view', ['record' => 999999999]), shouldOpenInNewTab: true),
            ])
            ->send();
    }

    protected function afterFill(): void
    {
        // Runs after the form fields are populated with their default values.
    }

    protected function beforeValidate(): void
    {
        // Runs before the form fields are validated when the form is submitted.
    }

    protected function afterValidate(): void
    {
        // Runs after the form fields are validated when the form is submitted.
    }

    protected function beforeCreate(): void
    {
        // Runs before the form fields are saved to the database.

        // 發送通知
        // Notification::make()
        //     ->warning() // 提示方式(danger,info,success,warning),或是不使用
        //     ->title('Notification Title')
        //     ->body('Notification Body')
        //     ->persistent() // 停留
        //     ->actions([
        //         Action::make('Go')
        //             ->button()
        //             ->url('/', shouldOpenInNewTab: true),
        //     ])
        //     ->send();

        // 立即停止
        // $this->halt();
    }

    protected function afterCreate(): void
    {
        // Runs after the form fields are saved to the database.
    }
}
