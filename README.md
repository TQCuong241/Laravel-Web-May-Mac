<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Hướng dẫn chạy ứng dụng:
## I. Chuẩn bị môi trường
Trước khi bắt đầu, hãy đảm bảo bạn đã cài đặt các công cụ cần thiết:

PHP: Đảm bảo bạn đang sử dụng phiên bản PHP tương thích với dự án này (PHP 8.2)

Composer: Trình quản lý gói cho PHP. Bạn có thể tải xuống từ getcomposer.org.

Node.js & npm (hoặc Yarn): Cần thiết để biên dịch các tài nguyên frontend (CSS/JavaScript) của dự án.
## II.Cách Run:

### 1. Cài đặt các thư viện (Dependencies):

```
composer install
npm install
```

### 2. Tạo và cấu hình tệp .env:

```
cp .env.example .env
php artisan key:generate
```

### 3. Chạy Migrations Cơ sở dữ liệu:

```
php artisan migrate
```

### 4. Thiết lập liên kết storage (Symlink):

 Trên Windows:

```
rmdir public\storage
```

Trên Linux/macOS:

```
rm public/storage
```

Tạo liên kết mới:
```
php artisan storage:link
```

### 5. Biên dịch tài nguyên Frontend:

```
npm run dev
```

### 6. Run Code:

```
php artisan serve
```

---
*Được phát triển với ❤️ bởi Quang Cường*