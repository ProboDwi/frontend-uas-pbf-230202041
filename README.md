# 🎓 UAS PBF - Frontend Laravel (230202041)

Ini adalah proyek frontend Laravel untuk Ujian Akhir Semester (UAS) mata kuliah **Pemrograman Berbasis Framework**.  
Proyek ini mencakup fitur dasar Laravel serta tambahan fitur **ekspor data ke PDF**.

---

## 🚀 Instalasi Project

### 💻 Clone atau Buat Project

> Pilih salah satu metode:

```bash
# Menggunakan composer (membuat project baru)
composer create-project laravel/laravel frontend_uas_230202041

# ATAU clone dari repository GitHub
git clone https://github.com/ProboDwi/frontend-uas-pbf-230202041.git
cd frontend-uas-pbf-230202041
```

### ⚙️ Menjalankan Project Laravel

Setelah Anda membuat atau meng-clone project, ikuti langkah berikut untuk menjalankan aplikasi Laravel:

```bash
composer install       # Menginstal semua dependensi
php artisan serve      # Menjalankan server Laravel
```

## ✨ Fitur Tambahan
### 📄 Ekspor Data ke PDF
Proyek ini memiliki fitur untuk mengekspor data ke format PDF menggunakan package barryvdh/laravel-dompdf.

📦 Instalasi Package PDF
Untuk mengaktifkan fitur PDF, jalankan perintah berikut:
```bash
composer require barryvdh/laravel-dompdf
```
