-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Nov-2021 às 01:48
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `manager_users`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `addresses`
--

INSERT INTO `addresses` (`id`, `place`, `number`, `district`, `complement`, `zipcode`, `created_at`, `updated_at`) VALUES
(1, 'Rua dos Sonhos', 's/n', 'Meu Mundinho', 'sem complemento', '22001-001', '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(3, 'address', 'number', 'district', 'complemtnet', 'zipcode', '2021-11-01 02:59:39', '2021-11-01 02:59:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2021_10_30_150652_create_permissions_table', 2),
(16, '2021_10_30_151815_create_addresses_table', 2),
(17, '2014_10_12_000000_create_users_table', 3),
(18, '2021_10_30_150709_create_permission_users_table', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `permissions`
--

INSERT INTO `permissions` (`id`, `permission_name`, `permission_url`, `created_at`, `updated_at`) VALUES
(1, 'access', '/api/login', '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(2, 'access', '/api/register', '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(3, 'access', '/api/refresh', '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(4, 'access', '/api/logout', '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(5, 'access', '/api/permissions/find', '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(6, 'access', '/api/permissions/me', '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(7, 'access', '/api/permissions', '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(8, 'access', '/api/permissions/create', '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(9, 'access', '/api/permissions/update', '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(10, 'access', '/api/permissions/delete', '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(11, 'access', '/api/permissions/user/create', '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(12, 'access', '/api/permissions/user/delete', '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(13, 'access', '/api/users/find', '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(14, 'access', '/api/users/me', '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(15, 'access', '/api/users', '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(16, 'access', '/api/users/update', '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(17, 'access', '/api/users/delete', '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(18, 'access', '/api/addresses/find', '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(19, 'access', '/api/addresses/me', '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(20, 'access', '/api/addresses', '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(21, 'access', '/api/addresses/create', '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(22, 'access', '/api/addresses/update', '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(23, 'access', '/api/addresses/delete', '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(24, 'access', '/api/users/address/create', '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(27, 'access', '/api/blablabla', '2021-11-01 03:04:09', '2021-11-01 03:04:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permission_users`
--

CREATE TABLE `permission_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `permission_users`
--

INSERT INTO `permission_users` (`id`, `user_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(2, 1, 2, '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(3, 1, 3, '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(4, 1, 4, '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(5, 1, 5, '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(6, 1, 6, '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(7, 1, 7, '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(8, 1, 8, '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(9, 1, 9, '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(10, 1, 10, '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(11, 1, 11, '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(12, 1, 12, '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(13, 1, 13, '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(14, 1, 14, '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(15, 1, 15, '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(16, 1, 16, '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(17, 1, 17, '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(18, 1, 18, '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(19, 1, 19, '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(20, 1, 20, '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(21, 1, 21, '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(22, 1, 22, '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(23, 1, 23, '2021-11-01 02:04:34', '2021-11-01 02:04:34'),
(24, 1, 24, '2021-11-01 02:04:34', '2021-11-01 02:04:34');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CPF` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `CPF`, `address_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Markus Lima', 'adm@adm.com', NULL, NULL, 1, '2021-11-01 02:04:34', '$2y$10$tvAsIMiCIpymnuc5dbEugObQNr.hUWkLyorECtzgyiruGfRNbi/d6', 'capFSvT5Br', '2021-11-01 02:04:34', '2021-11-01 03:00:21'),
(3, 'Markus Lima', 'Markus@mkbits.com', NULL, NULL, NULL, NULL, '$2y$10$tvAsIMiCIpymnuc5dbEugObQNr.hUWkLyorECtzgyiruGfRNbi/d6', NULL, '2021-11-01 02:51:49', '2021-11-01 02:51:49');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `permission_users`
--
ALTER TABLE `permission_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_users_user_id_index` (`user_id`),
  ADD KEY `permission_users_permission_id_index` (`permission_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_address_id_index` (`address_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `permission_users`
--
ALTER TABLE `permission_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `permission_users`
--
ALTER TABLE `permission_users`
  ADD CONSTRAINT `permission_users_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
