# MARI Student Portal — Full Version

Paket ini merupakan pengembangan dari project Laravel 12 + Breeze yang sudah ada. Desain menggunakan charcoal, cream, dan lime.

## Fitur yang terintegrasi

1. Dashboard dengan ringkasan profil, notifikasi, status mahasiswa, dan aktivitas terbaru.
2. Edit profil dan upload foto.
3. Digital Student ID dengan QR Code.
4. Halaman verifikasi QR publik.
5. Security Center untuk mengganti password dengan pemeriksaan password lama.
6. Notification Center dengan tandai dibaca dan tandai semua dibaca.
7. Activity Timeline.
8. Light Mode dan Dark Mode.
9. Settings untuk tema dan visibilitas profil.

## Cara memasang pada project yang sudah ada

1. Buat backup folder project dan database terlebih dahulu.
2. Ekstrak ZIP ini ke folder project `simple-dashboard`, lalu pilih **replace/overwrite** untuk file yang sama. Jangan menghapus `.env` milikmu.
3. Pastikan `.env` tetap menggunakan database yang selama ini dipakai. Untuk konfigurasi MySQL lokal XAMPP, contoh umumnya:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nexus_auth_dashboard
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. Buka PowerShell pada folder project dan jalankan:

   ```powershell
   composer install
   php artisan optimize:clear
   php artisan migrate
   php artisan storage:link
   php artisan serve
   ```

5. Buka `http://127.0.0.1:8000` lalu login dengan akun yang sudah ada.

## Penting

- Jalankan `php artisan migrate`, **jangan** menjalankan `php artisan migrate:fresh` karena perintah itu menghapus tabel dan data.
- Migration baru hanya menambahkan kolom pada tabel users dan membuat tabel `user_notifications` serta `activity_logs`.
- `program_study` untuk pengguna yang sudah ada akan default ke `Teknik Mekatronika`; pengguna dapat mengubahnya melalui Edit Profile.
- QR Code dibuat pada browser menggunakan QRCode.js dari CDN. Browser perlu koneksi internet saat membuka kartu untuk memuat library QR.
- Halaman verifikasi QR dapat diakses tanpa login. Bila profil disetel Private, halaman hanya menampilkan status validitas kartu, bukan detail identitas.
- Foto profil disimpan pada `storage/app/public/profile-photos`; `php artisan storage:link` diperlukan agar foto dapat ditampilkan.
- Tidak ada file `.env` dalam paket. Pertahankan `.env` lokal dan jangan mengunggahnya ke GitHub.

## Pengujian yang disarankan

1. Login menggunakan username dan password lama.
2. Edit nama, program studi, dan foto; simpan lalu muat ulang.
3. Buka Digital Student ID, scan QR, dan pastikan halaman verifikasi muncul.
4. Ubah visibilitas profil ke Private lalu scan QR lagi.
5. Uji ganti password menggunakan password lama yang benar dan salah.
6. Buka Notification Center dan tandai notifikasi telah dibaca.
7. Periksa Activity Timeline setelah login, edit profil, dan mengganti password.
8. Ganti tema Light/Dark melalui Settings.
