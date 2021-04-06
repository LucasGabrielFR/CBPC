-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.6-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para cbpc
CREATE DATABASE IF NOT EXISTS `cbpc` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `cbpc`;

-- Copiando estrutura para tabela cbpc.campeonato
CREATE TABLE IF NOT EXISTS `campeonato` (
  `idCampeonato` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(45) DEFAULT NULL,
  `Descricao` varchar(255) DEFAULT NULL,
  `Regras` varchar(500) DEFAULT NULL,
  `Data_inicio` date DEFAULT NULL,
  `Data_termino` date DEFAULT NULL,
  `Vagas` int(11) DEFAULT NULL,
  `Valor_inscricao` double DEFAULT NULL,
  `idFormato` int(11) NOT NULL,
  `Plataforma` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idCampeonato`),
  KEY `fk_Campeonato_Formato1` (`idFormato`),
  CONSTRAINT `fk_Campeonato_Formato1` FOREIGN KEY (`idFormato`) REFERENCES `formato` (`idFormato`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela cbpc.campeonato: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `campeonato` DISABLE KEYS */;
/*!40000 ALTER TABLE `campeonato` ENABLE KEYS */;

-- Copiando estrutura para tabela cbpc.config
CREATE TABLE IF NOT EXISTS `config` (
  `idConfig` int(11) NOT NULL,
  `smtp` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `data_atual` datetime NOT NULL,
  `transferencias` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idConfig`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela cbpc.config: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
/*!40000 ALTER TABLE `config` ENABLE KEYS */;

-- Copiando estrutura para tabela cbpc.confrontos
CREATE TABLE IF NOT EXISTS `confrontos` (
  `idConfronto` int(11) NOT NULL AUTO_INCREMENT,
  `Data_inicial` date NOT NULL,
  `Data_final` date NOT NULL,
  `Time_casa` int(11) NOT NULL,
  `Time_fora` int(11) NOT NULL,
  `Horario` time DEFAULT NULL,
  `Gols_casa` int(11) NOT NULL DEFAULT 0,
  `Gols_fora` int(11) NOT NULL DEFAULT 0,
  `Status` int(11) NOT NULL,
  `Competicao` int(11) NOT NULL,
  PRIMARY KEY (`idConfronto`),
  KEY `fk_Confrontos_Inscricao_campeonato1` (`Time_casa`),
  KEY `fk_Confrontos_Inscricao_campeonato2` (`Time_fora`),
  KEY `FK_confrontos_campeonato` (`Competicao`),
  CONSTRAINT `FK_confrontos_campeonato` FOREIGN KEY (`Competicao`) REFERENCES `campeonato` (`idCampeonato`),
  CONSTRAINT `fk_Confrontos_Inscricao_campeonato1` FOREIGN KEY (`Time_casa`) REFERENCES `inscricao_campeonato` (`idInscricao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Confrontos_Inscricao_campeonato2` FOREIGN KEY (`Time_fora`) REFERENCES `inscricao_campeonato` (`idInscricao`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela cbpc.confrontos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `confrontos` DISABLE KEYS */;
/*!40000 ALTER TABLE `confrontos` ENABLE KEYS */;

-- Copiando estrutura para tabela cbpc.formato
CREATE TABLE IF NOT EXISTS `formato` (
  `idFormato` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(45) DEFAULT NULL,
  `Descricao` varchar(200) DEFAULT NULL,
  `Regras_padroes` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idFormato`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela cbpc.formato: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `formato` DISABLE KEYS */;
/*!40000 ALTER TABLE `formato` ENABLE KEYS */;

-- Copiando estrutura para tabela cbpc.inscricao_campeonato
CREATE TABLE IF NOT EXISTS `inscricao_campeonato` (
  `idInscricao` int(11) NOT NULL AUTO_INCREMENT,
  `idTime` int(11) NOT NULL,
  `idCampeonato` int(11) NOT NULL,
  `Vitorias` int(11) DEFAULT 0,
  `Derrotas` int(11) DEFAULT 0,
  `Empates` int(11) DEFAULT 0,
  `Gols` int(11) DEFAULT 0,
  `Gols_sofridos` int(11) DEFAULT 0,
  `Pontos` int(11) DEFAULT 0,
  `Jogos` int(11) DEFAULT 0,
  `Saldo_gols` int(11) DEFAULT 0,
  PRIMARY KEY (`idInscricao`),
  KEY `fk_Inscricao_campeonato_Time1` (`idTime`),
  KEY `fk_Inscricao_campeonato_Campeonato1` (`idCampeonato`),
  CONSTRAINT `fk_Inscricao_campeonato_Campeonato1` FOREIGN KEY (`idCampeonato`) REFERENCES `campeonato` (`idCampeonato`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Inscricao_campeonato_Time1` FOREIGN KEY (`idTime`) REFERENCES `time` (`idTime`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela cbpc.inscricao_campeonato: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `inscricao_campeonato` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscricao_campeonato` ENABLE KEYS */;

-- Copiando estrutura para tabela cbpc.jogador
CREATE TABLE IF NOT EXISTS `jogador` (
  `idJogador` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(45) DEFAULT NULL,
  `Gamertag` varchar(45) DEFAULT NULL,
  `Plataforma` varchar(45) DEFAULT NULL,
  `Data_nascimento` date DEFAULT NULL,
  `Foto_perfil` varchar(100) DEFAULT NULL,
  `Jogos` int(11) DEFAULT 0,
  `Vitorias` int(11) DEFAULT 0,
  `Derrotas` int(11) DEFAULT 0,
  `Empates` int(11) DEFAULT 0,
  `Gols` int(11) DEFAULT 0,
  `Assistencias` int(11) DEFAULT 0,
  `Divididas` int(11) DEFAULT 0,
  `Defesas` int(11) DEFAULT 0,
  `idUsuario` int(11) DEFAULT NULL,
  `Titulos` int(11) DEFAULT 0,
  `Vices` int(11) DEFAULT 0,
  `Terceiro` int(11) DEFAULT 0,
  `Estado` varchar(45) DEFAULT NULL,
  `Cidade` varchar(45) DEFAULT NULL,
  `Telefone` varchar(45) DEFAULT NULL,
  `Valor` double DEFAULT NULL,
  PRIMARY KEY (`idJogador`),
  UNIQUE KEY `idUsuario` (`idUsuario`),
  CONSTRAINT `FK_jogador_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela cbpc.jogador: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `jogador` DISABLE KEYS */;
/*!40000 ALTER TABLE `jogador` ENABLE KEYS */;

-- Copiando estrutura para tabela cbpc.jogador_partida
CREATE TABLE IF NOT EXISTS `jogador_partida` (
  `idJogador` int(11) NOT NULL,
  `idConfronto` int(11) NOT NULL,
  `idTime` int(11) NOT NULL,
  `Gols` int(11) DEFAULT NULL,
  `Assistencias` int(11) DEFAULT NULL,
  `Divididas` int(11) DEFAULT NULL,
  `Defesas` int(11) DEFAULT NULL,
  `Passes` int(11) DEFAULT NULL,
  `Divididas_certas` int(11) DEFAULT NULL,
  `Passes_certos` int(11) DEFAULT NULL,
  `Finalizadoes` int(11) DEFAULT NULL,
  `Finalizacoes_certas` int(11) DEFAULT NULL,
  `Gols_contra` int(11) DEFAULT NULL,
  `Dribles` int(11) DEFAULT NULL,
  `Gols_sofridos` int(11) DEFAULT NULL,
  `Bolas_agarradas` int(11) DEFAULT NULL,
  `Bolas_espalmadas` int(11) DEFAULT NULL,
  `Cruzamentos_cortados` int(11) DEFAULT NULL,
  `Bolas_afastadas` int(11) DEFAULT NULL,
  `Dribles_importantes` int(11) DEFAULT NULL,
  `Faltas_sofridas` int(11) DEFAULT NULL,
  `Interceptacoes` int(11) DEFAULT NULL,
  `Bloqueios` int(11) DEFAULT NULL,
  `Impedimento` int(11) DEFAULT NULL,
  `Posse_ganha` int(11) DEFAULT NULL,
  `Posse_perdida` int(11) DEFAULT NULL,
  `Chutoes` int(11) DEFAULT NULL,
  `Cabeceios_ganhos` int(11) DEFAULT NULL,
  `Cabeceios_perdidos` int(11) DEFAULT NULL,
  `MVP` int(11) DEFAULT NULL,
  `Valor` double DEFAULT NULL,
  KEY `fk_Jogador_Partida_Jogador1` (`idJogador`),
  KEY `fk_Jogador_Partida_Confrontos1` (`idConfronto`),
  KEY `fk_Jogador_Partida_Time1` (`idTime`),
  CONSTRAINT `fk_Jogador_Partida_Confrontos1` FOREIGN KEY (`idConfronto`) REFERENCES `confrontos` (`idConfronto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Jogador_Partida_Jogador1` FOREIGN KEY (`idJogador`) REFERENCES `jogador` (`idJogador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Jogador_Partida_Time1` FOREIGN KEY (`idTime`) REFERENCES `time` (`idTime`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela cbpc.jogador_partida: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `jogador_partida` DISABLE KEYS */;
/*!40000 ALTER TABLE `jogador_partida` ENABLE KEYS */;

-- Copiando estrutura para tabela cbpc.papel
CREATE TABLE IF NOT EXISTS `papel` (
  `idPapel` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPapel`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela cbpc.papel: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `papel` DISABLE KEYS */;
/*!40000 ALTER TABLE `papel` ENABLE KEYS */;

-- Copiando estrutura para tabela cbpc.papel_time
CREATE TABLE IF NOT EXISTS `papel_time` (
  `idTime` int(11) NOT NULL,
  `idPapel` int(11) NOT NULL,
  `idJogador` int(11) NOT NULL,
  `Data_entrada` date DEFAULT NULL,
  `Data_saida` date DEFAULT NULL,
  KEY `fk_Papel_time_Time1` (`idTime`),
  KEY `fk_Papel_time_Papel1` (`idPapel`),
  KEY `fk_Papel_time_Jogador1` (`idJogador`),
  CONSTRAINT `fk_Papel_time_Jogador1` FOREIGN KEY (`idJogador`) REFERENCES `jogador` (`idJogador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Papel_time_Papel1` FOREIGN KEY (`idPapel`) REFERENCES `papel` (`idPapel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Papel_time_Time1` FOREIGN KEY (`idTime`) REFERENCES `time` (`idTime`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela cbpc.papel_time: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `papel_time` DISABLE KEYS */;
/*!40000 ALTER TABLE `papel_time` ENABLE KEYS */;

-- Copiando estrutura para tabela cbpc.permissao
CREATE TABLE IF NOT EXISTS `permissao` (
  `idPermissao` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`idPermissao`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela cbpc.permissao: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `permissao` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissao` ENABLE KEYS */;

-- Copiando estrutura para tabela cbpc.posicao_jogador
CREATE TABLE IF NOT EXISTS `posicao_jogador` (
  `idPosicao` int(11) NOT NULL,
  `idJogador` int(11) NOT NULL,
  KEY `fk_Posicao_Jogador_Posicoes1` (`idPosicao`),
  KEY `fk_Posicao_Jogador_Jogador1` (`idJogador`),
  CONSTRAINT `fk_Posicao_Jogador_Jogador1` FOREIGN KEY (`idJogador`) REFERENCES `jogador` (`idJogador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Posicao_Jogador_Posicoes1` FOREIGN KEY (`idPosicao`) REFERENCES `posicoes` (`idPosicao`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela cbpc.posicao_jogador: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `posicao_jogador` DISABLE KEYS */;
/*!40000 ALTER TABLE `posicao_jogador` ENABLE KEYS */;

-- Copiando estrutura para tabela cbpc.posicoes
CREATE TABLE IF NOT EXISTS `posicoes` (
  `idPosicao` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(45) DEFAULT NULL,
  `Sigla` varchar(45) DEFAULT NULL,
  `Setor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPosicao`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela cbpc.posicoes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `posicoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `posicoes` ENABLE KEYS */;

-- Copiando estrutura para tabela cbpc.time
CREATE TABLE IF NOT EXISTS `time` (
  `idTime` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(45) DEFAULT NULL,
  `Data_Fundacao` date DEFAULT NULL,
  `Sigla` varchar(45) DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL,
  `Emblema` varchar(255) DEFAULT NULL,
  `Plataforma` varchar(45) NOT NULL,
  `Jogos` int(11) DEFAULT 0,
  `Vitorias` int(11) DEFAULT 0,
  `Derrotas` int(11) DEFAULT 0,
  `Empates` int(11) DEFAULT 0,
  `Titulos` int(11) DEFAULT 0,
  `Vice` int(11) DEFAULT 0,
  `Terceiro` int(11) DEFAULT 0,
  `Gols` int(11) DEFAULT 0,
  `Gols_Sofridos` int(11) DEFAULT 0,
  `Criador` int(11) NOT NULL,
  PRIMARY KEY (`idTime`),
  UNIQUE KEY `Criador` (`Criador`),
  CONSTRAINT `FK_time_jogador` FOREIGN KEY (`Criador`) REFERENCES `jogador` (`idJogador`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela cbpc.time: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `time` DISABLE KEYS */;
/*!40000 ALTER TABLE `time` ENABLE KEYS */;

-- Copiando estrutura para tabela cbpc.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `idPermissao` int(11) NOT NULL,
  `created_at` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `usuario` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `FK_1708c70e35cfe66168ecec4e467` (`idPermissao`),
  CONSTRAINT `FK_1708c70e35cfe66168ecec4e467` FOREIGN KEY (`idPermissao`) REFERENCES `permissao` (`idPermissao`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela cbpc.usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
