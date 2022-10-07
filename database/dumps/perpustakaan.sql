

INSERT INTO `buku` (`id_buku`, `id_kategori`, `judul`, `pengarang`, `tahun_terbit`, `penerbit`, `isbn`, `stok`, `lokasi`, `asal`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 1, 'Matematika dasar', 'rudi tabuti', 2012, 'ersif', '10239743628370', 5, 'AD4', 'pembelian', '633e9b707714a.jpg', '2022-10-06 01:10:08', '2022-10-06 01:11:58');

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Matematika', '2022-10-06 01:09:38', '2022-10-06 01:09:38'),
(2, 'sejarah', '2022-10-06 01:09:44', '2022-10-06 01:09:44'),
(3, 'Teknologi', '2022-10-06 01:45:36', '2022-10-06 01:45:36'),
(4, 'Novel', '2022-10-06 01:45:41', '2022-10-06 01:45:41'),
(5, 'Masakan', '2022-10-06 01:45:50', '2022-10-06 01:45:50'),
(6, 'Olahraga', '2022-10-06 01:45:58', '2022-10-06 01:45:58');



INSERT INTO `profile` (`id_profile`, `id_user`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nisn`, `alamat`, `no_telp`, `nama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pekerjaan_ibu`, `tahun_masuk`, `tahun_lulus`, `no_ijazah`, `no_skhun`, `created_at`, `updated_at`) VALUES
(1, 1, 'L', 'jl;', '2021-11-26', 'jlkjlj', 'ljlj', 'jl', 'jlj', 'ljl', 'jljl', 'jlkjl', 2000, 2000, 'jlkjlkj', 'lkjl', '2021-11-24 11:34:44', '2021-11-24 11:56:23'),
(2, 3, 'L', 'jl;', '2021-11-26', 'jlkjlj', 'ljlj', 'jl', 'jlj', 'ljl', 'jljl', 'jlkjl', 2000, 2000, 'jlkjlkj', 'lkjl', '2021-11-24 11:34:44', '2021-11-24 11:56:23'),
(3, 2, 'L', 'jl;', '2021-11-26', 'jlkjlj', 'ljlj', 'jl', 'jlj', 'ljl', 'jljl', 'jlkjl', 2000, 2000, 'jlkjlkj', 'lkjl', '2021-11-24 11:34:44', '2021-11-24 11:56:23');



INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', NULL, '$2y$10$N6nmGrHUtLAw5/5SlPZqEehn.S5KDNDFHf1yuW184mEw5zLWhVeLm', 'Administrator', '61b5cf20cb753.jpg', NULL, '2021-11-24 09:06:43', '2021-12-11 18:29:52');

