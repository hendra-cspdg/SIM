SIM
===

Smal Industry Manager - A simple application for managing small industry resources


Cara Instalasi
===

Cara memasang SIM di komputer anda:
1. Pasanglah peladen web Apache lengkap dengn PHP dan modul PHP berupa dan GD, mysqlnd.
2. Pasanglah peladen basisdata misalnya MySQL atau MariaDB
3. Buat basisdata baru dan pengguna basisdata baru. Tidak disarankan untuk menggunakan root sebagai pengguna
4. Buka conf.php dan sesuaikan dengan konfigurasi basisdata
5. sesuaikan nama direktori di peladen web anda. Misal: jika nantinya URL SIM menjadi http://localhost/sim , maka $homedir diisi "sim"
6. buka peramban anda dan akses alamat http://localhost/sim   (jika $homedir adalah "sim")
