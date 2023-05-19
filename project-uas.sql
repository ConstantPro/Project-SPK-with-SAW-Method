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

 Date: 19/05/2023 11:32:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for beasiswa
-- ----------------------------
DROP TABLE IF EXISTS `beasiswa`;
CREATE TABLE `beasiswa`  (
  `id` bigint(20) NOT NULL,
  `nama` linestring NULL,
  `dibuat_oleh` bigint(20) NULL DEFAULT NULL,
  `dibuat_tanggal` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of beasiswa
-- ----------------------------

-- ----------------------------
-- Table structure for kriteria
-- ----------------------------
DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE `kriteria`  (
  `id` bigint(20) NOT NULL,
  `kode` linestring NULL,
  `nama` linestring NULL,
  `sifat` enum('min','max') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dibuat_oleh` int(11) NULL DEFAULT NULL,
  `dibuat_tanggal` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kriteria
-- ----------------------------

-- ----------------------------
-- Table structure for mahasiswa
-- ----------------------------
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa`  (
  `id` bigint(20) NOT NULL,
  `nim` linestring NULL,
  `nama` linestring NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tahun_mengajukan` year NULL DEFAULT NULL,
  `dibuat_oleh` bigint(20) NULL DEFAULT NULL,
  `dibuat_tanggal` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mahasiswa
-- ----------------------------

-- ----------------------------
-- Table structure for model
-- ----------------------------
DROP TABLE IF EXISTS `model`;
CREATE TABLE `model`  (
  `id` bigint(20) NOT NULL,
  `beasiswa_id` bigint(20) NULL DEFAULT NULL,
  `kriteria_id` bigint(20) NULL DEFAULT NULL,
  `bobot` double NULL DEFAULT NULL,
  `dibuat_oleh` bigint(20) NULL DEFAULT NULL,
  `dibuat_tanggal` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model
-- ----------------------------

-- ----------------------------
-- Table structure for parameter_penilaian
-- ----------------------------
DROP TABLE IF EXISTS `parameter_penilaian`;
CREATE TABLE `parameter_penilaian`  (
  `id` bigint(20) NOT NULL,
  `beasiswa_id` bigint(20) NULL DEFAULT NULL,
  `kriteria_id` bigint(20) NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `bobot` decimal(10, 0) NULL DEFAULT NULL,
  `dibuat_oleh` bigint(20) NULL DEFAULT NULL,
  `dibuat_tanggal` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of parameter_penilaian
-- ----------------------------

-- ----------------------------
-- Table structure for pengajuan_beasiswa
-- ----------------------------
DROP TABLE IF EXISTS `pengajuan_beasiswa`;
CREATE TABLE `pengajuan_beasiswa`  (
  `id` bigint(20) NOT NULL,
  `beasiswa_id` bigint(20) NULL DEFAULT NULL,
  `kriteria_id` bigint(20) NULL DEFAULT NULL,
  `mahasiswa_id` bigint(20) NULL DEFAULT NULL,
  `nilai` int(11) NULL DEFAULT NULL,
  `dibuat_oleh` int(11) NULL DEFAULT NULL,
  `dibuat_tanggal` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengajuan_beasiswa
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_active` tinyint(4) NULL DEFAULT NULL,
  `dibuat_tanggal` timestamp(0) NULL DEFAULT NULL,
  `mahasiswa_id` bigint(20) NULL DEFAULT NULL,
  `role` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', '$2y$10$o3jUoURZ19ZaX2zZ1XqjK.SDl47pt6XmGLc3FzlW8/jYv8qkRdYHu', 1, '2023-05-19 08:58:11', NULL, 'admin');

SET FOREIGN_KEY_CHECKS = 1;
