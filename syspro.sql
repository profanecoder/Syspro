/*
 Navicat Premium Data Transfer

 Source Server         : Xampp
 Source Server Type    : MySQL
 Source Server Version : 100140
 Source Host           : localhost:3306
 Source Schema         : syspro

 Target Server Type    : MySQL
 Target Server Version : 100140
 File Encoding         : 65001

 Date: 11/06/2019 19:14:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for contacto
-- ----------------------------
DROP TABLE IF EXISTS `contacto`;
CREATE TABLE `contacto`  (
  `idcontacto` int(10) NOT NULL AUTO_INCREMENT,
  `celular` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nombrecont1` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nombrecont2` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `apellidocont1` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `apellidocont2` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `correo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `contacto` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idcontacto`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of contacto
-- ----------------------------
INSERT INTO `contacto` VALUES (1, '12345', 'JUAN', 'ESTEBAN', 'VELEZ', 'PIZARRO', 'juvelezp@gmail.com', 'si');

-- ----------------------------
-- Table structure for empleados
-- ----------------------------
DROP TABLE IF EXISTS `empleados`;
CREATE TABLE `empleados`  (
  `cedula` int(14) NOT NULL,
  `nombre1` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nombre2` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `apellido1` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `apellido2` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`cedula`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of empleados
-- ----------------------------
INSERT INTO `empleados` VALUES (1111, 'CARLOS', 'ALBERTO', 'CASAS', 'MESA');
INSERT INTO `empleados` VALUES (2222, 'ARMANDO', 'JESUS', 'CASAS', 'DEPIE');
INSERT INTO `empleados` VALUES (3333, 'JUAN', 'ESTEBAN', 'VELEZ', 'PIZARRO');
INSERT INTO `empleados` VALUES (4444, 'CLAUDIO', 'FELIPE', 'JORGE', 'SANCHEZ');

-- ----------------------------
-- Table structure for seguro
-- ----------------------------
DROP TABLE IF EXISTS `seguro`;
CREATE TABLE `seguro`  (
  `cedulaseguro` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `seguro` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `segursocial` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`cedulaseguro`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of seguro
-- ----------------------------
INSERT INTO `seguro` VALUES ('1111', 'ACTIVO', 'ACTIVO');
INSERT INTO `seguro` VALUES ('2222', 'INACTIVO', 'INACTIVO');
INSERT INTO `seguro` VALUES ('3333', 'INACTIVO', 'INACTIVO');
INSERT INTO `seguro` VALUES ('4444', 'ACTIVO', 'ACTIVO');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `clave` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`login`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('admin', 'admin');

SET FOREIGN_KEY_CHECKS = 1;
