/*
 Navicat Premium Data Transfer

 Source Server         : local-sistem
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : project-uas

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 25/05/2023 22:43:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for beasiswa
-- ----------------------------
DROP TABLE IF EXISTS `beasiswa`;
CREATE TABLE `beasiswa`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dibuat_oleh` bigint(20) NULL DEFAULT NULL,
  `dibuat_tanggal` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of beasiswa
-- ----------------------------
INSERT INTO `beasiswa` VALUES (1, 'Beasiswa PPA NEW', 1, '2023-05-21 01:45:44');

-- ----------------------------
-- Table structure for kriteria
-- ----------------------------
DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE `kriteria`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sifat` enum('min','max') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dibuat_oleh` int(11) NULL DEFAULT NULL,
  `dibuat_tanggal` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kriteria
-- ----------------------------
INSERT INTO `kriteria` VALUES (1, 'a-001', 'new edit', 'max', 1, '2023-05-20 00:00:00');
INSERT INTO `kriteria` VALUES (2, '20230525085100696', 'new edit', 'min', 1, '2023-05-25 08:51:00');

-- ----------------------------
-- Table structure for mahasiswa
-- ----------------------------
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nim` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tahun_mengajukan` year NULL DEFAULT NULL,
  `dibuat_oleh` bigint(20) NULL DEFAULT NULL,
  `dibuat_tanggal` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mahasiswa
-- ----------------------------
INSERT INTO `mahasiswa` VALUES (1, '124567810', 'Agis Maulana', 'Depok', 'Laki-laki', 2020, 1, '2023-05-21 04:04:42');

-- ----------------------------
-- Table structure for model
-- ----------------------------
DROP TABLE IF EXISTS `model`;
CREATE TABLE `model`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `beasiswa_id` bigint(20) NULL DEFAULT NULL,
  `kriteria_id` bigint(20) NULL DEFAULT NULL,
  `bobot` double NULL DEFAULT NULL,
  `dibuat_oleh` bigint(20) NULL DEFAULT NULL,
  `dibuat_tanggal` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model
-- ----------------------------
INSERT INTO `model` VALUES (1, 1, 1, 4, 1, '2023-05-23 03:16:23');

-- ----------------------------
-- Table structure for parameter_penilaian
-- ----------------------------
DROP TABLE IF EXISTS `parameter_penilaian`;
CREATE TABLE `parameter_penilaian`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `beasiswa_id` bigint(20) NULL DEFAULT NULL,
  `kriteria_id` bigint(20) NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `bobot` decimal(10, 0) NULL DEFAULT NULL,
  `dibuat_oleh` bigint(20) NULL DEFAULT NULL,
  `dibuat_tanggal` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of parameter_penilaian
-- ----------------------------
INSERT INTO `parameter_penilaian` VALUES (1, 1, 1, 'Penilaian', 4, 1, '2023-05-21 08:30:30');
INSERT INTO `parameter_penilaian` VALUES (2, 1, 1, 'Penilaian2', 3, 1, '2023-05-21 08:30:30');
INSERT INTO `parameter_penilaian` VALUES (3, 1, 1, 'Penilaian3', 2, 1, '2023-05-21 08:30:30');
INSERT INTO `parameter_penilaian` VALUES (4, 1, 1, 'Penilaian4', 1, 1, '2023-05-21 08:30:30');

-- ----------------------------
-- Table structure for pengajuan_beasiswa
-- ----------------------------
DROP TABLE IF EXISTS `pengajuan_beasiswa`;
CREATE TABLE `pengajuan_beasiswa`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `beasiswa_id` bigint(20) NULL DEFAULT NULL,
  `kriteria_id` bigint(20) NULL DEFAULT NULL,
  `mahasiswa_id` bigint(20) NULL DEFAULT NULL,
  `nilai` int(11) NULL DEFAULT NULL,
  `dibuat_oleh` int(11) NULL DEFAULT NULL,
  `dibuat_tanggal` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengajuan_beasiswa
-- ----------------------------
INSERT INTO `pengajuan_beasiswa` VALUES (2, 1, 1, 1, 1, 1, '2023-05-23 09:45:07');
INSERT INTO `pengajuan_beasiswa` VALUES (3, 1, 1, 1, 2, 1, '2023-05-23 09:45:07');
INSERT INTO `pengajuan_beasiswa` VALUES (4, 1, 1, 1, 3, 1, '2023-05-23 09:45:07');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_active` tinyint(4) NULL DEFAULT NULL,
  `dibuat_tanggal` timestamp(0) NULL DEFAULT NULL,
  `mahasiswa_id` bigint(20) NULL DEFAULT NULL,
  `role` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', '$2y$10$o3jUoURZ19ZaX2zZ1XqjK.SDl47pt6XmGLc3FzlW8/jYv8qkRdYHu', 1, '2023-05-19 08:58:11', NULL, 'admin');
INSERT INTO `user` VALUES (2, 'agis', '$2y$10$.Uv6yXLrMSYpdkDpwkXh4euhm5WxeyHu4soSXQBFggw5YzTg8JwCq', 1, '2023-05-21 02:35:33', 0, 'admin');

SET FOREIGN_KEY_CHECKS = 1;
