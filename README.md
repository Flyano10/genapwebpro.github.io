# Purchase Requisition App

Aplikasi CRUD Purchase Requisition berbasis Laravel 11.

## Fitur
- Tambah, edit, hapus, dan detail purchase requisition
- Desain modern dengan Bootstrap
- Validasi form dan notifikasi
- Kolom: Request Number, Date, Supplier, Requester, QC Check, Note, Status, PO Number, Type, Total Items

## Instalasi
1. Clone repo:
   ```
   git clone https://github.com/genapwebpro/genapwebpro.github.io.git
   ```
2. Masuk folder project:
   ```
   cd genapwebpro.github.io
   ```
3. Install dependency:
   ```
   composer install
   ```
4. Copy file env:
   ```
   cp .env.example .env
   ```
5. Atur database di file `.env`
6. Generate key:
   ```
   php artisan key:generate
   ```
7. Jalankan migrasi:
   ```
   php artisan migrate
   ```
8. Jalankan server:
   ```
   php artisan serve
   ```

## Author
- [genapwebpro](https://github.com/genapwebpro)
