SIM
===

Small Industry Manager - A simple application for managing small industry resources


Cara Instalasi
===

Cara memasang SIM di komputer anda:
*Pasanglah peladen web Apache lengkap dengn PHP dan modul PHP berupa dan GD, mysqlnd.
*Pasanglah peladen basisdata misalnya MySQL atau MariaDB
*Buat basisdata baru dan pengguna basisdata baru. Tidak disarankan untuk menggunakan root sebagai pengguna
*Buka conf.php dan sesuaikan dengan konfigurasi basisdata
*Sesuaikan nama direktori di peladen web anda. Misal: jika nantinya URL SIM menjadi http://localhost/sim , maka $homedir diisi "sim"
*buka peramban anda dan akses alamat http://localhost/sim   (jika $homedir adalah "sim")
