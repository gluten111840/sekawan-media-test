# Nickelity
## Information System for Ordering Vehicles in Company

## Account
### Admin
Email: admin@example.net \
Password: password

### Penyetuju
Email: akseptor@example.net \
Password: password

## Database
MySQL Version: 8.0.30

## PHP
PHP Version: 8.1.6

## Framework
Laravel Version: 10.28.0

## Tutorial Penggunaan Aplikasi
### Pemasangan
1. Clone repositori ini dengan perintah: `git clone https://github.com/gluten111840/sekawan-media-test.git`
2. Masuk ke direktori buku-masjid: `$ cd sekawan-media-test`
3. Instal dependensi menggunakan: `$ composer install`
4. Salin berkas `.env.example` ke `.env`: `$ cp .env.example .env`
5. Generate kunci aplikasi: `$ php artisan key:generate`
6. Buat database MySQL untuk aplikasi ini.
7. Konfigurasi database dan pengaturan lainnya di berkas `.env`.
    ```
    APP_URL=http://localhost

    DB_DATABASE=homestead
    DB_USERNAME=homestead
    DB_PASSWORD=secret
    ```
8. Jalankan migrasi database: `$ php artisan migrate --seed`
9. Buat tautan penyimpanan: `$ php artisan storage:link`
10. Install kebutuhan untuk Laravel Breeze dengan Vite: `$ npm install`
11. Jalankan Vite: `$ npm run dev`
12. Jalankan aplikasi Laravel: `$ php artisan serve`
13. Buka web browser dengan alamat web: http://localhost:8000