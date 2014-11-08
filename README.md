SIM
===

Small Industry Manager - A simple application for managing small industry resources


Cara Instalasi
===

Cara memasang SIM di komputer anda:
* Pasanglah peladen web Apache lengkap dengn PHP dan modul PHP berupa GD(php-gd) dan mysqlnd)(php-mysqlnd).
* Pasanglah peladen basisdata MySQL atau MariaDB
* Buat basisdata baru dan pengguna basisdata baru. Tidak disarankan untuk menggunakan root sebagai pengguna
* Buka conf.php dan sesuaikan dengan konfigurasi basisdata
* Sesuaikan nama direktori di alamat web anda. Misal: jika nantinya URL SIM menjadi http://localhost/sim , maka $homedir diisi "sim". Jika tidak menggunakan direktori, misalnya http://sim.keripikbalado.com, $homedir dapat dikosongkan, $homedir=""
* Buka peramban anda dan akses alamat http://localhost/sim   (jika $homedir adalah "sim")