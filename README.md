<h1 align="center">Mini Project Website Data Guru MK</h1>

<p align="center">
    <img src="https://img.shields.io/badge/PHP-8.3+-777BB4?style=flat&logo=php&logoColor=white" alt="PHP 8.3+">
    <img src="https://img.shields.io/badge/Laravel-13-FF2D20?style=flat&logo=laravel&logoColor=white" alt="Laravel 13">
    <img src="https://img.shields.io/badge/Composer-2.2%2B-885630?style=flat&logo=composer&logoColor=white" alt="Composer 2.2+">
    <img src="https://img.shields.io/badge/Tailwind-v4.0-06B6D4?style=flat&logo=tailwindcss&logoColor=white" alt="Tailwind CSS 4">
    <img src="https://img.shields.io/badge/Node.js-%26_NPM-339933?style=flat&logo=node.js&logoColor=white" alt="Node.js & NPM">
    <img src="https://img.shields.io/badge/License-MIT-blue?style=flat" alt="MIT License">
</p>

Sistem CRUD API yang cukup enteng, didesain secara murni hanya untuk menangani data guru (NIP, nama, email, dll.) dengan validasi server-side dan feedback instan, terus juga ada JSON API endpoint yang sudah built-in.

- Terinspirasi dari tampilan UI GitHub.
- Menampilkan direktori, menambahkan data guru, melihat detail, memperbarui profil, dan menghapus data.
- Oh iya ada fitur search juga loh.
- Validasi server-side request validation dengan redirect eror otomatis dan input sticky form.
- Notifikasi instan setelah user melakukan aksi.
- JSON API endpoint (`/api/guru`) untuk headless consumption.
- Database menggunakan SQLite (karena tidak disuruh pakai MySQL).
- Redirect dari `localhost:8000` ke `/guru`.

## Instalasi

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

   Kunjungi `http://localhost:8000` atau `http://127.0.0.1:8000` di browser.

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
