CREATE DATABASE `asah_otak`;

CREATE TABLE master_kata (
    id int(11) NOT NULL AUTO_INCREMENT,
    kata varchar(255),
    clue varchar(255),
    PRIMARY KEY (id)
);

CREATE TABLE point_game (
    id_point int(11) NOT NULL AUTO_INCREMENT,
    nama_user varchar(255),
    total_point int(20),
     PRIMARY KEY (id_point)
)

--isi data master kata
INSERT INTO master_kata (kata, clue) VALUE ("PENSIL", "Aku digunakan untuk menulis di atas kertas?");
INSERT INTO master_kata (kata, clue) VALUE ("TELEVISI", "Aku menampilkan gambar bergerak dan suara untuk hiburan?");
INSERT INTO master_kata (kata, clue) VALUE ("MEJA", "Aku sering digunakan sebagai tempat menulis atau meletakkan barang?");
INSERT INTO master_kata (kata, clue) VALUE ("SEPATU", "Aku dipakai di kaki untuk melindungi saat berjalan?");
INSERT INTO master_kata (kata, clue) VALUE ("KOMPUTER", "Aku alat elektronik yang digunakan untuk mengetik, menghitung, dan browsing?");
INSERT INTO master_kata (kata, clue) VALUE ("KULKAS", "Aku digunakan untuk menjaga makanan tetap dingin?");
INSERT INTO master_kata (kata, clue) VALUE ("JAM", "Aku menunjukkan waktu?");
INSERT INTO master_kata (kata, clue) VALUE ("PINTU", "Aku bisa dibuka dan ditutup untuk masuk atau keluar dari ruangan?");
INSERT INTO master_kata (kata, clue) VALUE ("MOBIL", "Aku alat transportasi yang berjalan di jalan raya dengan roda?");
INSERT INTO master_kata (kata, clue) VALUE ("TELEPON", "Aku alat yang digunakan untuk berbicara dengan seseorang yang jauh?");