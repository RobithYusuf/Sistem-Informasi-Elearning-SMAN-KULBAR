# Sistem E-Learning Laravel

Sistem E-Learning ini merupakan platform belajar online yang dibangun menggunakan framework Laravel. Platform ini dirancang untuk memudahkan pengajar dalam membuat materi kursus dan quiz, serta memungkinkan peserta didik untuk belajar secara efektif dari mana saja.

## Fitur

- **Autentikasi Pengguna**: Register, login, dan manajemen sesi pengguna.
- **Manajemen Kursus**: Pengajar dapat membuat, mengedit, dan menghapus kursus beserta materinya.
- **Quiz dan Evaluasi**: Fitur untuk membuat dan mengelola quiz serta menilai jawaban peserta didik.
- **Dashboard**: Dashboard khusus untuk pengajar dan peserta didik dengan fungsi dan informasi yang relevan.
- **Forum Diskusi**: Ruang untuk diskusi antara pengajar dan peserta didik untuk setiap kursus.

## Teknologi yang Digunakan

- Laravel 8
- MySQL
- Bootstrap 4 untuk frontend
- Vue.js (Opsional untuk SPA)

## Instalasi

Pastikan Anda sudah memiliki Composer dan npm terinstal di sistem Anda.

```bash
git clone https://github.com/usernamemu/sistem-elearning-laravel.git
cd sistem-elearning-laravel
composer install
npm install
npm run dev

cp .env.example .env
php artisan key:generate
