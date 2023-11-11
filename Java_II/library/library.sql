CREATE TABLE peminjaman (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    kode_anggota VARCHAR(8) NOT NULL,
    isbn_buku VARCHAR(8) NOT NULL,
    tanggal_pinjam DATE NOT NULL,
    tanggal_kembali DATE NOT NULL,
    selesai TINYINT
);

CREATE TABLE anggota (
   kode VARCHAR(8) NOT NULL PRIMARY KEY,
   nama VARCHAR(64) NOT NULL,
   alamat TEXT,
   no_telepon VARCHAR(13) NOT NULL,
   email VARCHAR(255) NOT NULL,

   UNIQUE(kode)
);

CREATE TABLE buku (
   isbn VARCHAR(18) NOT NULL PRIMARY KEY,
   judul TEXT NOT NULL,
   penulis VARCHAR(64) NOT NULL,
   penerbit VARCHAR(64) NOT NULL,
   jumlah_halaman INT,
   jumlah_eksemplar INT,
   tahun_terbit YEAR
);

ALTER TABLE peminjaman
ADD FOREIGN KEY (isbn_buku) REFERENCES buku(isbn)
ADD FOREIGN KEY (kode_anggota) REFERENCES anggota(kode);


--- PROCEDURE

DROP PROCEDURE IF EXISTS peminjaman_proc;

CREATE PROCEDURE peminjaman_proc(IN _anggota VARCHAR(8), IN _buku VARCHAR(8))
BEGIN
   SELECT CURDATE() INTO @tgl_pinjam;
   SELECT date_add(@tgl_pinjam, INTERVAL 7 DAY) INTO @tgl_kembali;
   INSERT INTO peminjaman (kode_anggota, isbn_buku, tanggal_pinjam, tanggal_kembali) VALUES
      (_anggota, _buku, @tgl_pinjam, @tgl_kembali);
   SELECT jumlah_eksemplar INTO @jml_buku FROM buku WHERE isbn = _buku;
   UPDATE buku SET jumlah_eksemplar = (@jml_buku - 1) WHERE isbn = _buku;
END;