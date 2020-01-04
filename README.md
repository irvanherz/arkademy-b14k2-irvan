# Selamat Datang!

Ini adalah proyek yang dikerjakan untuk berpartisipasi dalam bootcamp **Arkademy - Batch 14 - Kloter 2**.  Dalam dokumentasi singkat ini akan dijelaskan isi berkas yang terdapat di dalamnya.

# Tentang Proyek Ini

Proyek ini terdiri dari 6 bagian yang dibuat berdasarkan soal yang harus dipecahkan. Format penamaan file dari kesemuanya itu adalah ***nomor soal.ekstensi***, contoh ***1.php***.  Namun, khusus soal nomor 6, seluruh source codenya dimasukkan ke dalam folder.

Semua jawaban pemecahan soal 1-5 ditulis dengan bahasa pemrograman PHP dan dapat dijalankan langsung dari terminal. Sedangkan untuk soal nomor 6 dirancang dengan beberapa bahasa. Berikut di bawah ini adalah stacks yang digunakan.
- MySQL
- PHP
- CodeIgniter 3
- JQuery
- Bootstrap

### 1.php

Soal pertama menunjukkan bagaimana memanajemen database dan bagaimaa jika diakses dengan REST API. 

Di sini kita tidak memakai database asli. Namun hanya sebuah kelas yang diberi nama 'Database'.
**`Database class`**:
*`->add($bio)`*: menambahkan sebuah objek `Biodata` ke dalam objek `Database`.
*`->search($name,$age)`*: mencari objek `Biodata` yang sudah pernah ditambahkan dengan `add()`.

Dengan mengimplementasikan metode yang ada, akhirnya **1.php** dapat diakses sebagai demo tentang bagaimana REST API bekerja. Misalnya, dari localhost, file bisa diakses dengan menyertakan parameter GET:
`/1.php?name=John Doe&age=21`

### 2.php
Bagian ini menunjukkan bagaimana cara memvalidasi input berupa email dan password.
>- `validate_email($e)`
>- `validate_password($p)`

Kedua fungsi ini akan mengembalikan `true` jika valid atau `false` jika tidak.
### 3.php
Saat merancang CSS, warna seringkali ditulis dalam bentuk kode heksadesimal. Formatnya berupa `#` diikuti 3 digit atau 6 digit angka heksadesimal. Kode ini menunjukkan salah satu metode untuk memvalidasi apakah input kode warna sudah benar.
>`validate_color($code)`

Fungsi di atas akan mengembalikan `true` jika valid atau `false` jika tidak.
### 4.php
Fungsi untuk memeriksa kata palindrom atau tidak dengan ketentuan:
- Ketika kata tersebut palindrom akan tetapi memiliki Sebuah Huruf KAPITAL maka dianggap *palindrom Kapital*
- Ketika kata tersebut palindrom akan tetapi memiliki Sebuah Huruf Kecil maka dianggap *palindrom kecil*
- Ketika kata tersebut palindrom akan tetapi memiliki Huruf kapital dan huruf kecil lebih dari satu maka dianggap *palindrom mix*
- Ketika Kata tersebut palindrom memiliki keseluruhan Huruf Kapital atau kecil maka dianggap *palindrom murni*
- Jika inputan memiliki angka/simbol maka angka/simbol tersebut tidak dibaca!

> `palindrom($str)`

Fungsi ini membutuhkan sebuah parameter berupa string yang akan diperiksa jenis plandromnya. Setelah eksekusi, string yang menerangkan jenis palindrom akan dicetak ke media output.

### 5.php
Bagian ke-5 ini menunjukkan bagaimana mencari dan menghitung karakter yang dipakai di sebuah kalimat.
>- `count_char($a,$b)`
>- `count_char_manual($a,$b)`

Kedua fungsi di atas memiliki kegunaan yang sama. Yang membedakannya adalah `count_char()` dibuat dengan memanfaatkan fungsi `substr_count()`. Sementara itu, `count_char_manual()` dibuat dengan metode kerja scara tidak langsung.

Parameter `a` adalah string yang ingin diperiksa dan `b` adalah karakter yang dipakai sebagai bahan identifikasi. Fungsi ini akan memberi return berupa jumlah karakter `b` dalam kalimat string `a`.

### Soal nomor 6
Soal ini dikerjakan banyak dengan PHP dengan framework CodeIgniter 3.
![Hasil pengerjaan soal nomor 6](/screenshot-6.png)
Untuk menjalankannya hasil jadi untuk soal nomor 6 (6c), berikut langkat yang harus dilakukan.
- Sebuah server dengan Apache (dengan mod_rewrite) PHP dan MySQL.
- Ubah pengaturan `$config['base_url']` dengan yang sesuai.
- Atur pengaturan database 
  >'hostname' => 'localhost',
	'username' => 'root',
	'password' => 'toor,
	'database' => 'arkademy',
- Buat .htaccess
  >RewriteEngine On
RewriteBase /
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]
