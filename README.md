# Laravel10 Filament3

```sh
# 用戶
php artisan make:filament-user

# 資源
php artisan make:filament-resource

# 使用軟刪除
php artisan make:filament-resource Customer --soft-deletes

# 檢視頁ViewRecord
php artisan make:filament-page ViewUser --resource=UserResource --type=ViewRecord

# 更新
composer update
php artisan filament:upgrade
```
