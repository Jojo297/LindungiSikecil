# Alat Pengembangan

 - Visual Studio Code
 - Laragon
 
 Module dalam laragon yang digunakan dalam tahap Implementasi :
 - PHP : Php version 8.2 atau versi lebih atasnya  
 - Apache : Apache version httpd-2.4.54 
 - Mysql : Mysql version 8.0.30 
 - Phpmyadmin : phpmyadmin ver 5.2.1  
 - Internet Browser (Microsoft Edge , Google Chrome , Firefox)

# Installasi

## A. Langkah – langkah penginstalan sistem
			
1. Install Git sesuai dengan sistem operasi anda di https://git-scm.com/ 
2. setelah penginstalan Git install Node.js di https://nodejs.org/ 
3. lalu install Composer di https://getcomposer.org/download/ 

4. setelah melakukan ke tiga penginstallan diatas selanjutnya clone repository

 

## B. Langkah – langkah clone repository

 1. Buka gitbash lalu ketik 
 ```bash
 cd c:\laragon\www
 ``` 
 2. Jika sudah ketik 
  ```bash
 git clone https://github.com/Jojo297/LindungiSikecil-2-.git 
 ```
 3. Lalu cek di folder c:\laragon\www jika sudah muncul folder dengan nama LindungiSiKecil-2- ketik di git bash 
 ```bash
 cd \LindungiSiKecil-2-
 ``` 
 4. Jika sudah masuk ke folder LindungiSiKecil-2- maka selanjutnya ketik 
 ```bash
 composer instal
 ``` 
 5. Jika sudah maka akan muncul folder dengan nama “vendor” di dalam folder LindungiSiKecil-2- 7 
 
 7. Jika folder sudah muncul selanjutnya ketik di Git bash 
```bash
 cp .env.example .env
 ```
  maka akan muncul file .env didalam folder LindungiSiKecil-2-
  
 8. Selanjutnya ketik di Git bash 
 ```bash
 npm install
 ``` 
 9. Lalu ketik di Git bash 
 ```bash
 npm install -D tailwindcss postcss autoprefixer 
 ```
  
 10. Setelah itu jalankan laragon dan buka phpmyadmin 
 11. Lalu import file dengan nama lsk.sql yang ada didalam folder “LindungiSiKecil-2- /db” 
 12. Jika sudah selanjutnya kita hubungkan ke database dengan cara buka file .env ubah “DB_DATABASE=laravel” menjadi 
```bash
“DB_DATABASE=lsk”
``` 
 14. Ketik 
```bash
code .
``` 
untuk membuka kode editor lalu buka terminal 
 
 15. Jika sudah maka run dengan mengetik 
```bash
php artisan serve
```
 lalu buka satu terminal lagi dan ketik
```bash
 npm run dev
 ```

