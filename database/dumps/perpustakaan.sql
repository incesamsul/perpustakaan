
INSERT INTO `buku` (`id_buku`, `id_kategori`, `judul`, `pengarang`, `tahun_terbit`, `penerbit`, `isbn`, `stok`, `lokasi`, `sinopsis`, `asal`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 1, 'Matematika dasar', 'rudi tabuti', 2012, 'ersif', '10239743628370', 3, 'AD4', '', 'pembelian', '633e9b707714a.jpg', '2022-10-05 17:10:08', '2022-10-07 06:06:40');


INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Matematika', '2022-10-05 17:09:38', '2022-10-05 17:09:38'),
(2, 'sejarah', '2022-10-05 17:09:44', '2022-10-05 17:09:44'),
(3, 'Teknologi', '2022-10-05 17:45:36', '2022-10-05 17:45:36'),
(4, 'Novel', '2022-10-05 17:45:41', '2022-10-05 17:45:41'),
(5, 'Masakan', '2022-10-05 17:45:50', '2022-10-05 17:45:50'),
(6, 'Olahraga', '2022-10-05 17:45:58', '2022-10-05 17:45:58');


INSERT INTO `member` (`id_member`, `id_user`, `nomor_induk`, `kelas`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
(4, 5, 1032936786, 'tkj 1', 'makassar', '04837437', '2022-10-07 05:48:05', '2022-10-07 05:48:05');


INSERT INTO `pengunjung` (`id_pengunjung`, `id_member`, `tgl_berkunjung`, `created_at`, `updated_at`) VALUES
(10, 4, '2022-10-07', '2022-10-07 07:16:20', '2022-10-07 07:16:20');


INSERT INTO `pinjam` (`id_pinjam`, `id_user`, `id_buku`, `jml_hari`, `jml_buku`, `status`, `tgl_pinjam`, `tgl_kembali`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 1, 2, 'selesai', '2022-10-01', '2022-10-07', '2022-10-07 06:06:46', '2022-10-07 06:46:39');


INSERT INTO `profile` (`id_profile`, `id_user`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nisn`, `alamat`, `no_telp`, `nama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pekerjaan_ibu`, `tahun_masuk`, `tahun_lulus`, `no_ijazah`, `no_skhun`, `created_at`, `updated_at`) VALUES
(1, 1, 'L', 'jl;', '2021-11-26', 'jlkjlj', 'ljlj', 'jl', 'jlj', 'ljl', 'jljl', 'jlkjl', 2000, 2000, 'jlkjlkj', 'lkjl', '2021-11-24 03:34:44', '2021-11-24 03:56:23');


INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', NULL, '$2y$10$N6nmGrHUtLAw5/5SlPZqEehn.S5KDNDFHf1yuW184mEw5zLWhVeLm', 'Administrator', '61b5cf20cb753.jpg', NULL, '2021-11-24 01:06:43', '2021-12-11 10:29:52'),
(5, 'sam', 'sam@mail.com', NULL, '$2y$10$JqDSaIM2frvGqB92t7vIXeoDoJYzsUK5MKv4cLn9pzHa2BlL0Q6em', 'anggota', '63402ee4cdfcd.jpg', NULL, '2022-10-07 05:48:05', '2022-10-07 05:51:32'),
(6, 'pustakawan', 'pustakawan@mail.com', NULL, '$2y$10$YEdrdLNSvtiGVNyL/zb8tuzaU7faiAsaBVSKhaE3TOBeCqw.QrDK.', 'pustakawan', '', NULL, '2022-10-07 06:48:19', '2022-10-07 06:48:19');


