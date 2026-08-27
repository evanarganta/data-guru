# Mini Project Website Data Guru MK

[![PHP 8.2+](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php&logoColor=white)](https://php.net)
[![Laravel 12](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=flat&logo=laravel&logoColor=white)](https://laravel.com)
[![Tailwind CSS 4](https://img.shields.io/badge/Tailwind-v4.0-06B6D4?style=flat&logo=tailwindcss&logoColor=white)](https://tailwindcss.com)

Sistem CRUD API yang cukup enteng, didesain secara murni hanya untuk menangani data guru (NIP, nama, email, dll.) dengan validasi server-side dan feedback instan, terus juga ada JSON API endpoint yang sudah built-in.

- Terinspirasi dari tampilan UI GitHub.
- Menampilkan direktori, menambahkan data guru, melihat detail, memperbarui profil, dan menghapus data.
- Oh iya ada fitur search juga loh.
- Validasi server-side request validation dengan redirect eror otomatis dan input sticky form.
- Notifikasi instan setelah user melakukan aksi.
- JSON API endpoint (`/api/guru`) untuk headless consumption.
- Database menggunakan SQLite (karena tidak disuruh pakai MySQL).
- Redirect dari `localhost:8000` ke `/guru`.

## Setup

### Prasyarat

- PHP 8.2+
- Composer
- Node.js (v18+) & npm

### Instalasi

1. **Clone repository**
   ```bash
   git clone https://github.com/evanarganta/data-guru-mk.git
   cd data-guru-mk
   ```

2. **Instal dependensi**
   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi .env**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database & migrasi**
   ```bash
   touch database/database.sqlite
   php artisan migrate
   ```

5. **Build aset frontend & mulai server**
   ```bash
   npm run build
   php artisan serve
   ```

   Kunjungi `http://localhost:8000` di browser.

## API Endpoint

| Method | Endpoint | Deskripsi |
| :--- | :--- | :--- |
| `GET` | `/api/guru` | Mengembalikan semua guru yang terdaftar dalam format JSON. |

#### Contoh Response

```json
{
  "status": true,
  "message": "Berhasil",
  "data": [
    {
      "id": 1,
      "nama": "Budi Santoso, S.Pd.",
      "nip": "198507102010011012",
      "mapel": "Rekayasa Perangkat Lunak",
      "email": "budi@smk.sch.id",
      "created_at": "2026-08-27T03:45:00.000000Z",
      "updated_at": "2026-08-27T03:45:00.000000Z"
    }
  ]
}
```

## Menjalankan Tests

Jalankan test suite dengan:

```bash
php artisan test
```
