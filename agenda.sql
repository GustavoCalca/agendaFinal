-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 26-Jun-2018 às 20:57
-- Versão do servidor: 5.7.21
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `agenda`
--
DROP DATABASE `agenda`;
CREATE DATABASE IF NOT EXISTS `agenda` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `agenda`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_cidades`
--

DROP TABLE IF EXISTS `tbl_cidades`;
CREATE TABLE IF NOT EXISTS `tbl_cidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cidade` varchar(60) NOT NULL,
  `estado` char(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_contatos`
--

DROP TABLE IF EXISTS `tbl_contatos`;
CREATE TABLE IF NOT EXISTS `tbl_contatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `endereco` varchar(60) NOT NULL,
  `nro_endereco` int(11) NOT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade_id` int(11) NOT NULL,
  `cep` char(9) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_contatos_tbl_cidades_idx` (`cidade_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_telefones`
--

DROP TABLE IF EXISTS `tbl_telefones`;
CREATE TABLE IF NOT EXISTS `tbl_telefones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contato_id` int(11) NOT NULL,
  `tipo_telefone` varchar(11) NOT NULL,
  `nro_telefone` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_telefones_tbl_contatos1_idx` (`contato_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` char(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id`, `nome_usuario`, `email`, `senha`) 
VALUES(1, 'Fernando', 'fsclaro@gmail.com', '123456');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tbl_contatos`
--
ALTER TABLE `tbl_contatos`
  ADD CONSTRAINT `fk_tbl_contatos_tbl_cidades` FOREIGN KEY (`cidade_id`) 
  REFERENCES `tbl_cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tbl_telefones`
--
ALTER TABLE `tbl_telefones`
  ADD CONSTRAINT `fk_tbl_telefones_tbl_contatos1` FOREIGN KEY (`contato_id`) 
  REFERENCES `tbl_contatos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;
