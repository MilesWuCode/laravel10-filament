<?php

namespace App\Providers\Filament;

use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('') // 網址加path
            ->login() // 登入功能
            ->registration() // 註冊功能
            ->passwordReset() // 重置密碼功能
            ->emailVerification() // 信箱驗證功能
            ->profile() // 個人修改功能
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class, // 管理員狀態
                Widgets\FilamentInfoWidget::class, // 文件
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            // 外掛
            ->plugin(FilamentSpatieRolesPermissionsPlugin::make())
            // 目錄
            ->navigation()
            // 目錄收合
            ->sidebarCollapsibleOnDesktop()
            // 群組收合開關顯示
            ->collapsibleNavigationGroups()
            // 註冊群組
            ->navigationGroups([
                NavigationGroup::make()
                    ->label('內容管理')
                    // 圖示,若群組有icon就子項不可設定,若子項有icon群組不可設定
                    ->icon('heroicon-o-rectangle-stack'),

                NavigationGroup::make()
                    ->label('會員管理')
                    ->icon('heroicon-o-rectangle-stack'),

                NavigationGroup::make()
                    ->label('系統')
                    ->icon('heroicon-o-rectangle-stack'),

            ])
            ->navigationItems([
                NavigationItem::make('角色')
                    ->url('/roles', shouldOpenInNewTab: false)
                    // 圖示,若群組有icon就子項不可設定,若子項有icon群組不可設定
                    // ->icon('heroicon-o-cog-6-tooth')
                    ->group('系統')
                    ->sort(2),
                // 權限
                // ->visible(fn(): bool => auth()->user()->can('view-analytics'))
                // 或
                // ->hidden(fn(): bool => ! auth()->user()->can('view-analytics')),

                NavigationItem::make('權限')
                    ->url('/permissions', shouldOpenInNewTab: false)
                    // 圖示,若群組有icon就子項不可設定,若子項有icon群組不可設定
                    // ->icon('heroicon-o-cog-6-tooth')
                    ->group('系統')
                    ->sort(3),
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
