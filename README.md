# Laravel10 Filament3

## 初始化

```sh
# 安裝composer套件
composer install

# 容器啓動
sail up -d

# 環境變數
cp .env.example .env
sail php artisan k:g

# 使用laravel-demo專案的資料庫
# 建立資料庫/檢查帳號權限
# 資料庫遷移
sail php artisan migrate

# 關閉
sail down
```

## 常用指令

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
