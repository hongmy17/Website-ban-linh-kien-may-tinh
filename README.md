# Hướng dẫn cài đặt dự án

## Mục lục

- [1. Clone dự án](#1-clone-dự-án)
- [2. Cài đặt thư viện](#2-cài-đặt-thư-viện)
- [3. Chạy dự án](#3-chạy-dự-án)

## 1. Clone dự án

```php
git clone https://github.com/hongmy17/Website-ban-linh-kien-may-tinh.git
```

## 2. Cài đặt thư viện

```php
composer install
```

Nếu lỗi có thể là do chưa cài composer. Cài đặt [tại đây](https://getcomposer.org/download/)

Mở termial mới và kiểm tra bằng lệnh:

```php
composer -V
```

Nếu cài đặt thành công, bạn sẽ thấy kết quả tương tự:

```php
Composer version 2.x.x 2024-xx-xx
```

## 3. Chạy dự án

```php
php -S 127.0.0.1:8000
```
