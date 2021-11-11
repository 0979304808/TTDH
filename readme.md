## Bước 1: 
git clone https://github.com/0979304808/TTDH.git

## Bước 2: 
cd TTDH

## Bước 3:
composer install

## Bước 4: 
cp .env.example .env

## Bước 5:
php artisan key:generate

## Bước 6:
config lại database trong file .env

## Bước 7:
php artisan migrate

## Bước 8:
php artisan db:seed

chạy xong sẽ login với tài khoản:
admin@gmail.com
12345678

## Bước 9:
Crawl data báo trên vnexpress

php artisan scraper:vnexpress

!!! Chúc các bạn thành công.
