/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100408
 Source Host           : localhost:3306
 Source Schema         : sigep2

 Target Server Type    : MySQL
 Target Server Version : 100408
 File Encoding         : 65001

 Date: 18/01/2021 21:56:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for borda
-- ----------------------------
DROP TABLE IF EXISTS `borda`;
CREATE TABLE `borda`  (
  `idborda` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`idborda`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of borda
-- ----------------------------
INSERT INTO `borda` VALUES (0, 'Sem Borda');

-- ----------------------------
-- Table structure for categoria
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria`  (
  `idcat` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`idcat`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categoria
-- ----------------------------
INSERT INTO `categoria` VALUES (1, 'Piza');
INSERT INTO `categoria` VALUES (2, 'Bebida');
INSERT INTO `categoria` VALUES (3, 'Sobremesa');
INSERT INTO `categoria` VALUES (4, 'Doces');

-- ----------------------------
-- Table structure for funcao
-- ----------------------------
DROP TABLE IF EXISTS `funcao`;
CREATE TABLE `funcao`  (
  `idfuncao` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`idfuncao`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of funcao
-- ----------------------------
INSERT INTO `funcao` VALUES (3, 'Atendente', 1);

-- ----------------------------
-- Table structure for funcionario
-- ----------------------------
DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE `funcionario`  (
  `idfuncionario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cpf` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `telefone` int(11) NOT NULL,
  `data_nasc` date NOT NULL,
  `usuario` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `senha` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` int(10) NOT NULL,
  `funcao_idfuncao` int(11) NOT NULL,
  PRIMARY KEY (`idfuncionario`) USING BTREE,
  INDEX `fk_funcionario_funcao_idx`(`funcao_idfuncao`) USING BTREE,
  CONSTRAINT `fk_funcionario_funcao` FOREIGN KEY (`funcao_idfuncao`) REFERENCES `funcao` (`idfuncao`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of funcionario
-- ----------------------------
INSERT INTO `funcionario` VALUES (1, 'Gabriel Leles', '13', 123456, '2020-02-05', 'addasss', 'senha', 1, 3);

-- ----------------------------
-- Table structure for mesa
-- ----------------------------
DROP TABLE IF EXISTS `mesa`;
CREATE TABLE `mesa`  (
  `idmesa` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(10) NOT NULL,
  `descricao` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`idmesa`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mesa
-- ----------------------------
INSERT INTO `mesa` VALUES (1, 1, '3 lugares', 0);
INSERT INTO `mesa` VALUES (3, 2, 'Dois lugares', 1);
INSERT INTO `mesa` VALUES (4, 3, 'Descricao', 1);
INSERT INTO `mesa` VALUES (5, 5, 'sem', 1);

-- ----------------------------
-- Table structure for pedido
-- ----------------------------
DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido`  (
  `idpedido` int(11) NOT NULL AUTO_INCREMENT,
  `data_pedido` datetime(0) NOT NULL,
  `observacoes` varchar(130) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `valor` float NOT NULL,
  `status` tinyint(4) NOT NULL,
  `mesa_idmesa` int(11) NOT NULL,
  `funcionario_idfuncionario` int(11) NOT NULL,
  PRIMARY KEY (`idpedido`) USING BTREE,
  INDEX `fk_pedido_mesa1_idx`(`mesa_idmesa`) USING BTREE,
  INDEX `fk_pedido_funcionario1_idx`(`funcionario_idfuncionario`) USING BTREE,
  CONSTRAINT `fk_pedido_funcionario1` FOREIGN KEY (`funcionario_idfuncionario`) REFERENCES `funcionario` (`idfuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedido_mesa1` FOREIGN KEY (`mesa_idmesa`) REFERENCES `mesa` (`idmesa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for produto
-- ----------------------------
DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto`  (
  `idproduto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `preco` float NOT NULL,
  `tamanho` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `descricao` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `borda_idborda` int(11) NULL DEFAULT NULL,
  `unidmed_idunid` int(11) NOT NULL,
  `categoria_idcat` int(11) NOT NULL,
  PRIMARY KEY (`idproduto`) USING BTREE,
  INDEX `fk_produto_borda1_idx`(`borda_idborda`) USING BTREE,
  INDEX `fk_produto_unidMed1_idx`(`unidmed_idunid`) USING BTREE,
  INDEX `fk_produto_categoria1_idx`(`categoria_idcat`) USING BTREE,
  CONSTRAINT `fk_produto_borda1` FOREIGN KEY (`borda_idborda`) REFERENCES `borda` (`idborda`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_produto_categoria1` FOREIGN KEY (`categoria_idcat`) REFERENCES `categoria` (`idcat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_produto_unidMed1` FOREIGN KEY (`unidMed_idunid`) REFERENCES `unidmed` (`idunid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of produto
-- ----------------------------
INSERT INTO `produto` VALUES (16, 'Bolo', 12, 'small', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 0, 1, 1);
INSERT INTO `produto` VALUES (17, 'Coca cola', 7.69, '2', 'It was popularised in the 1960s with the release of', 0, 2, 2);
INSERT INTO `produto` VALUES (18, 'Pizza Calabreza', 90, 'grande', 'It was popularised in the 1960s with the release of ', 0, 1, 1);
INSERT INTO `produto` VALUES (19, 'Brigadeiro', 1.5, '1', 'Lorem Ipsum passages, and more recently with', 0, 1, 4);
INSERT INTO `produto` VALUES (20, 'Sorverte', 2.5, '250', 'Lorem Ipsum passages, and more recently with', 0, 2, 3);

-- ----------------------------
-- Table structure for produto_pedido
-- ----------------------------
DROP TABLE IF EXISTS `produto_pedido`;
CREATE TABLE `produto_pedido`  (
  `produto_idproduto` int(11) NOT NULL,
  `pedido_idpedido` int(11) NOT NULL,
  PRIMARY KEY (`produto_idproduto`, `pedido_idpedido`) USING BTREE,
  INDEX `fk_produto_has_pedido_pedido1_idx`(`pedido_idpedido`) USING BTREE,
  INDEX `fk_produto_has_pedido_produto1_idx`(`produto_idproduto`) USING BTREE,
  CONSTRAINT `fk_produto_has_pedido_pedido1` FOREIGN KEY (`pedido_idpedido`) REFERENCES `pedido` (`idpedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_produto_has_pedido_produto1` FOREIGN KEY (`produto_idproduto`) REFERENCES `produto` (`idproduto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for unidmed
-- ----------------------------
DROP TABLE IF EXISTS `unidmed`;
CREATE TABLE `unidmed`  (
  `idunid` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`idunid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of unidmed
-- ----------------------------
INSERT INTO `unidmed` VALUES (1, 'QT');
INSERT INTO `unidmed` VALUES (2, 'Litro');
INSERT INTO `unidmed` VALUES (4, 'Peso');

SET FOREIGN_KEY_CHECKS = 1;
