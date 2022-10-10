

INSERT INTO `buku` (`id_buku`, `id_kategori`, `judul`, `pengarang`, `tahun_terbit`, `penerbit`, `isbn`, `stok`, `lokasi`, `sinopsis`, `asal`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 1, 'Matematika dasar', 'rudi tabuti', 2012, 'ersif', '10239743628370', 151, 'AD4', '', 'pembelian', '633e9b707714a.jpg', '2022-10-05 09:10:08', '2022-10-10 06:35:10'),
(2, 2, 'Sejarah', 'rudi tabuti', 2012, 'ersif', '10239743628370', 1, 'AD4', 'dxgxh', 'sumbangan', '63441a310ed93.jpg', '2022-10-10 05:12:17', '2022-10-10 06:35:10');


INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Matematika', '2022-10-05 09:09:38', '2022-10-05 09:09:38'),
(2, 'sejarah', '2022-10-05 09:09:44', '2022-10-05 09:09:44'),
(3, 'Teknologi', '2022-10-05 09:45:36', '2022-10-05 09:45:36'),
(4, 'Novel', '2022-10-05 09:45:41', '2022-10-05 09:45:41'),
(5, 'Masakan', '2022-10-05 09:45:50', '2022-10-05 09:45:50'),
(6, 'Olahraga', '2022-10-05 09:45:58', '2022-10-05 09:45:58');

INSERT INTO `member` (`id_member`, `id_user`, `nomor_induk`, `kelas`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
(4, 5, 1032936786, 'tkj 1', 'makassar', '04837437', '2022-10-06 21:48:05', '2022-10-06 21:48:05'),
(5, 7, 1032936787, 'X RPL 1', 'Jl. Ir. Sutami', '62895373885450', '2022-10-07 09:20:42', '2022-10-10 07:42:31');




INSERT INTO `pengunjung` (`id_pengunjung`, `id_member`, `tgl_berkunjung`, `created_at`, `updated_at`) VALUES
(10, 4, '2022-10-07', '2022-10-06 23:16:20', '2022-10-06 23:16:20'),
(11, 5, '2022-10-08', '2022-10-07 10:05:32', '2022-10-07 10:05:32');

INSERT INTO `pinjam` (`id_pinjam`, `id_user`, `id_buku`, `jml_hari`, `jml_buku`, `status`, `tgl_pinjam`, `tgl_kembali`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 1, 2, 'selesai', '2022-10-01', '2022-10-07', '2022-10-06 22:06:46', '2022-10-06 22:46:39'),
(2, 7, 1, 7, 2, 'selesai', '2022-10-10', '2022-10-10', '2022-10-07 09:23:08', '2022-10-10 05:59:23'),
(3, 7, 1, 1, 2, 'selesai', '2022-10-10', '2022-10-10', '2022-10-07 10:42:55', '2022-10-10 06:09:26'),
(4, 7, 1, 1, 2, 'selesai', '2022-10-10', '2022-10-10', '2022-10-07 11:07:08', '2022-10-10 06:09:26'),
(5, 7, 1, 5, 7, 'selesai', '2022-10-10', '2022-10-10', '2022-10-10 04:43:48', '2022-10-10 06:09:26'),
(6, 7, 1, 2, 3, 'selesai', '2022-10-10', '2022-10-10', '2022-10-10 05:13:37', '2022-10-10 06:09:26'),
(7, 7, 2, 2, 1, 'selesai', '2022-10-10', '2022-10-10', '2022-10-10 05:13:37', '2022-10-10 06:09:26'),
(8, 7, 2, 1, 3, 'selesai', '2022-10-10', '2022-10-10', '2022-10-10 05:30:15', '2022-10-10 06:09:26'),
(9, 7, 1, 1, 3, 'selesai', '2022-10-10', '2022-10-10', '2022-10-10 05:30:15', '2022-10-10 06:09:26'),
(10, 7, 1, 3, 3, 'selesai', '2022-10-10', '2022-10-10', '2022-10-10 05:42:03', '2022-10-10 06:09:26'),
(11, 7, 2, 2, 3, 'selesai', '2022-10-10', '2022-10-10', '2022-10-10 05:42:03', '2022-10-10 06:09:26'),
(12, 7, 1, 2, 2, 'selesai', '2022-10-10', '2022-10-10', '2022-10-10 06:12:15', '2022-10-10 06:15:27'),
(13, 7, 2, 1, 3, 'selesai', '2022-10-10', '2022-10-10', '2022-10-10 06:12:15', '2022-10-10 06:15:27'),
(14, 7, 2, 1, 1, 'selesai', '2022-10-10', '2022-10-10', '2022-10-10 06:18:59', '2022-10-10 06:29:34'),
(15, 7, 1, 1, 1, 'selesai', '2022-10-10', '2022-10-10', '2022-10-10 06:24:35', '2022-10-10 06:29:34'),
(16, 7, 1, 1, 1, 'selesai', '2022-10-10', '2022-10-10', '2022-10-10 06:32:36', '2022-10-10 06:35:10'),
(17, 7, 2, 1, 1, 'selesai', '2022-10-10', '2022-10-10', '2022-10-10 06:32:36', '2022-10-10 06:35:10');



INSERT INTO `profile` (`id_profile`, `id_user`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nisn`, `alamat`, `no_telp`, `nama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pekerjaan_ibu`, `tahun_masuk`, `tahun_lulus`, `no_ijazah`, `no_skhun`, `created_at`, `updated_at`) VALUES
(1, 1, 'L', 'jl;', '2021-11-26', 'jlkjlj', 'ljlj', 'jl', 'jlj', 'ljl', 'jljl', 'jlkjl', 2000, 2000, 'jlkjlkj', 'lkjl', '2021-11-23 19:34:44', '2021-11-23 19:56:23');


INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', NULL, '$2y$10$N6nmGrHUtLAw5/5SlPZqEehn.S5KDNDFHf1yuW184mEw5zLWhVeLm', 'Administrator', '61b5cf20cb753.jpg', NULL, '2021-11-23 17:06:43', '2021-12-11 02:29:52'),
(5, 'sam', 'sam@mail.com', NULL, '$2y$10$JqDSaIM2frvGqB92t7vIXeoDoJYzsUK5MKv4cLn9pzHa2BlL0Q6em', 'anggota', '63402ee4cdfcd.jpg', NULL, '2022-10-06 21:48:05', '2022-10-06 21:51:32'),
(6, 'pustakawan', 'pustakawan@mail.com', NULL, '$2y$10$YEdrdLNSvtiGVNyL/zb8tuzaU7faiAsaBVSKhaE3TOBeCqw.QrDK.', 'pustakawan', '', NULL, '2022-10-06 22:48:19', '2022-10-06 22:48:19'),
(7, 'Ratna', 'ratnajalil@gmail.com', NULL, '$2y$10$nx8qwuB/N9KMy8nwgsjYMeUjT38KTL.XAEXCQo3p83h2ioZm1Htgy', 'anggota', '', NULL, '2022-10-07 09:20:42', '2022-10-10 07:42:31');

