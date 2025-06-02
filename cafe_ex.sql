/*
 Navicat Premium Dump SQL

 Source Server         : mysql_Connection
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : cafe_ex

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 02/06/2025 17:32:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bookmark_kafe
-- ----------------------------
DROP TABLE IF EXISTS `bookmark_kafe`;
CREATE TABLE `bookmark_kafe`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kafe_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `bookmark_kafe_kafe_id_foreign`(`kafe_id` ASC) USING BTREE,
  INDEX `bookmark_kafe_user_id_foreign`(`user_id` ASC) USING BTREE,
  CONSTRAINT `bookmark_kafe_kafe_id_foreign` FOREIGN KEY (`kafe_id`) REFERENCES `kafe` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `bookmark_kafe_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bookmark_kafe
-- ----------------------------
INSERT INTO `bookmark_kafe` VALUES ('9f0e23c1-ca51-4b51-a174-cab6eeae730a', '9f0ca6b1-6e58-47b5-845a-1e70ffb4c8fd', 'fffdf2a3-6264-40c7-9692-eb2e21f4b159', NULL, '2025-06-02 02:19:43', '2025-06-02 02:19:43');
INSERT INTO `bookmark_kafe` VALUES ('9f0e3316-db6f-4758-918e-29d5067b5bf8', '9f0ca6b1-6e58-47b5-845a-1e70ffb4c8fd', '4b6204e2-44ae-4e27-8a55-fe995541c3ae', NULL, '2025-06-02 03:02:34', '2025-06-02 03:02:34');
INSERT INTO `bookmark_kafe` VALUES ('9f0e3345-fde1-4a42-9a29-4cac73f7f29f', '9f0ca6b2-4737-4411-9064-2f61f71df632', '4b6204e2-44ae-4e27-8a55-fe995541c3ae', NULL, '2025-06-02 03:03:05', '2025-06-02 03:03:05');

-- ----------------------------
-- Table structure for community
-- ----------------------------
DROP TABLE IF EXISTS `community`;
CREATE TABLE `community`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `mood` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `shared_menu_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `profile_image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `liked_by` json NULL,
  `like_count` int NOT NULL DEFAULT 0,
  `comment_count` int NOT NULL DEFAULT 0,
  `retweet_count` int NOT NULL DEFAULT 0,
  `view_count` int NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `community_user_id_index`(`user_id` ASC) USING BTREE,
  INDEX `community_username_index`(`username` ASC) USING BTREE,
  INDEX `community_created_at_index`(`created_at` ASC) USING BTREE,
  INDEX `community_like_count_index`(`like_count` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of community
-- ----------------------------

-- ----------------------------
-- Table structure for fasilitas
-- ----------------------------
DROP TABLE IF EXISTS `fasilitas`;
CREATE TABLE `fasilitas`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fasilitas
-- ----------------------------
INSERT INTO `fasilitas` VALUES ('26335aed-b006-46b5-9b93-64bca68314d7', 'Meeting', 'Ruang atau fasilitas untuk pertemuan dan meeting', NULL, NULL, NULL, NULL);
INSERT INTO `fasilitas` VALUES ('330ad64f-3fcb-41f0-8db3-74809c1ef1e1', 'Meja Outdoor', 'Area duduk di luar ruangan', NULL, NULL, NULL, NULL);
INSERT INTO `fasilitas` VALUES ('42c455c0-f344-4e62-b981-a7614f01a58e', 'Stop Kontak', 'Tersedia colokan listrik di setiap meja', NULL, NULL, NULL, NULL);
INSERT INTO `fasilitas` VALUES ('45d75138-38a3-4502-bee2-9d36101dbf15', 'AC', 'Pendingin ruangan untuk kenyamanan pengunjung', NULL, NULL, NULL, NULL);
INSERT INTO `fasilitas` VALUES ('737b10d7-a67d-42cb-9cd2-86d8fab55540', 'Cash', 'Menerima pembayaran tunai secara langsung', NULL, NULL, NULL, NULL);
INSERT INTO `fasilitas` VALUES ('777fba03-a393-4825-99c5-2c62d5afa209', 'Musholla', 'Tempat shalat yang nyaman', NULL, NULL, NULL, NULL);
INSERT INTO `fasilitas` VALUES ('7a26cdcc-4a03-493c-abae-8ce023e7275f', 'Area Kerja', 'Meja khusus untuk bekerja dengan colokan listrik', NULL, NULL, NULL, NULL);
INSERT INTO `fasilitas` VALUES ('89214313-4349-4660-af4e-08e0db693931', 'Cashless', 'Menerima pembayaran non-tunai seperti kartu atau aplikasi', NULL, NULL, NULL, NULL);
INSERT INTO `fasilitas` VALUES ('91d0045e-7379-44f6-8b72-0355d2b1b335', 'Ruang Merokok', 'Area khusus untuk merokok', NULL, NULL, NULL, NULL);
INSERT INTO `fasilitas` VALUES ('961594cc-b961-4a1d-b7a6-6c806c044f27', 'Toilet', 'Toilet bersih dengan fasilitas lengkap', NULL, NULL, NULL, NULL);
INSERT INTO `fasilitas` VALUES ('b90887fc-3f26-4cce-9ce1-965276bfe6be', 'Boardgame', 'Fasilitas permainan boardgame untuk pengunjung', NULL, NULL, NULL, NULL);
INSERT INTO `fasilitas` VALUES ('c543c7c3-58a2-4f9b-88aa-5198eaccf5b1', 'Parkir Luas', 'Area parkir yang luas dan aman', NULL, NULL, NULL, NULL);
INSERT INTO `fasilitas` VALUES ('c6111050-e43d-414a-8ace-85ec44a5d38a', 'Live Music', 'Hiburan musik langsung di akhir pekan', NULL, NULL, NULL, NULL);
INSERT INTO `fasilitas` VALUES ('cf313cc3-eff6-4f7d-8cfa-7a5ed5e832c6', 'Wi-Fi', 'Koneksi internet nirkabel berkecepatan tinggi', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for fasilitas_kafe
-- ----------------------------
DROP TABLE IF EXISTS `fasilitas_kafe`;
CREATE TABLE `fasilitas_kafe`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kafe_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fasilitas_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fasilitas_kafe_fasilitas_id_foreign`(`fasilitas_id` ASC) USING BTREE,
  INDEX `fasilitas_kafe_kafe_id_foreign`(`kafe_id` ASC) USING BTREE,
  CONSTRAINT `fasilitas_kafe_fasilitas_id_foreign` FOREIGN KEY (`fasilitas_id`) REFERENCES `fasilitas` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fasilitas_kafe_kafe_id_foreign` FOREIGN KEY (`kafe_id`) REFERENCES `kafe` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fasilitas_kafe
-- ----------------------------
INSERT INTO `fasilitas_kafe` VALUES ('8e212caf-0919-4ec9-946d-2a2c04b4bfee', '9f0ca778-dbe2-4236-b8d5-52e58322ab68', '42c455c0-f344-4e62-b981-a7614f01a58e', NULL, NULL, NULL);
INSERT INTO `fasilitas_kafe` VALUES ('e7fbc37e-9d16-47b8-8aed-495dc562d0cb', '9f0ca778-dbe2-4236-b8d5-52e58322ab68', '7a26cdcc-4a03-493c-abae-8ce023e7275f', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for gallery
-- ----------------------------
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kafe_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('main_content','menu_content','other') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `gallery_kafe_id_foreign`(`kafe_id` ASC) USING BTREE,
  CONSTRAINT `gallery_kafe_id_foreign` FOREIGN KEY (`kafe_id`) REFERENCES `kafe` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gallery
-- ----------------------------

-- ----------------------------
-- Table structure for genre
-- ----------------------------
DROP TABLE IF EXISTS `genre`;
CREATE TABLE `genre`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of genre
-- ----------------------------
INSERT INTO `genre` VALUES ('2897bfe1-11de-4af8-9bd8-d5cfb5b112a3', 'Coffee Specialty', NULL, NULL, NULL);
INSERT INTO `genre` VALUES ('4990e08f-02b9-48e1-b6bc-66e65838a9b1', 'Modern', NULL, NULL, NULL);
INSERT INTO `genre` VALUES ('58b459d8-701a-4614-8395-346e65cd7552', 'Retro', NULL, NULL, NULL);
INSERT INTO `genre` VALUES ('7467fb17-e322-4e06-bcbd-b4e5507af08d', 'Rooftop', NULL, NULL, NULL);
INSERT INTO `genre` VALUES ('871eee6c-07db-453f-8f3c-c9d5d8c3a647', 'View-Oriented', NULL, NULL, NULL);
INSERT INTO `genre` VALUES ('8725d300-1b0c-4e6a-81cc-d1eb167c1a1b', 'Nature', NULL, NULL, NULL);
INSERT INTO `genre` VALUES ('927298d9-afb5-4355-8296-471289741eb6', 'Jepang', NULL, NULL, NULL);
INSERT INTO `genre` VALUES ('a00985eb-83c3-49fd-b45d-903e34a5d76e', 'Tea House', NULL, NULL, NULL);
INSERT INTO `genre` VALUES ('a11e17c2-2e35-4396-858b-eb9498b7d9a8', 'Pet-Friendly', NULL, NULL, NULL);
INSERT INTO `genre` VALUES ('abe97ac3-8a22-4f9a-ac9b-3a2fc6ac5e9d', 'Keluarga', NULL, NULL, NULL);
INSERT INTO `genre` VALUES ('af022268-e4fc-43a9-a3b0-44731a9b5227', 'Co-Working Space', NULL, NULL, NULL);
INSERT INTO `genre` VALUES ('c7f04faf-b035-46d2-ba85-27fcbd8b5483', 'Outdoor', NULL, NULL, NULL);
INSERT INTO `genre` VALUES ('d007a5fd-11fc-45f8-8f1f-e2c827301cb6', 'Tradisional', NULL, NULL, NULL);
INSERT INTO `genre` VALUES ('fce48d48-05fa-4b73-83dc-b1777be9be6f', 'Industrial', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for genre_kafe
-- ----------------------------
DROP TABLE IF EXISTS `genre_kafe`;
CREATE TABLE `genre_kafe`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kafe_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `genre_kafe_kafe_id_foreign`(`kafe_id` ASC) USING BTREE,
  INDEX `genre_kafe_genre_id_foreign`(`genre_id` ASC) USING BTREE,
  CONSTRAINT `genre_kafe_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `genre_kafe_kafe_id_foreign` FOREIGN KEY (`kafe_id`) REFERENCES `kafe` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of genre_kafe
-- ----------------------------
INSERT INTO `genre_kafe` VALUES ('06747328-1213-4323-9efa-d63880593ee0', '9f0ca778-dbe2-4236-b8d5-52e58322ab68', '8725d300-1b0c-4e6a-81cc-d1eb167c1a1b', NULL, NULL, NULL);
INSERT INTO `genre_kafe` VALUES ('386b3c4f-2d82-44d6-85ee-50322b8c094e', 'fffdf2a3-6264-40c7-9692-eb2e21f4b159', 'af022268-e4fc-43a9-a3b0-44731a9b5227', NULL, NULL, NULL);
INSERT INTO `genre_kafe` VALUES ('535c7c32-b04c-446a-b5b9-c34d1ea5fef7', 'fffdf2a3-6264-40c7-9692-eb2e21f4b159', '4990e08f-02b9-48e1-b6bc-66e65838a9b1', NULL, NULL, NULL);
INSERT INTO `genre_kafe` VALUES ('a6392d29-f168-4779-b20a-e4840cc5c9db', '4b6204e2-44ae-4e27-8a55-fe995541c3ae', '58b459d8-701a-4614-8395-346e65cd7552', NULL, NULL, NULL);
INSERT INTO `genre_kafe` VALUES ('c72a5ab4-56c7-4d54-9965-b2358cb84e3e', '4b6204e2-44ae-4e27-8a55-fe995541c3ae', 'd007a5fd-11fc-45f8-8f1f-e2c827301cb6', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for kafe
-- ----------------------------
DROP TABLE IF EXISTS `kafe`;
CREATE TABLE `kafe`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `kafe_owner_id_foreign`(`owner_id` ASC) USING BTREE,
  CONSTRAINT `kafe_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `owner` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kafe
-- ----------------------------
INSERT INTO `kafe` VALUES ('4b6204e2-44ae-4e27-8a55-fe995541c3ae', NULL, 'Perasa Coffe Jember', 'Jl. Sumatra No.128, Tegal Boto Lor, Kabupaten, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68121', '085366567799', '-8.1697631', '113.6283861', '00:00:00', '23:59:00', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `kafe` VALUES ('8b7334bf-10cf-4d60-86db-4acda0cc5335', NULL, 'Omah Kopi', 'Jl. Rasamala No.62, Baratan, Kec. Patrang, Kabupaten Jember, Jawa Timur 68112', '085315863734', '-8.1346764', '113.6500488', '17:00:00', '00:00:00', '2025-06-01 08:34:11', '2025-06-01 08:38:23', '2025-06-01 08:38:23');
INSERT INTO `kafe` VALUES ('9f0ca778-dbe2-4236-b8d5-52e58322ab68', NULL, 'Kafe Nebu', 'Trunojoyo', '09876543', '1.230203', '23.40033', '09:00:00', '22:00:00', '2025-06-01 08:36:21', '2025-06-01 08:37:50', NULL);
INSERT INTO `kafe` VALUES ('fffdf2a3-6264-40c7-9692-eb2e21f4b159', NULL, 'Cuscuss Cafe Jember', 'Jl. Semeru, Tegal Boto Kidul, Sumbersari, Kec. Sumbersari, Kabupaten Jember, Jawa Timur', '082231308837', '-8.1766265', '113.6436995', '10:00:00', '03:00:00', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori
-- ----------------------------

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kafe_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` enum('tersedia','habis') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `menu_kafe_id_foreign`(`kafe_id` ASC) USING BTREE,
  CONSTRAINT `menu_kafe_id_foreign` FOREIGN KEY (`kafe_id`) REFERENCES `kafe` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('9f0ca6b2-a4a8-472e-807a-3e2fdf5b10d1', '4b6204e2-44ae-4e27-8a55-fe995541c3ae', 'Black Bean Coffee', 48043, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-a75f-4363-8760-6d87f5552f2f', '4b6204e2-44ae-4e27-8a55-fe995541c3ae', 'Espresso', 37040, NULL, 'tersedia', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-a970-444a-ae26-403ab172ec10', '4b6204e2-44ae-4e27-8a55-fe995541c3ae', 'Mocha', 48146, NULL, 'tersedia', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-abe5-40ed-9425-ff1e3c8fe7bc', '4b6204e2-44ae-4e27-8a55-fe995541c3ae', 'Macchiato', 32805, NULL, 'tersedia', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-aecf-49d9-97b2-e6de8ac23f85', '4b6204e2-44ae-4e27-8a55-fe995541c3ae', 'Americano', 10524, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-b0e8-4029-828b-f28622a48cf3', '4b6204e2-44ae-4e27-8a55-fe995541c3ae', 'Flat White', 34671, NULL, 'tersedia', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-b465-4f17-9bf9-0db1aed92c42', '4b6204e2-44ae-4e27-8a55-fe995541c3ae', 'Matcha Latte', 12125, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-b6c5-48cc-8ed9-76d023e58655', '4b6204e2-44ae-4e27-8a55-fe995541c3ae', 'Cappuccino', 13248, NULL, 'tersedia', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-badf-417a-bdfa-109da7ff51b3', '4b6204e2-44ae-4e27-8a55-fe995541c3ae', 'Affogato', 47863, NULL, 'tersedia', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-bd84-4256-ada8-b0b71776fca4', '4b6204e2-44ae-4e27-8a55-fe995541c3ae', 'Pancake', 23522, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-bfc8-44e1-a669-5829c214931d', '4b6204e2-44ae-4e27-8a55-fe995541c3ae', 'Latte', 37626, NULL, 'tersedia', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-c474-4989-98c9-b4c1e07c7e5e', '4b6204e2-44ae-4e27-8a55-fe995541c3ae', 'Brownies', 22254, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-c6ae-4869-ac24-0772811ab913', '4b6204e2-44ae-4e27-8a55-fe995541c3ae', 'Tropical Latte', 11655, NULL, 'tersedia', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-c8d5-4464-9977-eda348895f31', '4b6204e2-44ae-4e27-8a55-fe995541c3ae', 'Croissant', 32065, NULL, 'tersedia', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-cc79-4dda-a4b4-45904becfcbe', '4b6204e2-44ae-4e27-8a55-fe995541c3ae', 'Cold Brew', 25959, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-d224-4462-bf66-c5c5b15ba8cc', '4b6204e2-44ae-4e27-8a55-fe995541c3ae', 'Cheesecake', 37890, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-d7dd-4c1b-aac9-b6faa9877c16', '4b6204e2-44ae-4e27-8a55-fe995541c3ae', 'Tiramisu', 11979, NULL, 'tersedia', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-dae4-43d1-9f13-4c69a7114680', '8b7334bf-10cf-4d60-86db-4acda0cc5335', 'Tiramisu', 47846, NULL, 'tersedia', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-ddee-46da-85d5-ed069bc34aec', '8b7334bf-10cf-4d60-86db-4acda0cc5335', 'Latte', 41245, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-e30f-420a-8149-09783de840d7', '8b7334bf-10cf-4d60-86db-4acda0cc5335', 'Matcha Latte', 31526, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-e590-4df7-a0f4-c1c91678a34b', '8b7334bf-10cf-4d60-86db-4acda0cc5335', 'Cappuccino', 43137, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-ed5e-46d7-8774-c9968a5a490a', '8b7334bf-10cf-4d60-86db-4acda0cc5335', 'Cold Brew', 37302, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-ef94-4ab2-b67c-76fe032699d9', '8b7334bf-10cf-4d60-86db-4acda0cc5335', 'Espresso', 24858, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-f1d2-4fdf-8ea9-9c18144f8be9', '8b7334bf-10cf-4d60-86db-4acda0cc5335', 'Croissant', 37605, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-f449-4bbe-8327-7bca968f298f', '8b7334bf-10cf-4d60-86db-4acda0cc5335', 'Affogato', 14796, NULL, 'tersedia', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-f6f1-414b-94cd-b25a756f8252', '8b7334bf-10cf-4d60-86db-4acda0cc5335', 'Tropical Latte', 26335, NULL, 'tersedia', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-fa58-442d-9d93-1e684ec160b5', '8b7334bf-10cf-4d60-86db-4acda0cc5335', 'Cheesecake', 48555, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-fcbf-41d9-a879-af9954f6ab1d', '8b7334bf-10cf-4d60-86db-4acda0cc5335', 'Flat White', 21823, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b2-ff26-479a-9df3-f1f0f1e204bd', '8b7334bf-10cf-4d60-86db-4acda0cc5335', 'Mocha', 31429, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b3-0460-470f-af62-4f5a89d46182', '8b7334bf-10cf-4d60-86db-4acda0cc5335', 'Pancake', 48629, NULL, 'tersedia', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b3-06da-4ba1-9b24-3480dea3fefd', '8b7334bf-10cf-4d60-86db-4acda0cc5335', 'Macchiato', 39795, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b3-0930-4e78-88d2-be9a16a149f7', '8b7334bf-10cf-4d60-86db-4acda0cc5335', 'Brownies', 30657, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b3-130a-4afa-9154-38d5f2f5458a', '8b7334bf-10cf-4d60-86db-4acda0cc5335', 'Americano', 45978, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b3-15d8-4094-ad39-6fbb2cf4759a', '8b7334bf-10cf-4d60-86db-4acda0cc5335', 'Black Bean Coffee', 45626, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b3-1b9e-4df2-8072-30a052a1af4b', 'fffdf2a3-6264-40c7-9692-eb2e21f4b159', 'Cheesecake', 43455, NULL, 'tersedia', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b3-1e21-42cd-8181-0d261318bd96', 'fffdf2a3-6264-40c7-9692-eb2e21f4b159', 'Mocha', 32475, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b3-20a2-44a4-92b0-a554b8a63e40', 'fffdf2a3-6264-40c7-9692-eb2e21f4b159', 'Espresso', 23929, NULL, 'tersedia', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b3-2443-4f44-b2bd-29ee609c147d', 'fffdf2a3-6264-40c7-9692-eb2e21f4b159', 'Latte', 30965, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b3-274e-4a7c-9048-ffcdb938efc8', 'fffdf2a3-6264-40c7-9692-eb2e21f4b159', 'Black Bean Coffee', 38237, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b3-2a47-4fa6-8a80-f22575381d79', 'fffdf2a3-6264-40c7-9692-eb2e21f4b159', 'Pancake', 23084, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b3-2d3a-445e-b127-d973d25e4d12', 'fffdf2a3-6264-40c7-9692-eb2e21f4b159', 'Macchiato', 48422, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b3-31ed-44bf-9dc2-da8d3e168871', 'fffdf2a3-6264-40c7-9692-eb2e21f4b159', 'Cappuccino', 33798, NULL, 'tersedia', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b3-349e-4931-a1b4-4e5ecbf7c4d2', 'fffdf2a3-6264-40c7-9692-eb2e21f4b159', 'Tiramisu', 24603, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b3-375d-433e-8807-54e844d1ddfb', 'fffdf2a3-6264-40c7-9692-eb2e21f4b159', 'Croissant', 44872, NULL, 'tersedia', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b3-3a6f-43f0-9201-b8930e7dba68', 'fffdf2a3-6264-40c7-9692-eb2e21f4b159', 'Brownies', 15487, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b3-3ca9-4a11-902c-3f14ddbcac99', 'fffdf2a3-6264-40c7-9692-eb2e21f4b159', 'Flat White', 49466, NULL, 'tersedia', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b3-3f65-4a8c-aac5-cbaf907bb441', 'fffdf2a3-6264-40c7-9692-eb2e21f4b159', 'Tropical Latte', 16378, NULL, 'tersedia', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b3-4187-4f61-a993-078963300cdd', 'fffdf2a3-6264-40c7-9692-eb2e21f4b159', 'Americano', 16895, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b3-43e6-4db4-87b1-3d4baff77d27', 'fffdf2a3-6264-40c7-9692-eb2e21f4b159', 'Cold Brew', 15744, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b3-45f1-46f4-ae2b-2b024e4bd3b3', 'fffdf2a3-6264-40c7-9692-eb2e21f4b159', 'Matcha Latte', 39447, NULL, 'tersedia', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);
INSERT INTO `menu` VALUES ('9f0ca6b3-4894-4ee5-a69e-9c56a442bd33', 'fffdf2a3-6264-40c7-9692-eb2e21f4b159', 'Affogato', 31241, NULL, 'habis', '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);

-- ----------------------------
-- Table structure for menu_kategori
-- ----------------------------
DROP TABLE IF EXISTS `menu_kategori`;
CREATE TABLE `menu_kategori`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `menu_kategori_menu_id_foreign`(`menu_id` ASC) USING BTREE,
  INDEX `menu_kategori_kategori_id_foreign`(`kategori_id` ASC) USING BTREE,
  CONSTRAINT `menu_kategori_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `menu_kategori_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu_kategori
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '0001_01_01_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2025_01_08_142527_create_owner_table', 1);
INSERT INTO `migrations` VALUES (3, '2025_02_07_023438_create_kafe_table', 1);
INSERT INTO `migrations` VALUES (4, '2025_02_07_023457_create_menu_table', 1);
INSERT INTO `migrations` VALUES (5, '2025_02_07_023536_create_kategori_table', 1);
INSERT INTO `migrations` VALUES (6, '2025_02_07_023606_create_menu_kategori_table', 1);
INSERT INTO `migrations` VALUES (7, '2025_02_07_071502_create_genre_table', 1);
INSERT INTO `migrations` VALUES (8, '2025_02_07_071544_create_genre_kafe_table', 1);
INSERT INTO `migrations` VALUES (9, '2025_02_28_064907_create_gallery_table', 1);
INSERT INTO `migrations` VALUES (10, '2025_04_15_002302_create_reservation_table', 1);
INSERT INTO `migrations` VALUES (11, '2025_04_15_010250_create_fasilitas_table', 1);
INSERT INTO `migrations` VALUES (12, '2025_04_15_010313_create_fasilitas_kafe_table', 1);
INSERT INTO `migrations` VALUES (13, '2025_05_20_091500_create_rating_table', 1);
INSERT INTO `migrations` VALUES (14, '2025_05_22_045410_create_bookmark_kafe_table', 1);
INSERT INTO `migrations` VALUES (15, '2025_05_26_124419_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (16, '2025_05_27_095739_create_community_table', 1);

-- ----------------------------
-- Table structure for owner
-- ----------------------------
DROP TABLE IF EXISTS `owner`;
CREATE TABLE `owner`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_surat_kepemilikan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `foto_surat_ijin_usaha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `instagram_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` enum('pending','aktif','ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_tambahan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `owner_user_id_foreign`(`user_id` ASC) USING BTREE,
  CONSTRAINT `owner_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of owner
-- ----------------------------
INSERT INTO `owner` VALUES ('9f0ca6b2-5349-4ff2-9e9d-e35e846d085e', '9f0ca6b1-6e58-47b5-845a-1e70ffb4c8fd', NULL, NULL, NULL, 'pending', NULL, '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for rating
-- ----------------------------
DROP TABLE IF EXISTS `rating`;
CREATE TABLE `rating`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kafe_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `rating_kafe_id_foreign`(`kafe_id` ASC) USING BTREE,
  INDEX `rating_user_id_foreign`(`user_id` ASC) USING BTREE,
  CONSTRAINT `rating_kafe_id_foreign` FOREIGN KEY (`kafe_id`) REFERENCES `kafe` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `rating_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rating
-- ----------------------------
INSERT INTO `rating` VALUES ('9f0e2502-7069-46d5-91be-32de5df4b658', '9f0ca6b1-6e58-47b5-845a-1e70ffb4c8fd', 'fffdf2a3-6264-40c7-9692-eb2e21f4b159', 2, '2025-06-02 02:23:12', '2025-06-02 02:23:12', NULL);

-- ----------------------------
-- Table structure for reservation
-- ----------------------------
DROP TABLE IF EXISTS `reservation`;
CREATE TABLE `reservation`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kafe_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `jumlah_orang` int NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `pesan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_meja` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bukti_pembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `reservation_kafe_id_foreign`(`kafe_id` ASC) USING BTREE,
  INDEX `reservation_user_id_foreign`(`user_id` ASC) USING BTREE,
  CONSTRAINT `reservation_kafe_id_foreign` FOREIGN KEY (`kafe_id`) REFERENCES `kafe` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `reservation_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of reservation
-- ----------------------------

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sessions_user_id_index`(`user_id` ASC) USING BTREE,
  INDEX `sessions_last_activity_index`(`last_activity` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('3O198eTRmkbl1qIG29csjwxOnKpKnJvAAvWB8XXd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUZkWktPOXFCZ2Z3SkNNQkhrZWtBVTVvdGNCY2NGczZ2MVA4U2tNUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1748846965);
INSERT INTO `sessions` VALUES ('cSWUThqldAJYZd8QnqcO9ir5B5GwKulPMj5wf5SJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUU9aOG11QW9neEZkUUt5b1hTZVdEQUlKejVxeGVhMUJsdEljN2ZIeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9rYWZlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1748767103);
INSERT INTO `sessions` VALUES ('gcysWzDSRrakZbgwKSxyn4Fv1Lp2erAi6PfCFmVa', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiM2x0TVhWcmpSd1JTZDFieTZDajNtbkpycWU2c05LZFVmMFhYOXI3ZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9rYWZlIjt9fQ==', 1748852957);
INSERT INTO `sessions` VALUES ('Or1ZEkUdq4yg6vNwQA3WiZbFofuD43MxDz88I8vD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaVVpbjFCMHdTNTFoajVTb0JPTG1PVkU4N2pJOHZydHdtTDRjc1d2QSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9yZXBvcnQvYm9va21hcmsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1748801721);
INSERT INTO `sessions` VALUES ('u4rliA3YkNep6YDqQpCf3mspBatUw1FyPpTNRT4H', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0', 'YTozOntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoieFJnZHNPOHJTc0diQmtqWlpnOXdmMmY0VW5IcHU4R2NWMTVic21vaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fX0=', 1748838779);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `foto_profil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_nama_unique`(`nama` ASC) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('9f0ca6b1-6e58-47b5-845a-1e70ffb4c8fd', 'owner 1', '0439034934', 'banjarmasin', 'owner1@gmail.com', '$2y$12$cB3EJPw6pJHMZwcqGp5.Sea4hcko6d3uQB/m6.DfUtWGsfxfaj4d2', 'user', NULL, '2025-06-01 08:34:10', '2025-06-01 08:34:10', NULL);
INSERT INTO `users` VALUES ('9f0ca6b2-4737-4411-9064-2f61f71df632', 'admin', '039438434', 'madium', 'admin@gmail.com', '$2y$12$23HdKHgYaOBRf0M9TQ7uau90V2CK68.C5sXb8sXR1ma0pwp71mHji', 'admin', NULL, '2025-06-01 08:34:11', '2025-06-01 08:34:11', NULL);

SET FOREIGN_KEY_CHECKS = 1;
