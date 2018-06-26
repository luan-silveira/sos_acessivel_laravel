-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Jun-2018 às 16:37
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sos_acessivel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendentes`
--

CREATE TABLE `atendentes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `i_instituicao_atendimento` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimentos`
--

CREATE TABLE `atendimentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_ocorrencia` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_viatura` int(11) DEFAULT NULL,
  `status` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `classificacao_ocorrencias`
--

CREATE TABLE `classificacao_ocorrencias` (
  `id` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `classificacao_ocorrencias`
--

INSERT INTO `classificacao_ocorrencias` (`id`, `descricao`, `created_at`, `updated_at`) VALUES
(1, 'Acidentes e traumas', NULL, NULL),
(2, 'Emergências médicas', NULL, NULL),
(3, 'Emergências policiais', NULL, NULL),
(4, 'Resgates/Desastres naturais', NULL, NULL),
(5, 'Risco imediato à vida', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato_emergencias`
--

CREATE TABLE `contato_emergencias` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` char(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE `estados` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`id`, `nome`, `sigla`, `created_at`, `updated_at`) VALUES
(1, 'Acre', 'AC', NULL, NULL),
(2, 'Alagoas', 'AL', NULL, NULL),
(3, 'Amapá', 'AP', NULL, NULL),
(4, 'Amazonas', 'AM', NULL, NULL),
(5, 'Bahia', 'BA', NULL, NULL),
(6, 'Ceará', 'CE', NULL, NULL),
(7, 'Distrito Federal', 'DF', NULL, NULL),
(8, 'Espírito Santo', 'ES', NULL, NULL),
(9, 'Goiás', 'GO', NULL, NULL),
(10, 'Maranhão', 'MA', NULL, NULL),
(11, 'Mato Grosso', 'MT', NULL, NULL),
(12, 'Mato Grosso do Sul', 'MS', NULL, NULL),
(13, 'Minas Gerais', 'MG', NULL, NULL),
(14, 'Pará', 'PA', NULL, NULL),
(15, 'Paraíba', 'PB', NULL, NULL),
(16, 'Paraná', 'PR', NULL, NULL),
(17, 'Pernambuco', 'PE', NULL, NULL),
(18, 'Piauí', 'PI', NULL, NULL),
(19, 'Rio de Janeiro', 'RJ', NULL, NULL),
(20, 'Rio Grande do Norte', 'RN', NULL, NULL),
(21, 'Rio Grande do Sul', 'RS', NULL, NULL),
(22, 'Rondônia', 'RO', NULL, NULL),
(23, 'Roraima', 'RR', NULL, NULL),
(24, 'Santa Catarina', 'SC', NULL, NULL),
(25, 'São Paulo', 'SP', NULL, NULL),
(26, 'Sergipe', 'SE', NULL, NULL),
(27, 'Tocantins', 'TO', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicao_atendimentos`
--

CREATE TABLE `instituicao_atendimentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orgao_instituicao` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_instituicao_orgao` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `instituicao_atendimentos`
--

INSERT INTO `instituicao_atendimentos` (`id`, `nome`, `orgao_instituicao`, `id_estado`, `created_at`, `updated_at`, `id_instituicao_orgao`) VALUES
(1, 'Instituição Exemplo CBM-SC', '1', 24, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicao_orgaos`
--

CREATE TABLE `instituicao_orgaos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `instituicao_orgaos`
--

INSERT INTO `instituicao_orgaos` (`id`, `nome`) VALUES
(1, 'Corpo de Bombeiros Militar'),
(2, 'Polícia Militar'),
(3, 'Serviço de Atendimento Móvel de Urgência');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_estados_table', 1),
(2, '2014_10_12_000000_create_instituicao_atendimentos_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2018_06_15_024824_create_atendentes_table', 1),
(6, '2018_06_15_024843_create_classificacao_ocorrencias_table', 1),
(7, '2018_06_15_024904_create_tipo_ocorrencias_table', 1),
(8, '2018_06_15_024917_create_ocorrencias_table', 1),
(9, '2018_06_15_024936_create_pacientes_table', 1),
(10, '2018_06_15_024949_create_contato_emergencias_table', 1),
(11, '2018_06_21_124701_create_viaturas_table', 1),
(12, '2018_06_21_125220_create_viatura_marcas_table', 1),
(13, '2018_06_21_125235_create_viatura_modelos_table', 1),
(14, '2018_06_21_125837_create_atendimentos_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ocorrencias`
--

CREATE TABLE `ocorrencias` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_tipo_ocorrencia` int(11) NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci,
  `localizacao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` decimal(13,6) NOT NULL,
  `longitude` decimal(13,6) NOT NULL,
  `data_ocorrencia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_instituicao` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `ocorrencias`
--

INSERT INTO `ocorrencias` (`id`, `id_paciente`, `id_tipo_ocorrencia`, `descricao`, `localizacao`, `latitude`, `longitude`, `data_ocorrencia`, `id_instituicao`, `created_at`, `updated_at`) VALUES
(1, 1, 35, 'Acidente', 'Centro', '-28.692968', '-49.339085', '2018-06-26 14:17:13', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `tipo_sanguineo` enum('A','B','AB','O') COLLATE utf8mb4_unicode_ci NOT NULL,
  `fator_rh_sanguineo` enum('P','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endereco` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `informacoes_medicas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pacientes`
--

INSERT INTO `pacientes` (`id`, `nome`, `data_nascimento`, `tipo_sanguineo`, `fator_rh_sanguineo`, `endereco`, `informacoes_medicas`, `created_at`, `updated_at`) VALUES
(1, 'João da Silva', '1995-07-01', 'A', 'P', 'Avenida Centenário, 1450 Santa Bárbara Criciúma - SC', '.', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_ocorrencias`
--

CREATE TABLE `tipo_ocorrencias` (
  `id` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_classificacao_ocorrencia` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_instituicao_orgao` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tipo_ocorrencias`
--

INSERT INTO `tipo_ocorrencias` (`id`, `descricao`, `id_classificacao_ocorrencia`, `created_at`, `updated_at`, `id_instituicao_orgao`) VALUES
(1, 'Agressão/Violência sexual', 1, NULL, NULL, 0),
(2, 'Ferimento por arma branca/arma de fogo', 1, NULL, NULL, 0),
(3, 'Mordida de animal', 1, NULL, NULL, 0),
(4, 'Picada de animais peçonhentos', 1, NULL, NULL, 0),
(5, 'Quedas', 1, NULL, NULL, 0),
(6, 'AVC/Derrame', 2, NULL, NULL, 0),
(7, 'Alergia/Reação medicamentosa', 2, NULL, NULL, 0),
(8, 'Convulsões/Epilepsia', 2, NULL, NULL, 0),
(9, 'Psiquiátricos/Tentativa de suicídio', 2, NULL, NULL, 0),
(10, 'Dor abdominal', 2, NULL, NULL, 0),
(11, 'Dor de cabeça', 2, NULL, NULL, 0),
(12, 'Dor nas costas', 2, NULL, NULL, 0),
(13, 'Dor no peito/Problemas cardíacos', 2, NULL, NULL, 0),
(14, 'Envenenamento/Overdose', 2, NULL, NULL, 0),
(15, 'Gravidez/Parto/Aborto', 2, NULL, NULL, 0),
(16, 'Problemas respiratórios', 2, NULL, NULL, 0),
(17, 'Furto/Roubo/Assalto', 3, NULL, NULL, 0),
(18, 'Homicídio', 3, NULL, NULL, 0),
(19, 'Lesão corporal', 3, NULL, NULL, 0),
(20, 'Tentativa de homicídio', 3, NULL, NULL, 0),
(21, 'Violência doméstica', 3, NULL, NULL, 0),
(22, 'Violência sexual/Estupro', 3, NULL, NULL, 0),
(24, 'Alagamento/Enchente/Enxurrada', 4, NULL, NULL, 0),
(25, 'Soterramento/Deslizamento', 4, NULL, NULL, 0),
(26, 'Incêndio em edificação', 4, NULL, NULL, 0),
(27, 'Incêndio florestal/Entulhos', 4, NULL, NULL, 0),
(28, 'Incêndio veicular', 4, NULL, NULL, 0),
(29, 'Incidente com aeronave', 4, NULL, NULL, 0),
(30, 'Pessoa desaparecida/perdida', 4, NULL, NULL, 0),
(31, 'Produtos perigosos', 4, NULL, NULL, 0),
(32, 'Resgates de animais', 4, NULL, NULL, 0),
(33, 'Salvamento em altura', 4, NULL, NULL, 0),
(34, 'Afogamentos e acidentes de mergulho', 5, NULL, NULL, 0),
(35, 'Choque elétrico', 5, NULL, NULL, 0),
(36, 'Desmaio/mal súbito', 5, NULL, NULL, 0),
(37, 'Obstrução de vias aéreas', 5, NULL, NULL, 0),
(38, 'Parada cardiorespiratória', 5, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_instituicao` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `tipo`, `email`, `password`, `id_instituicao`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', '1', 'admin@cbm.com', '$2y$10$6QPpxmPSl0fsSLfi9aTY9.rsUusF1eQMi4Mx3KpUqAEGDYamS3cUO', 1, NULL, '2018-06-21 22:59:18', '2018-06-21 22:59:18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `viaturas`
--

CREATE TABLE `viaturas` (
  `id` int(10) UNSIGNED NOT NULL,
  `placa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_modelo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ano` year(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `viaturas`
--

INSERT INTO `viaturas` (`id`, `placa`, `id_modelo`, `created_at`, `updated_at`, `ano`) VALUES
(10, 'DRC-4848', 180, '2018-06-22 22:58:28', '2018-06-22 22:58:28', 2012),
(5, 'MZK-9856', 2655, '2018-06-22 04:00:03', '2018-06-22 06:24:03', 2012);

-- --------------------------------------------------------

--
-- Estrutura da tabela `viatura_marcas`
--

CREATE TABLE `viatura_marcas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `viatura_marcas`
--

INSERT INTO `viatura_marcas` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'CHEVROLET', NULL, NULL),
(2, 'VOLKSWAGEN', NULL, NULL),
(3, 'FIAT', NULL, NULL),
(4, 'MERCEDES-BENZ', NULL, NULL),
(5, 'CITROEN', NULL, NULL),
(6, 'CHANA', NULL, NULL),
(7, 'HONDA', NULL, NULL),
(8, 'SUBARU', NULL, NULL),
(10, 'FERRARI', NULL, NULL),
(11, 'BUGATTI', NULL, NULL),
(12, 'LAMBORGHINI', NULL, NULL),
(13, 'FORD', NULL, NULL),
(14, 'HYUNDAI', NULL, NULL),
(15, 'JAC', NULL, NULL),
(16, 'KIA', NULL, NULL),
(17, 'GURGEL', NULL, NULL),
(18, 'DODGE', NULL, NULL),
(19, 'CHRYSLER', NULL, NULL),
(20, 'BENTLEY', NULL, NULL),
(21, 'SSANGYONG', NULL, NULL),
(22, 'PEUGEOT', NULL, NULL),
(23, 'TOYOTA', NULL, NULL),
(24, 'RENAULT', NULL, NULL),
(25, 'ACURA', NULL, NULL),
(26, 'ADAMO', NULL, NULL),
(27, 'AGRALE', NULL, NULL),
(28, 'ALFA ROMEO', NULL, NULL),
(29, 'AMERICAR', NULL, NULL),
(31, 'ASTON MARTIN', NULL, NULL),
(32, 'AUDI', NULL, NULL),
(34, 'BEACH', NULL, NULL),
(35, 'BIANCO', NULL, NULL),
(36, 'BMW', NULL, NULL),
(37, 'BORGWARD', NULL, NULL),
(38, 'BRILLIANCE', NULL, NULL),
(41, 'BUICK', NULL, NULL),
(42, 'CBT', NULL, NULL),
(43, 'NISSAN', NULL, NULL),
(44, 'CHAMONIX', NULL, NULL),
(46, 'CHEDA', NULL, NULL),
(47, 'CHERY', NULL, NULL),
(48, 'CORD', NULL, NULL),
(49, 'COYOTE', NULL, NULL),
(50, 'CROSS LANDER', NULL, NULL),
(51, 'DAEWOO', NULL, NULL),
(52, 'DAIHATSU', NULL, NULL),
(53, 'VOLVO', NULL, NULL),
(54, 'DE SOTO', NULL, NULL),
(55, 'DETOMAZO', NULL, NULL),
(56, 'DELOREAN', NULL, NULL),
(57, 'DKW-VEMAG', NULL, NULL),
(59, 'SUZUKI', NULL, NULL),
(60, 'EAGLE', NULL, NULL),
(61, 'EFFA', NULL, NULL),
(63, 'ENGESA', NULL, NULL),
(64, 'ENVEMO', NULL, NULL),
(65, 'FARUS', NULL, NULL),
(66, 'FERCAR', NULL, NULL),
(68, 'FNM', NULL, NULL),
(69, 'PONTIAC', NULL, NULL),
(70, 'PORSCHE', NULL, NULL),
(72, 'GEO', NULL, NULL),
(74, 'GRANCAR', NULL, NULL),
(75, 'GREAT WALL', NULL, NULL),
(76, 'HAFEI', NULL, NULL),
(78, 'HOFSTETTER', NULL, NULL),
(79, 'HUDSON', NULL, NULL),
(80, 'HUMMER', NULL, NULL),
(82, 'INFINITI', NULL, NULL),
(83, 'INTERNATIONAL', NULL, NULL),
(86, 'JAGUAR', NULL, NULL),
(87, 'JEEP', NULL, NULL),
(88, 'JINBEI', NULL, NULL),
(89, 'JPX', NULL, NULL),
(90, 'KAISER', NULL, NULL),
(91, 'KOENIGSEGG', NULL, NULL),
(92, 'LAUTOMOBILE', NULL, NULL),
(93, 'LAUTOCRAFT', NULL, NULL),
(94, 'LADA', NULL, NULL),
(95, 'LANCIA', NULL, NULL),
(96, 'LAND ROVER', NULL, NULL),
(97, 'LEXUS', NULL, NULL),
(98, 'LIFAN', NULL, NULL),
(99, 'LINCOLN', NULL, NULL),
(100, 'LOBINI', NULL, NULL),
(101, 'LOTUS', NULL, NULL),
(102, 'MAHINDRA', NULL, NULL),
(104, 'MASERATI', NULL, NULL),
(106, 'MATRA', NULL, NULL),
(107, 'MAYBACH', NULL, NULL),
(108, 'MAZDA', NULL, NULL),
(109, 'MENON', NULL, NULL),
(110, 'MERCURY', NULL, NULL),
(111, 'MITSUBISHI', NULL, NULL),
(112, 'MG', NULL, NULL),
(113, 'MINI', NULL, NULL),
(114, 'MIURA', NULL, NULL),
(115, 'MORRIS', NULL, NULL),
(116, 'MP LAFER', NULL, NULL),
(117, 'MPLM', NULL, NULL),
(118, 'NEWTRACK', NULL, NULL),
(119, 'NISSIN', NULL, NULL),
(120, 'OLDSMOBILE', NULL, NULL),
(121, 'PAG', NULL, NULL),
(122, 'PAGANI', NULL, NULL),
(123, 'PLYMOUTH', NULL, NULL),
(124, 'PUMA', NULL, NULL),
(125, 'RENO', NULL, NULL),
(126, 'REVA-I', NULL, NULL),
(127, 'ROLLS-ROYCE', NULL, NULL),
(129, 'ROMI', NULL, NULL),
(130, 'SEAT', NULL, NULL),
(131, 'UTILITARIOS AGRICOLAS', NULL, NULL),
(132, 'SHINERAY', NULL, NULL),
(137, 'SAAB', NULL, NULL),
(139, 'SHORT', NULL, NULL),
(141, 'SIMCA', NULL, NULL),
(142, 'SMART', NULL, NULL),
(143, 'SPYKER', NULL, NULL),
(144, 'STANDARD', NULL, NULL),
(145, 'STUDEBAKER', NULL, NULL),
(146, 'TAC', NULL, NULL),
(147, 'TANGER', NULL, NULL),
(148, 'TRIUMPH', NULL, NULL),
(149, 'TROLLER', NULL, NULL),
(150, 'UNIMOG', NULL, NULL),
(154, 'WIESMANN', NULL, NULL),
(155, 'CADILLAC', NULL, NULL),
(156, 'AM GEN', NULL, NULL),
(157, 'BUGGY', NULL, NULL),
(158, 'WILLYS OVERLAND', NULL, NULL),
(161, 'KASEA', NULL, NULL),
(162, 'SATURN', NULL, NULL),
(163, 'SWELL MINI', NULL, NULL),
(175, 'SKODA', NULL, NULL),
(239, 'KARMANN GHIA', NULL, NULL),
(254, 'KART', NULL, NULL),
(258, 'HANOMAG', NULL, NULL),
(261, 'OUTROS', NULL, NULL),
(265, 'HILLMAN', NULL, NULL),
(288, 'HRG', NULL, NULL),
(295, 'GAIOLA', NULL, NULL),
(338, 'TATA', NULL, NULL),
(341, 'DITALLY', NULL, NULL),
(345, 'RELY', NULL, NULL),
(346, 'MCLAREN', NULL, NULL),
(534, 'GEELY', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `viatura_modelos`
--

CREATE TABLE `viatura_modelos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_marca` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `viatura_modelos`
--

INSERT INTO `viatura_modelos` (`id`, `nome`, `id_marca`, `created_at`, `updated_at`) VALUES
(1, 'INTEGRA', 25, NULL, NULL),
(2, 'LEGEND', 25, NULL, NULL),
(3, 'NSX', 25, NULL, NULL),
(4, 'MARRUA', 27, NULL, NULL),
(5, '145', 28, NULL, NULL),
(6, '147', 28, NULL, NULL),
(7, '155', 28, NULL, NULL),
(8, '156', 28, NULL, NULL),
(9, '164', 28, NULL, NULL),
(10, '166', 28, NULL, NULL),
(11, '2300', 28, NULL, NULL),
(12, 'SPIDER', 28, NULL, NULL),
(13, 'HUMMER', 156, NULL, NULL),
(14, 'AM-825', 16, NULL, NULL),
(15, 'HI-TOPIC', 16, NULL, NULL),
(16, 'ROCSTA', 16, NULL, NULL),
(17, 'TOPIC', 16, NULL, NULL),
(18, 'TOWNER', 16, NULL, NULL),
(19, '100', 32, NULL, NULL),
(20, '80', 32, NULL, NULL),
(21, 'A1', 32, NULL, NULL),
(22, 'A3', 32, NULL, NULL),
(23, 'A4 SEDAN', 32, NULL, NULL),
(24, 'A5 COUPE', 32, NULL, NULL),
(25, 'A6 SEDAN', 32, NULL, NULL),
(26, 'A7', 32, NULL, NULL),
(27, 'A8', 32, NULL, NULL),
(30, 'Q3', 32, NULL, NULL),
(31, 'Q5', 32, NULL, NULL),
(32, 'Q7', 32, NULL, NULL),
(33, 'R8', 32, NULL, NULL),
(34, 'RS3', 32, NULL, NULL),
(35, 'RS4', 32, NULL, NULL),
(36, 'RS5', 32, NULL, NULL),
(37, 'RS6', 32, NULL, NULL),
(38, 'S3', 32, NULL, NULL),
(39, 'S4 SEDAN', 32, NULL, NULL),
(40, 'S6 SEDAN', 32, NULL, NULL),
(41, 'S8', 32, NULL, NULL),
(42, 'TT', 32, NULL, NULL),
(43, 'TTS', 32, NULL, NULL),
(86, 'BUGGY', 157, NULL, NULL),
(87, 'DEVILLE', 155, NULL, NULL),
(88, 'ELDORADO', 155, NULL, NULL),
(89, 'SEVILLE', 155, NULL, NULL),
(90, 'JAVALI', 42, NULL, NULL),
(92, 'MINI STAR FAMILY', 6, NULL, NULL),
(93, 'MINI STAR UTILITY', 6, NULL, NULL),
(95, 'CIELO', 47, NULL, NULL),
(96, 'FACE', 47, NULL, NULL),
(97, 'QQ', 47, NULL, NULL),
(98, 'S-18', 47, NULL, NULL),
(99, 'TIGGO', 47, NULL, NULL),
(100, '300C', 19, NULL, NULL),
(101, 'CARAVAN', 19, NULL, NULL),
(102, 'CIRRUS', 19, NULL, NULL),
(103, 'GRAN CARAVAN', 19, NULL, NULL),
(104, 'LE BARON', 19, NULL, NULL),
(105, 'NEON', 19, NULL, NULL),
(106, 'PT CRUISER', 19, NULL, NULL),
(107, 'SEBRING', 19, NULL, NULL),
(108, 'STRATUS', 19, NULL, NULL),
(109, 'TOWN E COUNTRY', 19, NULL, NULL),
(110, 'VISION', 19, NULL, NULL),
(111, 'AIRCROSS', 5, NULL, NULL),
(112, 'AX', 5, NULL, NULL),
(113, 'BERLINGO', 5, NULL, NULL),
(114, 'BX', 5, NULL, NULL),
(115, 'C3', 5, NULL, NULL),
(116, 'C4', 5, NULL, NULL),
(117, 'C5', 5, NULL, NULL),
(118, 'C6', 5, NULL, NULL),
(119, 'C8', 5, NULL, NULL),
(120, 'DS3', 5, NULL, NULL),
(121, 'EVASION', 5, NULL, NULL),
(122, 'JUMPER', 5, NULL, NULL),
(123, 'XANTIA', 5, NULL, NULL),
(124, 'XM', 5, NULL, NULL),
(125, 'XSARA', 5, NULL, NULL),
(126, 'ZX', 5, NULL, NULL),
(127, 'CL-244', 50, NULL, NULL),
(128, 'CL-330', 50, NULL, NULL),
(129, 'ESPERO', 51, NULL, NULL),
(130, 'LANOS', 51, NULL, NULL),
(131, 'LEGANZA', 51, NULL, NULL),
(132, 'NUBIRA', 51, NULL, NULL),
(133, 'PRINCE', 51, NULL, NULL),
(134, 'RACER', 51, NULL, NULL),
(135, 'SUPER SALON', 51, NULL, NULL),
(136, 'TICO', 51, NULL, NULL),
(137, 'APPLAUSE', 52, NULL, NULL),
(138, 'CHARADE', 52, NULL, NULL),
(139, 'CUORE', 52, NULL, NULL),
(140, 'FEROZA', 52, NULL, NULL),
(141, 'GRAN MOVE', 52, NULL, NULL),
(142, 'MOVE VAN', 52, NULL, NULL),
(143, 'TERIOS', 52, NULL, NULL),
(144, 'AVENGER', 18, NULL, NULL),
(145, 'DAKOTA', 18, NULL, NULL),
(146, 'JOURNEY', 18, NULL, NULL),
(147, 'RAM', 18, NULL, NULL),
(148, 'STEALTH', 18, NULL, NULL),
(151, 'M-100', 61, NULL, NULL),
(152, 'PLUTUS', 61, NULL, NULL),
(153, 'START', 61, NULL, NULL),
(155, 'ULC', 61, NULL, NULL),
(158, 'ENGESA', 63, NULL, NULL),
(159, 'CAMPER', 64, NULL, NULL),
(160, 'MASTER', 64, NULL, NULL),
(161, '348', 10, NULL, NULL),
(162, '355', 10, NULL, NULL),
(163, '360', 10, NULL, NULL),
(164, '456', 10, NULL, NULL),
(165, '550', 10, NULL, NULL),
(166, '575M', 10, NULL, NULL),
(167, '612', 10, NULL, NULL),
(168, 'CALIFORNIA', 10, NULL, NULL),
(169, 'F430', 10, NULL, NULL),
(170, 'F599', 10, NULL, NULL),
(171, '147', 3, NULL, NULL),
(174, '500', 3, NULL, NULL),
(175, 'BRAVA', 3, NULL, NULL),
(176, 'BRAVO', 3, NULL, NULL),
(178, 'COUPE', 3, NULL, NULL),
(179, 'DOBLO', 3, NULL, NULL),
(180, 'DUCATO CARGO', 3, NULL, NULL),
(181, 'DUNA', 3, NULL, NULL),
(182, 'ELBA', 3, NULL, NULL),
(183, 'FIORINO', 3, NULL, NULL),
(184, 'FREEMONT', 3, NULL, NULL),
(185, 'GRAND SIENA', 3, NULL, NULL),
(186, 'IDEA', 3, NULL, NULL),
(187, 'LINEA', 3, NULL, NULL),
(188, 'MAREA', 3, NULL, NULL),
(189, 'OGGI', 3, NULL, NULL),
(190, 'PALIO', 3, NULL, NULL),
(191, 'PANORAMA', 3, NULL, NULL),
(192, 'PREMIO', 3, NULL, NULL),
(193, 'PUNTO', 3, NULL, NULL),
(194, 'SIENA', 3, NULL, NULL),
(195, 'STILO', 3, NULL, NULL),
(196, 'STRADA', 3, NULL, NULL),
(197, 'TEMPRA', 3, NULL, NULL),
(198, 'TIPO', 3, NULL, NULL),
(199, 'UNO', 3, NULL, NULL),
(201, 'AEROSTAR', 13, NULL, NULL),
(202, 'ASPIRE', 13, NULL, NULL),
(203, 'BELINA', 13, NULL, NULL),
(204, 'CLUB WAGON', 13, NULL, NULL),
(205, 'CONTOUR', 13, NULL, NULL),
(206, 'CORCEL II', 13, NULL, NULL),
(207, 'COURIER', 13, NULL, NULL),
(208, 'CROWN VICTORIA', 13, NULL, NULL),
(209, 'DEL REY', 13, NULL, NULL),
(210, 'ECOSPORT', 13, NULL, NULL),
(211, 'EDGE', 13, NULL, NULL),
(212, 'ESCORT', 13, NULL, NULL),
(213, 'EXPEDITION', 13, NULL, NULL),
(214, 'EXPLORER', 13, NULL, NULL),
(215, 'F-100', 13, NULL, NULL),
(216, 'F-1000', 13, NULL, NULL),
(217, 'F-150', 13, NULL, NULL),
(218, 'F-250', 13, NULL, NULL),
(219, 'FIESTA', 13, NULL, NULL),
(220, 'FOCUS', 13, NULL, NULL),
(221, 'FURGLAINE', 13, NULL, NULL),
(222, 'FUSION', 13, NULL, NULL),
(223, 'IBIZA', 13, NULL, NULL),
(224, 'KA', 13, NULL, NULL),
(225, 'MONDEO', 13, NULL, NULL),
(226, 'MUSTANG', 13, NULL, NULL),
(227, 'PAMPA', 13, NULL, NULL),
(228, 'PROBE', 13, NULL, NULL),
(229, 'RANGER', 13, NULL, NULL),
(230, 'VERSAILLES ROYALE', 13, NULL, NULL),
(231, 'TAURUS', 13, NULL, NULL),
(232, 'THUNDERBIRD', 13, NULL, NULL),
(233, 'TRANSIT', 13, NULL, NULL),
(234, 'VERONA', 13, NULL, NULL),
(235, 'VERSAILLES', 13, NULL, NULL),
(236, 'WINDSTAR', 13, NULL, NULL),
(238, 'A-10', 1, NULL, NULL),
(239, 'A-20', 1, NULL, NULL),
(240, 'AGILE', 1, NULL, NULL),
(241, 'ASTRA', 1, NULL, NULL),
(242, 'BLAZER', 1, NULL, NULL),
(243, 'BONANZA', 1, NULL, NULL),
(245, 'C-10', 1, NULL, NULL),
(246, 'C-20', 1, NULL, NULL),
(247, 'CALIBRA', 1, NULL, NULL),
(248, 'CAMARO', 1, NULL, NULL),
(249, 'CAPRICE', 1, NULL, NULL),
(250, 'CAPTIVA', 1, NULL, NULL),
(251, 'CARAVAN', 1, NULL, NULL),
(252, 'CAVALIER', 1, NULL, NULL),
(253, 'CELTA', 1, NULL, NULL),
(255, 'CHEVY', 1, NULL, NULL),
(256, 'CHEYNNE', 1, NULL, NULL),
(258, 'COBALT', 1, NULL, NULL),
(259, 'CORSA', 1, NULL, NULL),
(262, 'CORVETTE', 1, NULL, NULL),
(263, 'CRUZE', 1, NULL, NULL),
(264, 'D-10', 1, NULL, NULL),
(265, 'D-20', 1, NULL, NULL),
(266, 'IPANEMA', 1, NULL, NULL),
(267, 'KADETT', 1, NULL, NULL),
(268, 'LUMINA', 1, NULL, NULL),
(269, 'MALIBU', 1, NULL, NULL),
(271, 'MERIVA', 1, NULL, NULL),
(272, 'MONTANA', 1, NULL, NULL),
(274, 'OMEGA', 1, NULL, NULL),
(275, 'OPALA', 1, NULL, NULL),
(276, 'PRISMA', 1, NULL, NULL),
(277, 'S10', 1, NULL, NULL),
(280, 'SILVERADO', 1, NULL, NULL),
(281, 'SONIC', 1, NULL, NULL),
(282, 'SONOMA', 1, NULL, NULL),
(283, 'SPACEVAN', 1, NULL, NULL),
(284, 'SS10', 1, NULL, NULL),
(285, 'SUBURBAN', 1, NULL, NULL),
(287, 'SYCLONE', 1, NULL, NULL),
(288, 'TIGRA', 1, NULL, NULL),
(289, 'TRACKER', 1, NULL, NULL),
(290, 'TRAFIC', 1, NULL, NULL),
(291, 'VECTRA', 1, NULL, NULL),
(292, 'VERANEIO', 1, NULL, NULL),
(293, 'ZAFIRA', 1, NULL, NULL),
(294, 'HOVER', 75, NULL, NULL),
(295, 'BR-800', 17, NULL, NULL),
(296, 'CARAJAS', 17, NULL, NULL),
(297, 'TOCANTINS', 17, NULL, NULL),
(298, 'XAVANTE', 17, NULL, NULL),
(299, 'VIP', 17, NULL, NULL),
(300, 'TOWNER', 76, NULL, NULL),
(301, 'ACCORD', 7, NULL, NULL),
(302, 'CITY', 7, NULL, NULL),
(303, 'CIVIC', 7, NULL, NULL),
(304, 'CR-V', 7, NULL, NULL),
(305, 'FIT', 7, NULL, NULL),
(306, 'ODYSSEY', 7, NULL, NULL),
(307, 'PASSPORT', 7, NULL, NULL),
(308, 'PRELUDE', 7, NULL, NULL),
(309, 'ACCENT', 14, NULL, NULL),
(310, 'ATOS', 14, NULL, NULL),
(311, 'AZERA', 14, NULL, NULL),
(312, 'COUPE', 14, NULL, NULL),
(314, 'ELANTRA', 14, NULL, NULL),
(315, 'EXCEL', 14, NULL, NULL),
(316, 'GALLOPER', 14, NULL, NULL),
(317, 'GENESIS', 14, NULL, NULL),
(318, 'H1', 14, NULL, NULL),
(319, 'H100', 14, NULL, NULL),
(321, 'I30', 14, NULL, NULL),
(323, 'IX35', 14, NULL, NULL),
(324, 'MATRIX', 14, NULL, NULL),
(325, 'PORTER', 14, NULL, NULL),
(326, 'SANTA FE', 14, NULL, NULL),
(327, 'SCOUPE', 14, NULL, NULL),
(328, 'SONATA', 14, NULL, NULL),
(329, 'TERRACAN', 14, NULL, NULL),
(330, 'TRAJET', 14, NULL, NULL),
(331, 'TUCSON', 14, NULL, NULL),
(332, 'VELOSTER', 14, NULL, NULL),
(333, 'VERACRUZ', 14, NULL, NULL),
(334, 'AMIGO', 84, NULL, NULL),
(335, 'HOMBRE', 84, NULL, NULL),
(336, 'RODEO', 84, NULL, NULL),
(337, 'J3', 15, NULL, NULL),
(338, 'J5', 15, NULL, NULL),
(339, 'J6', 15, NULL, NULL),
(340, 'DAIMLER', 86, NULL, NULL),
(341, 'S-TYPE', 86, NULL, NULL),
(342, 'X-TYPE', 86, NULL, NULL),
(345, 'MODELOS XJ', 86, NULL, NULL),
(352, 'MODELOS XK', 86, NULL, NULL),
(354, 'CHEROKEE', 87, NULL, NULL),
(355, 'COMMANDER', 87, NULL, NULL),
(356, 'COMPASS', 87, NULL, NULL),
(357, 'GRAND CHEROKEE', 87, NULL, NULL),
(358, 'WRANGLER', 87, NULL, NULL),
(359, 'TOPIC VAN', 88, NULL, NULL),
(360, 'JIPE MONTEZ', 89, NULL, NULL),
(361, 'PICAPE MONTEZ', 89, NULL, NULL),
(362, 'BESTA', 16, NULL, NULL),
(363, 'BONGO', 16, NULL, NULL),
(364, 'CADENZA', 16, NULL, NULL),
(365, 'CARENS', 16, NULL, NULL),
(366, 'CARNIVAL', 16, NULL, NULL),
(367, 'CERATO', 16, NULL, NULL),
(368, 'CERES', 16, NULL, NULL),
(369, 'CLARUS', 16, NULL, NULL),
(370, 'MAGENTIS', 16, NULL, NULL),
(371, 'MOHAVE', 16, NULL, NULL),
(372, 'OPIRUS', 16, NULL, NULL),
(373, 'OPTIMA', 16, NULL, NULL),
(374, 'PICANTO', 16, NULL, NULL),
(375, 'SEPHIA', 16, NULL, NULL),
(376, 'SHUMA', 16, NULL, NULL),
(377, 'SORENTO', 16, NULL, NULL),
(378, 'SOUL', 16, NULL, NULL),
(379, 'SPORTAGE', 16, NULL, NULL),
(380, 'LAIKA', 94, NULL, NULL),
(381, 'NIVA', 94, NULL, NULL),
(382, 'SAMARA', 94, NULL, NULL),
(383, 'GALLARDO', 12, NULL, NULL),
(384, 'MURCIELAGO', 12, NULL, NULL),
(385, 'DEFENDER', 96, NULL, NULL),
(386, 'DISCOVERY', 96, NULL, NULL),
(389, 'FREELANDER', 96, NULL, NULL),
(391, 'NEW RANGE', 96, NULL, NULL),
(392, 'RANGE ROVER', 96, NULL, NULL),
(393, 'ES', 97, NULL, NULL),
(396, 'GS', 97, NULL, NULL),
(397, 'IS-300', 97, NULL, NULL),
(398, 'LS', 97, NULL, NULL),
(400, 'RX', 97, NULL, NULL),
(402, 'SC', 97, NULL, NULL),
(403, '320', 98, NULL, NULL),
(404, '620', 98, NULL, NULL),
(405, 'H1', 100, NULL, NULL),
(406, 'ELAN', 101, NULL, NULL),
(407, 'ESPRIT', 101, NULL, NULL),
(408, 'SCORPIO', 102, NULL, NULL),
(409, '222', 104, NULL, NULL),
(410, '228', 104, NULL, NULL),
(411, '3200', 104, NULL, NULL),
(412, '430', 104, NULL, NULL),
(413, 'COUPE', 104, NULL, NULL),
(414, 'GHIBLI', 104, NULL, NULL),
(415, 'GRANCABRIO', 104, NULL, NULL),
(416, 'GRANSPORT', 104, NULL, NULL),
(417, 'GRANTURISMO', 104, NULL, NULL),
(418, 'QUATTROPORTE', 104, NULL, NULL),
(419, 'SHAMAL', 104, NULL, NULL),
(420, 'SPIDER', 104, NULL, NULL),
(422, 'PICK-UP', 106, NULL, NULL),
(423, '323', 108, NULL, NULL),
(424, '626', 108, NULL, NULL),
(425, '929', 108, NULL, NULL),
(426, 'B-2500', 108, NULL, NULL),
(427, 'B2200', 108, NULL, NULL),
(428, 'MILLENIA', 108, NULL, NULL),
(429, 'MPV', 108, NULL, NULL),
(430, 'MX-3', 108, NULL, NULL),
(431, 'MX-5', 108, NULL, NULL),
(432, 'NAVAJO', 108, NULL, NULL),
(433, 'PROTEGE', 108, NULL, NULL),
(434, 'RX', 108, NULL, NULL),
(467, 'CLASSE A', 4, NULL, NULL),
(468, 'CLASSE B', 4, NULL, NULL),
(469, 'CLASSE R', 4, NULL, NULL),
(498, 'CLASSE GLK', 4, NULL, NULL),
(531, 'SPRINTER', 4, NULL, NULL),
(532, 'MYSTIQUE', 110, NULL, NULL),
(533, 'SABLE', 110, NULL, NULL),
(534, '550', 112, NULL, NULL),
(535, 'MG6', 112, NULL, NULL),
(536, 'COOPER', 113, NULL, NULL),
(537, 'ONE', 113, NULL, NULL),
(538, '3000', 111, NULL, NULL),
(539, 'AIRTREK', 111, NULL, NULL),
(540, 'ASX', 111, NULL, NULL),
(541, 'COLT', 111, NULL, NULL),
(542, 'DIAMANT', 111, NULL, NULL),
(543, 'ECLIPSE', 111, NULL, NULL),
(544, 'EXPO', 111, NULL, NULL),
(545, 'GALANT', 111, NULL, NULL),
(546, 'GRANDIS', 111, NULL, NULL),
(547, 'L200', 111, NULL, NULL),
(548, 'L300', 111, NULL, NULL),
(549, 'LANCER', 111, NULL, NULL),
(550, 'MIRAGE', 111, NULL, NULL),
(551, 'MONTERO', 111, NULL, NULL),
(552, 'OUTLANDER', 111, NULL, NULL),
(553, 'PAJERO', 111, NULL, NULL),
(554, 'SPACE WAGON', 111, NULL, NULL),
(555, 'BG-TRUCK', 114, NULL, NULL),
(556, '350Z', 43, NULL, NULL),
(557, 'ALTIMA', 43, NULL, NULL),
(558, 'AX', 43, NULL, NULL),
(559, 'D-21', 43, NULL, NULL),
(560, 'FRONTIER', 43, NULL, NULL),
(562, 'KING-CAB', 43, NULL, NULL),
(563, 'LIVINA', 43, NULL, NULL),
(564, 'MARCH', 43, NULL, NULL),
(565, 'MAXIMA', 43, NULL, NULL),
(567, 'MURANO', 43, NULL, NULL),
(568, 'NX', 43, NULL, NULL),
(569, 'PATHFINDER', 43, NULL, NULL),
(571, 'PRIMERA', 43, NULL, NULL),
(572, 'QUEST', 43, NULL, NULL),
(573, 'SENTRA', 43, NULL, NULL),
(574, 'STANZA', 43, NULL, NULL),
(575, '180SX', 43, NULL, NULL),
(576, 'TERRANO', 43, NULL, NULL),
(577, 'TIIDA', 43, NULL, NULL),
(578, 'VERSA', 43, NULL, NULL),
(579, 'X-TRAIL', 43, NULL, NULL),
(580, 'XTERRA', 43, NULL, NULL),
(581, 'ZX', 43, NULL, NULL),
(582, '106', 22, NULL, NULL),
(583, '205', 22, NULL, NULL),
(584, '206', 22, NULL, NULL),
(585, '207', 22, NULL, NULL),
(586, '3008', 22, NULL, NULL),
(587, '306', 22, NULL, NULL),
(588, '307', 22, NULL, NULL),
(589, '308', 22, NULL, NULL),
(590, '405', 22, NULL, NULL),
(591, '406', 22, NULL, NULL),
(592, '407', 22, NULL, NULL),
(593, '408', 22, NULL, NULL),
(594, '504', 22, NULL, NULL),
(595, '505', 22, NULL, NULL),
(596, '508', 22, NULL, NULL),
(597, '605', 22, NULL, NULL),
(598, '607', 22, NULL, NULL),
(599, '806', 22, NULL, NULL),
(600, '807', 22, NULL, NULL),
(601, 'BOXER', 22, NULL, NULL),
(602, 'HOGGAR', 22, NULL, NULL),
(603, 'PARTNER', 22, NULL, NULL),
(604, 'RCZ', 22, NULL, NULL),
(605, 'GRAN VOYAGER', 123, NULL, NULL),
(606, 'SUNDANCE', 123, NULL, NULL),
(607, 'TRANS-AM', 69, NULL, NULL),
(608, 'TRANS-SPORT', 69, NULL, NULL),
(609, '911', 70, NULL, NULL),
(612, 'BOXSTER', 70, NULL, NULL),
(613, 'CAYENNE', 70, NULL, NULL),
(614, 'CAYMAN', 70, NULL, NULL),
(615, 'PANAMERA', 70, NULL, NULL),
(617, '21 SEDAN', 24, NULL, NULL),
(618, 'CLIO', 24, NULL, NULL),
(619, 'DUSTER', 24, NULL, NULL),
(620, 'EXPRESS', 24, NULL, NULL),
(621, 'FLUENCE', 24, NULL, NULL),
(622, 'KANGOO', 24, NULL, NULL),
(623, 'LAGUNA', 24, NULL, NULL),
(624, 'LOGAN', 24, NULL, NULL),
(625, 'MASTER', 24, NULL, NULL),
(626, 'MEGANE', 24, NULL, NULL),
(627, 'SAFRANE', 24, NULL, NULL),
(628, 'SANDERO', 24, NULL, NULL),
(629, 'SCENIC', 24, NULL, NULL),
(630, 'SYMBOL', 24, NULL, NULL),
(631, 'TRAFIC', 24, NULL, NULL),
(632, 'TWINGO', 24, NULL, NULL),
(634, '9000', 137, NULL, NULL),
(635, 'SL-2', 162, NULL, NULL),
(636, 'CORDOBA', 130, NULL, NULL),
(637, 'IBIZA', 130, NULL, NULL),
(638, 'INCA', 130, NULL, NULL),
(641, 'FORTWO', 142, NULL, NULL),
(642, 'ACTYON SPORTS', 21, NULL, NULL),
(643, 'CHAIRMAN', 21, NULL, NULL),
(644, 'ISTANA', 21, NULL, NULL),
(645, 'KORANDO', 21, NULL, NULL),
(646, 'KYRON', 21, NULL, NULL),
(647, 'MUSSO', 21, NULL, NULL),
(648, 'REXTON', 21, NULL, NULL),
(649, 'FORESTER', 8, NULL, NULL),
(650, 'IMPREZA', 8, NULL, NULL),
(651, 'LEGACY', 8, NULL, NULL),
(652, 'OUTBACK', 8, NULL, NULL),
(653, 'SVX', 8, NULL, NULL),
(654, 'TRIBECA', 8, NULL, NULL),
(655, 'VIVIO', 8, NULL, NULL),
(656, 'BALENO', 59, NULL, NULL),
(657, 'GRAND VITARA', 59, NULL, NULL),
(658, 'IGNIS', 59, NULL, NULL),
(660, 'JIMNY', 59, NULL, NULL),
(662, 'SUPER CARRY', 59, NULL, NULL),
(663, 'SWIFT', 59, NULL, NULL),
(664, 'SX4', 59, NULL, NULL),
(665, 'VITARA', 59, NULL, NULL),
(666, 'WAGON R', 59, NULL, NULL),
(667, 'STARK', 146, NULL, NULL),
(668, 'AVALON', 23, NULL, NULL),
(669, 'BANDEIRANTE', 23, NULL, NULL),
(670, 'CAMRY', 23, NULL, NULL),
(671, 'CELICA', 23, NULL, NULL),
(672, 'COROLLA', 23, NULL, NULL),
(673, 'CORONA', 23, NULL, NULL),
(674, 'HILUX', 23, NULL, NULL),
(675, 'LAND CRUISER', 23, NULL, NULL),
(676, 'MR-2', 23, NULL, NULL),
(677, 'PASEO', 23, NULL, NULL),
(678, 'PREVIA', 23, NULL, NULL),
(679, 'RAV4', 23, NULL, NULL),
(680, 'SUPRA', 23, NULL, NULL),
(682, 'PANTANAL', 149, NULL, NULL),
(684, 'T-4', 149, NULL, NULL),
(685, '400 SERIES', 53, NULL, NULL),
(687, '850', 53, NULL, NULL),
(688, '900 SERIES', 53, NULL, NULL),
(700, 'AMAROK', 2, NULL, NULL),
(701, 'APOLLO', 2, NULL, NULL),
(702, 'BORA', 2, NULL, NULL),
(703, 'CARAVELLE', 2, NULL, NULL),
(704, 'CORRADO', 2, NULL, NULL),
(706, 'EOS', 2, NULL, NULL),
(707, 'EUROVAN', 2, NULL, NULL),
(708, 'FOX', 2, NULL, NULL),
(709, 'FUSCA', 2, NULL, NULL),
(710, 'GOL', 2, NULL, NULL),
(711, 'GOLF', 2, NULL, NULL),
(713, 'JETTA', 2, NULL, NULL),
(714, 'KOMBI', 2, NULL, NULL),
(715, 'LOGUS', 2, NULL, NULL),
(717, 'PARATI', 2, NULL, NULL),
(718, 'PASSAT', 2, NULL, NULL),
(719, 'POINTER', 2, NULL, NULL),
(720, 'POLO', 2, NULL, NULL),
(722, 'SANTANA', 2, NULL, NULL),
(723, 'SAVEIRO', 2, NULL, NULL),
(725, 'SPACEFOX', 2, NULL, NULL),
(726, 'TIGUAN', 2, NULL, NULL),
(727, 'TOUAREG', 2, NULL, NULL),
(729, 'VOYAGE', 2, NULL, NULL),
(732, 'ZDX', 25, NULL, NULL),
(737, '140', 3, NULL, NULL),
(755, 'BRASILIA', 2, NULL, NULL),
(756, 'BRASILVAN', 13, NULL, NULL),
(775, 'CORCEL', 13, NULL, NULL),
(803, 'PALIO WEEKEND', 3, NULL, NULL),
(806, 'FOCUS SEDAN', 13, NULL, NULL),
(807, 'FIESTA SEDAN', 13, NULL, NULL),
(808, 'FIESTA TRAIL', 13, NULL, NULL),
(810, '207 SW', 22, NULL, NULL),
(811, 'ESCORT SW', 13, NULL, NULL),
(812, '307 SEDAN', 22, NULL, NULL),
(813, '307 SW', 22, NULL, NULL),
(815, 'C4 PALLAS', 5, NULL, NULL),
(816, 'C4 PICASSO', 5, NULL, NULL),
(817, 'C4 VTR', 5, NULL, NULL),
(818, 'CLIO SEDAN', 24, NULL, NULL),
(819, 'COROLLA FIELDER', 23, NULL, NULL),
(824, 'HILUX SW4', 23, NULL, NULL),
(825, 'MEGANE GRAND TOUR', 24, NULL, NULL),
(827, 'SANDERO STEPWAY', 24, NULL, NULL),
(829, 'XSARA PICASSO', 5, NULL, NULL),
(1360, 'COLHEITADEIRA', 131, NULL, NULL),
(1361, 'PICKUP F75', 158, NULL, NULL),
(1362, 'X12', 17, NULL, NULL),
(1365, 'BEL AIR', 1, NULL, NULL),
(1366, 'RX', 36, NULL, NULL),
(1369, 'C-14', 1, NULL, NULL),
(1370, 'SRX4', 155, NULL, NULL),
(1372, 'C-15', 1, NULL, NULL),
(1373, 'BRASIL', 1, NULL, NULL),
(1377, 'POLARA', 18, NULL, NULL),
(1380, '600', 3, NULL, NULL),
(1382, 'F-01', 13, NULL, NULL),
(1383, 'FALCON', 13, NULL, NULL),
(1384, 'GALAXIE', 13, NULL, NULL),
(1386, 'MAVERICK', 13, NULL, NULL),
(1387, 'MODELO A', 13, NULL, NULL),
(1388, 'NEW FIESTA', 13, NULL, NULL),
(1389, 'LINHA FX', 82, NULL, NULL),
(1391, 'GTS', 124, NULL, NULL),
(1392, 'H3', 80, NULL, NULL),
(1394, 'PRIME', 14, NULL, NULL),
(1395, 'TIBURON', 14, NULL, NULL),
(1397, 'JEEP', 87, NULL, NULL),
(1398, 'CJ5', 87, NULL, NULL),
(1399, 'TC', 239, NULL, NULL),
(1404, 'CLASSE CLC', 4, NULL, NULL),
(1405, 'CLASSE CLS', 4, NULL, NULL),
(1408, 'MONTEREY', 110, NULL, NULL),
(1411, 'TOPSPORT', 114, NULL, NULL),
(1412, 'TARGA', 114, NULL, NULL),
(1414, 'X8', 114, NULL, NULL),
(1415, '370Z', 43, NULL, NULL),
(1418, 'GTB', 124, NULL, NULL),
(1419, 'GTC', 124, NULL, NULL),
(1420, 'GTE', 124, NULL, NULL),
(1421, 'AUSTIN', 115, NULL, NULL),
(1423, '7TL', 24, NULL, NULL),
(1424, '19', 24, NULL, NULL),
(1426, 'CONVERSÍVEL', 175, NULL, NULL),
(1427, 'SUPERMINI', 17, NULL, NULL),
(1428, 'TL', 2, NULL, NULL),
(1429, 'TOPOLINO', 3, NULL, NULL),
(1430, 'SR5', 23, NULL, NULL),
(1431, 'VITZ', 23, NULL, NULL),
(1432, 'VARIANT', 2, NULL, NULL),
(1454, 'CANDANGO', 57, NULL, NULL),
(1460, 'SP2', 2, NULL, NULL),
(1466, 'RECORB', 258, NULL, NULL),
(1467, 'POLAUTO', 2, NULL, NULL),
(1508, 'GORDINI', 24, NULL, NULL),
(1509, 'MINX', 265, NULL, NULL),
(1971, 'ETIOS', 23, NULL, NULL),
(1972, 'ONIX', 1, NULL, NULL),
(1973, 'HB20', 14, NULL, NULL),
(1975, '330', 36, NULL, NULL),
(1976, '520', 36, NULL, NULL),
(1978, '730', 36, NULL, NULL),
(1980, 'M1', 36, NULL, NULL),
(1982, 'SERIE Z', 36, NULL, NULL),
(1983, 'CLASSE SLK', 4, NULL, NULL),
(1984, 'CLASSE C', 4, NULL, NULL),
(1985, 'CLASSE E', 4, NULL, NULL),
(1986, 'CLASSE CL', 4, NULL, NULL),
(1987, 'CLASSE CLK', 4, NULL, NULL),
(1988, 'CLASSE S', 4, NULL, NULL),
(1989, 'CLASSE SL', 4, NULL, NULL),
(1990, 'CLASSE SLS', 4, NULL, NULL),
(1991, 'CLASSE G', 4, NULL, NULL),
(1992, 'CLASSE GL', 4, NULL, NULL),
(1993, 'CLASSE M', 4, NULL, NULL),
(2032, '1500', 288, NULL, NULL),
(2061, 'EQUUS', 14, NULL, NULL),
(2067, '350 GT', 12, NULL, NULL),
(2068, '400 GT', 12, NULL, NULL),
(2069, 'MIURA', 12, NULL, NULL),
(2070, 'ISLERO', 12, NULL, NULL),
(2071, 'ESPADA', 12, NULL, NULL),
(2072, 'COUNTACH', 12, NULL, NULL),
(2073, 'DIABLO', 12, NULL, NULL),
(2074, 'ZAGATO', 12, NULL, NULL),
(2075, 'ALAR', 12, NULL, NULL),
(2076, 'LM002', 12, NULL, NULL),
(2077, 'REVENTON', 12, NULL, NULL),
(2078, 'ANKONIAN', 12, NULL, NULL),
(2080, 'AVENTADOR', 12, NULL, NULL),
(2081, 'SESTO ELEMENTO', 12, NULL, NULL),
(2082, 'J3 TURIN', 15, NULL, NULL),
(2083, 'J2', 15, NULL, NULL),
(2084, 'SANDERO GT', 24, NULL, NULL),
(2087, 'SPIN', 1, NULL, NULL),
(2088, 'TRAILBLAZER', 1, NULL, NULL),
(2097, 'C3 PICASSO', 5, NULL, NULL),
(2098, 'GRAND C4 PICASSO', 5, NULL, NULL),
(2099, 'JUMPER MINIBUS', 5, NULL, NULL),
(2100, 'JUMPER VETRATO', 5, NULL, NULL),
(2101, '207 SEDAN', 22, NULL, NULL),
(2102, '207 QUIKSILVER', 22, NULL, NULL),
(2103, '207 ESCAPADE', 22, NULL, NULL),
(2104, '308 CC', 22, NULL, NULL),
(2105, 'BOXER PASSAGEIRO', 22, NULL, NULL),
(2106, 'NEW FIESTA SEDAN', 13, NULL, NULL),
(2108, 'TRANSIT PASSAGEIRO', 13, NULL, NULL),
(2109, 'TRANSIT CHASSI', 13, NULL, NULL),
(2110, 'A4 AVANT', 32, NULL, NULL),
(2111, 'S4 AVANT', 32, NULL, NULL),
(2112, 'A5 SPORTBACK', 32, NULL, NULL),
(2113, 'A5 CABRIOLET', 32, NULL, NULL),
(2114, 'S5 COUPE', 32, NULL, NULL),
(2115, 'S5 SPORTBACK', 32, NULL, NULL),
(2116, 'S5 CABRIOLET', 32, NULL, NULL),
(2117, 'A6 AVANT', 32, NULL, NULL),
(2118, 'A6 ALLROAD', 32, NULL, NULL),
(2119, 'S6 AVANT', 32, NULL, NULL),
(2120, 'S7', 32, NULL, NULL),
(2121, 'TT ROADSTER', 32, NULL, NULL),
(2122, 'TT RS', 32, NULL, NULL),
(2123, 'TT RS ROADSTER', 32, NULL, NULL),
(2124, 'TTS ROADSTER', 32, NULL, NULL),
(2125, 'R8 SPYDER', 32, NULL, NULL),
(2126, 'R8 GT', 32, NULL, NULL),
(2127, 'R8 GT SPYDER', 32, NULL, NULL),
(2129, 'F12', 10, NULL, NULL),
(2130, '458 SPIDER', 10, NULL, NULL),
(2131, '458 ITALIA', 10, NULL, NULL),
(2132, 'FF', 10, NULL, NULL),
(2133, '599', 10, NULL, NULL),
(2134, 'SA', 10, NULL, NULL),
(2135, 'CHALLENGE', 10, NULL, NULL),
(2136, 'SUPERAMERICA', 10, NULL, NULL),
(2137, 'F430 SPIDER', 10, NULL, NULL),
(2138, '430', 10, NULL, NULL),
(2139, '612 SESSANTA', 10, NULL, NULL),
(2140, '599 GTB', 10, NULL, NULL),
(2141, 'SCUDERIA SPIDER', 10, NULL, NULL),
(2142, '512', 10, NULL, NULL),
(2143, '456 GT', 10, NULL, NULL),
(2144, '348 GTS', 10, NULL, NULL),
(2145, '348 SPIDER', 10, NULL, NULL),
(2146, 'F355', 10, NULL, NULL),
(2147, 'F355 SPIDER', 10, NULL, NULL),
(2148, 'F50', 10, NULL, NULL),
(2149, '355 SPIDER', 10, NULL, NULL),
(2150, '360 MODENA', 10, NULL, NULL),
(2151, 'PAJERO FULL', 111, NULL, NULL),
(2152, 'PAJERO DAKAR', 111, NULL, NULL),
(2153, 'PAJERO TR4', 111, NULL, NULL),
(2154, 'LANCER SPORTBACK', 111, NULL, NULL),
(2155, 'LANCER EVOLUTION', 111, NULL, NULL),
(2156, 'L200 TRITON SAVANA', 111, NULL, NULL),
(2157, 'L200 TRITON', 111, NULL, NULL),
(2159, 'LIVINA X-GEAR', 43, NULL, NULL),
(2160, 'GRAND LIVINA', 43, NULL, NULL),
(2161, 'NEW ACTYON SPORTS', 21, NULL, NULL),
(2162, 'PRIUS', 23, NULL, NULL),
(2163, 'SPORT', 114, NULL, NULL),
(2164, 'MTS', 114, NULL, NULL),
(2165, 'SPIDER', 114, NULL, NULL),
(2166, 'KABRIO', 114, NULL, NULL),
(2167, 'SAGA', 114, NULL, NULL),
(2168, 'SAGA II', 114, NULL, NULL),
(2169, '787', 114, NULL, NULL),
(2170, 'X11', 114, NULL, NULL),
(2171, 'GAIOLA', 295, NULL, NULL),
(2175, 'NITRO', 18, NULL, NULL),
(2176, 'CHALLENGER', 18, NULL, NULL),
(2177, 'DART', 18, NULL, NULL),
(2178, 'LE BARON', 18, NULL, NULL),
(2179, 'CORDOBA', 18, NULL, NULL),
(2180, 'CHARGER', 18, NULL, NULL),
(2181, 'WINDSOR', 19, NULL, NULL),
(2183, 'CROSSFIRE', 19, NULL, NULL),
(2184, 'CORDOBA', 19, NULL, NULL),
(2185, 'ESCALADE', 155, NULL, NULL),
(2186, 'RIVIERA', 41, NULL, NULL),
(2187, 'COUPE', 41, NULL, NULL),
(2188, 'CENTURY', 41, NULL, NULL),
(2189, 'APOLLO', 41, NULL, NULL),
(2190, 'CENTURION', 41, NULL, NULL),
(2191, 'EIGHT', 41, NULL, NULL),
(2192, 'ELECTRA', 41, NULL, NULL),
(2193, 'ESTATE WAGON', 41, NULL, NULL),
(2194, 'GRAN SPORT', 41, NULL, NULL),
(2195, 'GSX', 41, NULL, NULL),
(2196, 'INVICTA', 41, NULL, NULL),
(2197, 'LESABRE', 41, NULL, NULL),
(2198, 'LIMITED', 41, NULL, NULL),
(2199, 'PARK AVENUE', 41, NULL, NULL),
(2200, 'RAINIER', 41, NULL, NULL),
(2201, 'REATTA', 41, NULL, NULL),
(2202, 'REGAL', 41, NULL, NULL),
(2203, 'RENDEZVOUS', 41, NULL, NULL),
(2204, 'ROADMASTER', 41, NULL, NULL),
(2205, 'ROYAUM', 41, NULL, NULL),
(2206, 'SKYHAWK', 41, NULL, NULL),
(2207, 'SKYLARK', 41, NULL, NULL),
(2208, 'SOMERSET', 41, NULL, NULL),
(2209, 'SPECIAL', 41, NULL, NULL),
(2210, 'SPORT WAGON', 41, NULL, NULL),
(2211, 'SUPER', 41, NULL, NULL),
(2212, 'TERRAZA', 41, NULL, NULL),
(2213, 'WILDCAT', 41, NULL, NULL),
(2214, 'LACROSSE', 41, NULL, NULL),
(2215, 'ENCLAVE', 41, NULL, NULL),
(2217, 'GL8', 41, NULL, NULL),
(2218, 'HRV', 41, NULL, NULL),
(2219, 'LUCERNE', 41, NULL, NULL),
(2230, 'SIERRA', 13, NULL, NULL),
(2231, 'BROUGHAM', 51, NULL, NULL),
(2232, 'CHAIRMAN', 51, NULL, NULL),
(2233, 'DAMAS', 51, NULL, NULL),
(2234, 'GENTRA', 51, NULL, NULL),
(2235, 'MAEPSY', 51, NULL, NULL),
(2236, 'ISTANA', 51, NULL, NULL),
(2237, 'KALOS', 51, NULL, NULL),
(2238, 'KORANDO', 51, NULL, NULL),
(2239, 'LACETTI', 51, NULL, NULL),
(2240, 'LEMANS', 51, NULL, NULL),
(2242, 'MATIZ', 51, NULL, NULL),
(2243, 'MUSSO', 51, NULL, NULL),
(2244, 'NEXIA', 51, NULL, NULL),
(2245, 'REZZO', 51, NULL, NULL),
(2246, 'ROYALE PRINCE', 51, NULL, NULL),
(2247, 'ROYALE SALON', 51, NULL, NULL),
(2248, 'STATESMAN', 51, NULL, NULL),
(2249, 'TOSCA', 51, NULL, NULL),
(2250, 'WINSTORM', 51, NULL, NULL),
(2252, 'RURAL', 158, NULL, NULL),
(2253, 'D100', 18, NULL, NULL),
(2259, '170', 4, NULL, NULL),
(2261, 'CUSTOM ROYAL', 18, NULL, NULL),
(2262, 'CLUB COUPE', 1, NULL, NULL),
(2263, 'MAGNUM', 18, NULL, NULL),
(2264, 'GMC 100', 1, NULL, NULL),
(2265, 'SOLSTICE', 69, NULL, NULL),
(2266, 'ITAMARATY', 158, NULL, NULL),
(2267, 'MARK V', 86, NULL, NULL),
(2268, 'GT', 124, NULL, NULL),
(2269, 'CHAMPION', 145, NULL, NULL),
(2270, 'BALILLA', 3, NULL, NULL),
(2271, 'INTERLAGOS', 158, NULL, NULL),
(2272, 'X15', 17, NULL, NULL),
(2273, 'F-85', 13, NULL, NULL),
(2274, 'SPEEDSTER 356', 70, NULL, NULL),
(2275, 'TOPIC FURGAO', 88, NULL, NULL),
(2276, 'TOPIC ESCOLAR', 88, NULL, NULL),
(2279, '300D', 4, NULL, NULL),
(2280, 'CLASSE TE', 4, NULL, NULL),
(2283, 'T-100', 23, NULL, NULL),
(2294, 'MEGANE SEDAN', 24, NULL, NULL),
(2295, 'A4 CABRIOLET', 32, NULL, NULL),
(2298, 'LINHA G', 82, NULL, NULL),
(2299, 'LINHA G COUPE', 82, NULL, NULL),
(2300, 'LINHA G CONVERSIVEL', 82, NULL, NULL),
(2301, 'LINHA M', 82, NULL, NULL),
(2302, 'LINHA EX', 82, NULL, NULL),
(2303, 'LINHA JX', 82, NULL, NULL),
(2304, 'LINHA QX', 82, NULL, NULL),
(2305, 'MODELOS XF', 86, NULL, NULL),
(2306, 'F-TYPE', 86, NULL, NULL),
(2307, 'MARK VII', 86, NULL, NULL),
(2308, 'MARK VIII', 86, NULL, NULL),
(2309, 'MARK IX', 86, NULL, NULL),
(2310, 'MARK X', 86, NULL, NULL),
(2311, 'E-TYPE', 86, NULL, NULL),
(2312, 'C-TYPE', 86, NULL, NULL),
(2313, 'D-TYPE', 86, NULL, NULL),
(2314, 'MARK I', 86, NULL, NULL),
(2315, 'MARK II', 86, NULL, NULL),
(2346, 'GT4R', 124, NULL, NULL),
(2347, 'SPYDER', 124, NULL, NULL),
(2348, 'GTI', 124, NULL, NULL),
(2349, 'AM1', 124, NULL, NULL),
(2350, 'AM2', 124, NULL, NULL),
(2351, 'AM3', 124, NULL, NULL),
(2352, 'AM4', 124, NULL, NULL),
(2353, 'AMV', 124, NULL, NULL),
(2377, 'ACTY', 7, NULL, NULL),
(2378, 'AIRWAVE', 7, NULL, NULL),
(2379, 'ASCOT', 7, NULL, NULL),
(2380, 'BALLADE', 7, NULL, NULL),
(2381, 'BEAT', 7, NULL, NULL),
(2382, 'CR-X', 7, NULL, NULL),
(2383, 'CONCERTO', 7, NULL, NULL),
(2384, 'CR-Z', 7, NULL, NULL),
(2385, 'DOMANI', 7, NULL, NULL),
(2386, 'EDIX', 7, NULL, NULL),
(2387, 'ELEMENT', 7, NULL, NULL),
(2388, 'EV PLUS', 7, NULL, NULL),
(2389, 'FCX', 7, NULL, NULL),
(2390, 'FR-V', 7, NULL, NULL),
(2392, 'HR-V', 7, NULL, NULL),
(2393, 'HSC', 7, NULL, NULL),
(2394, 'INSIGHT', 7, NULL, NULL),
(2396, 'TL', 25, NULL, NULL),
(2397, 'LIFE DUNK', 7, NULL, NULL),
(2398, 'LOGO', 7, NULL, NULL),
(2399, 'MOBILIO', 7, NULL, NULL),
(2400, 'MDX', 25, NULL, NULL),
(2401, 'ORTHIA', 7, NULL, NULL),
(2402, 'PARTNER VAN', 7, NULL, NULL),
(2403, 'PILOT', 7, NULL, NULL),
(2404, 'RIDGELINE', 7, NULL, NULL),
(2405, 'S2000', 7, NULL, NULL),
(2406, 'S600', 7, NULL, NULL),
(2407, 'S500', 7, NULL, NULL),
(2408, 'S800', 7, NULL, NULL),
(2409, 'STEPWGN', 7, NULL, NULL),
(2410, 'STREAM', 7, NULL, NULL),
(2411, 'THATS', 7, NULL, NULL),
(2412, 'VAMOZ', 7, NULL, NULL),
(2413, 'Z', 7, NULL, NULL),
(2414, 'ZEST', 7, NULL, NULL),
(2441, 'AERIO', 59, NULL, NULL),
(2442, 'ALTO', 59, NULL, NULL),
(2443, 'APV', 59, NULL, NULL),
(2444, 'KEI', 59, NULL, NULL),
(2445, 'LAPIN', 59, NULL, NULL),
(2446, 'MR WAGON', 59, NULL, NULL),
(2447, 'XL-7', 59, NULL, NULL),
(2448, 'VERONA', 59, NULL, NULL),
(2477, 'JEEP CJ', 158, NULL, NULL),
(2479, '306 CABRIOLET', 22, NULL, NULL),
(2484, 'BELCAR', 57, NULL, NULL),
(2485, 'M715', 90, NULL, NULL),
(2492, '407 SW', 22, NULL, NULL),
(2493, '307 CC', 22, NULL, NULL),
(2499, 'STYLELINE', 1, NULL, NULL),
(2500, 'ANGLIA', 13, NULL, NULL),
(2508, 'GT2', 26, NULL, NULL),
(2509, 'YUKON', 1, NULL, NULL),
(2510, 'SPORTSMAN', 54, NULL, NULL),
(2514, '21 NEVADA', 24, NULL, NULL),
(2515, 'VEYRON', 11, NULL, NULL),
(2516, 'ENZO', 10, NULL, NULL),
(2517, '306 SW', 22, NULL, NULL),
(2528, 'TI 80', 28, NULL, NULL),
(2532, 'SPYDER 550', 70, NULL, NULL),
(2533, '380 GTB', 10, NULL, NULL),
(2534, 'T-5', 149, NULL, NULL),
(2536, 'KINGSWAY', 18, NULL, NULL),
(2537, 'SSR', 1, NULL, NULL),
(2540, 'IMPALA', 1, NULL, NULL),
(2541, '208', 22, NULL, NULL),
(2542, 'GRAND BLAZER', 1, NULL, NULL),
(2555, '100 SERIES', 53, NULL, NULL),
(2558, '200 SERIES', 53, NULL, NULL),
(2559, '300 SERIES', 53, NULL, NULL),
(2561, '66', 53, NULL, NULL),
(2562, '700 SERIES', 53, NULL, NULL),
(2563, 'AMAZON', 53, NULL, NULL),
(2564, 'C303', 53, NULL, NULL),
(2566, 'DUETT', 53, NULL, NULL),
(2567, 'L3314', 53, NULL, NULL),
(2568, 'OV 4', 53, NULL, NULL),
(2569, 'P1800', 53, NULL, NULL),
(2570, 'SUGGA', 53, NULL, NULL),
(2571, 'TT', 13, NULL, NULL),
(2572, 'ONCE', 5, NULL, NULL),
(2573, 'DE LUXE', 13, NULL, NULL),
(2574, 'CUSTOM', 13, NULL, NULL),
(2575, 'T-BUCKET', 13, NULL, NULL),
(2576, 'G15', 17, NULL, NULL),
(2588, 'PAJERO FULL 3D', 111, NULL, NULL),
(2589, 'PAJERO SPORT', 111, NULL, NULL),
(2590, '120 CABRIO', 36, NULL, NULL),
(2591, '320 TOURING', 36, NULL, NULL),
(2592, '330 CABRIO', 36, NULL, NULL),
(2593, 'SERIE 5 TOURING', 36, NULL, NULL),
(2594, 'SERIE 6 CABRIO', 36, NULL, NULL),
(2595, 'SERIE M CONVERSIVEL', 36, NULL, NULL),
(2596, 'M5 TOURING', 36, NULL, NULL),
(2597, 'SERIE Z ROADSTER', 36, NULL, NULL),
(2599, 'KA SPORT', 13, NULL, NULL),
(2600, 'CC', 2, NULL, NULL),
(2605, 'CERATO KOUP', 16, NULL, NULL),
(2607, 'ASTRO', 1, NULL, NULL),
(2608, 'COROLLA XRS', 23, NULL, NULL),
(2609, 'ETIOS SEDAN', 23, NULL, NULL),
(2611, 'FREESTYLE', 13, NULL, NULL),
(2612, 'COUGAR', 110, NULL, NULL),
(2615, 'XUV 500', 102, NULL, NULL),
(2618, 'XYLO', 102, NULL, NULL),
(2619, 'BOLERO', 102, NULL, NULL),
(2620, 'THAR', 102, NULL, NULL),
(2621, 'AXE', 102, NULL, NULL),
(2622, 'LEGEND', 102, NULL, NULL),
(2623, 'CJ3', 87, NULL, NULL),
(2624, 'ARMADA', 102, NULL, NULL),
(2625, 'CHASSI', 102, NULL, NULL),
(2626, 'SCORPIO PICK-UP', 102, NULL, NULL),
(2627, 'STAR TRUCK', 6, NULL, NULL),
(2628, 'STAR', 6, NULL, NULL),
(2629, 'STAR VAN CARGO', 6, NULL, NULL),
(2630, 'STAR VAN PASSAGEIROS', 6, NULL, NULL),
(2632, 'ALVORADA', 141, NULL, NULL),
(2633, 'CHAMBORD', 141, NULL, NULL),
(2637, 'PROFISSIONAL', 141, NULL, NULL),
(2639, 'VEDETTE', 141, NULL, NULL),
(2640, 'ARONDE', 141, NULL, NULL),
(2641, '1200S', 141, NULL, NULL),
(2642, '1000', 141, NULL, NULL),
(2645, 'HB20X', 14, NULL, NULL),
(2646, 'HB20S', 14, NULL, NULL),
(2648, 'MONZA', 1, NULL, NULL),
(2649, 'CHEVETTE', 1, NULL, NULL),
(2650, 'X60', 98, NULL, NULL),
(2651, 'TRAX', 1, NULL, NULL),
(2652, '118', 36, NULL, NULL),
(2653, '120', 36, NULL, NULL),
(2654, '130', 36, NULL, NULL),
(2655, 'BAVARIA', 36, NULL, NULL),
(2656, 'C-2800', 36, NULL, NULL),
(2657, '318', 36, NULL, NULL),
(2658, '320', 36, NULL, NULL),
(2659, '318 CABRIO', 36, NULL, NULL),
(2660, '325 CABRIO', 36, NULL, NULL),
(2661, '530', 36, NULL, NULL),
(2662, '540', 36, NULL, NULL),
(2663, '550', 36, NULL, NULL),
(2664, '740', 36, NULL, NULL),
(2665, '750', 36, NULL, NULL),
(2666, '760', 36, NULL, NULL),
(2675, 'MATRIX 4X4', 341, NULL, NULL),
(2694, 'A7', 132, NULL, NULL),
(2695, 'A9', 132, NULL, NULL),
(2696, 'A9 CARGO', 132, NULL, NULL),
(2697, 'T20', 132, NULL, NULL),
(2698, 'T20 BAU', 132, NULL, NULL),
(2699, 'T22', 132, NULL, NULL),
(2704, 'SUPER 90 COUPE', 64, NULL, NULL),
(2705, 'X20', 17, NULL, NULL),
(2706, 'ITAIPU', 17, NULL, NULL),
(2707, 'G800', 17, NULL, NULL),
(2708, 'XEF', 17, NULL, NULL),
(2709, 'MOTOMACHINE', 17, NULL, NULL),
(2710, 'BUGATO', 17, NULL, NULL),
(2711, 'QT', 17, NULL, NULL),
(2716, 'CAICARA', 57, NULL, NULL),
(2717, 'CARCARA', 57, NULL, NULL),
(2718, 'FISSORE', 57, NULL, NULL),
(2719, 'MALZONI', 57, NULL, NULL),
(2720, 'VEMAGUET', 57, NULL, NULL),
(2727, 'C4 LOUNGE', 5, NULL, NULL),
(2728, 'CX-7', 108, NULL, NULL),
(2729, 'TR', 147, NULL, NULL),
(2730, 'LUCENA', 147, NULL, NULL),
(2731, 'SEVETSE', 147, NULL, NULL),
(2732, 'RAGGE', 147, NULL, NULL),
(2733, 'C70', 53, NULL, NULL),
(2734, 'C30', 53, NULL, NULL),
(2735, '544', 53, NULL, NULL),
(2736, 'S40', 53, NULL, NULL),
(2737, 'S60', 53, NULL, NULL),
(2738, 'S70', 53, NULL, NULL),
(2739, 'S80', 53, NULL, NULL),
(2740, 'V40', 53, NULL, NULL),
(2741, 'V50', 53, NULL, NULL),
(2742, 'V60', 53, NULL, NULL),
(2743, 'V70', 53, NULL, NULL),
(2744, 'S90', 53, NULL, NULL),
(2745, 'XC60', 53, NULL, NULL),
(2746, 'XC70', 53, NULL, NULL),
(2747, 'XC90', 53, NULL, NULL),
(2748, 'P1900', 53, NULL, NULL),
(2749, 'PV36', 53, NULL, NULL),
(2750, 'PV444', 53, NULL, NULL),
(2751, 'PV544', 53, NULL, NULL),
(2752, 'PV51', 53, NULL, NULL),
(2753, 'PV654', 53, NULL, NULL),
(2754, 'C50', 53, NULL, NULL),
(2755, '190', 4, NULL, NULL),
(2756, 'CLASSE CLA', 4, NULL, NULL),
(2757, 'CLASSE V', 4, NULL, NULL),
(2758, 'VANEO', 4, NULL, NULL),
(2759, 'CITAN', 4, NULL, NULL),
(2760, 'VARIO', 4, NULL, NULL),
(2761, 'CLASSE S CLASSICO', 4, NULL, NULL),
(2809, 'J3S', 15, NULL, NULL),
(2810, 'PICK-UP', 345, NULL, NULL),
(2811, 'VAN', 345, NULL, NULL),
(2823, 'C3 SOLARIS', 5, NULL, NULL),
(2824, 'C3 XTR', 5, NULL, NULL),
(2825, 'C4 SOLARIS', 5, NULL, NULL),
(2826, 'C5 BREAK/TOURER', 5, NULL, NULL),
(2827, 'XSARA BREAK', 5, NULL, NULL),
(2828, 'XSARA VTS', 5, NULL, NULL),
(2829, 'XANTIA BREAK', 5, NULL, NULL),
(2830, 'XM BREAK', 5, NULL, NULL),
(2831, 'C15', 5, NULL, NULL),
(2832, 'NEMO', 5, NULL, NULL),
(2833, 'VISA', 5, NULL, NULL),
(2834, 'C1', 5, NULL, NULL),
(2835, 'C2', 5, NULL, NULL),
(2836, 'C3 PLURIEL', 5, NULL, NULL),
(2837, 'DS4', 5, NULL, NULL),
(2838, 'DS5', 5, NULL, NULL),
(2839, 'JUMPY', 5, NULL, NULL),
(2840, 'C-CROSSER', 5, NULL, NULL),
(2841, 'C35', 5, NULL, NULL),
(2842, 'C25', 5, NULL, NULL),
(2843, 'CX', 5, NULL, NULL),
(2844, 'CX BREAK', 5, NULL, NULL),
(2845, 'AXEL', 5, NULL, NULL),
(2846, 'DYANE', 5, NULL, NULL),
(2847, 'GS/GSA', 5, NULL, NULL),
(2848, 'GS/GSA BREAK', 5, NULL, NULL),
(2849, 'MEHARI', 5, NULL, NULL),
(2850, 'SAXO', 5, NULL, NULL),
(2851, 'SM', 5, NULL, NULL),
(2852, 'ELYSEE', 5, NULL, NULL),
(2853, 'MASTER MINIBUS', 24, NULL, NULL),
(2854, 'CELER', 47, NULL, NULL),
(2855, 'CELER SEDAN', 47, NULL, NULL),
(2856, 'CIELO SEDAN', 47, NULL, NULL),
(2857, 'A1 SPORTBACK', 32, NULL, NULL),
(2858, 'A1 QUATTRO', 32, NULL, NULL),
(2859, 'A3 SPORTBACK', 32, NULL, NULL),
(2860, 'RS4 AVANT', 32, NULL, NULL),
(2861, 'A8L W12', 32, NULL, NULL),
(2862, 'R8 V10', 32, NULL, NULL),
(2863, 'RANGER CD', 13, NULL, NULL),
(2864, 'T140', 15, NULL, NULL),
(2865, 'X1', 36, NULL, NULL),
(2866, 'X3', 36, NULL, NULL),
(2867, 'X5', 36, NULL, NULL),
(2868, 'X6', 36, NULL, NULL),
(2869, '840', 36, NULL, NULL),
(2870, '850', 36, NULL, NULL),
(2871, '645', 36, NULL, NULL),
(2872, '650', 36, NULL, NULL),
(2874, 'FIT TWIST', 7, NULL, NULL),
(2876, 'MP4', 346, NULL, NULL),
(2877, 'F1', 346, NULL, NULL),
(2878, 'MONDEO SW', 13, NULL, NULL),
(2879, 'ESCORT SEDAN', 13, NULL, NULL),
(2880, 'ESCORT CONVERSIVEL', 13, NULL, NULL),
(2881, 'MX-6', 108, NULL, NULL),
(2884, 'CORISCO', 1, NULL, NULL),
(2885, 'CHEVELLE', 1, NULL, NULL),
(2886, 'EXCURSION', 13, NULL, NULL),
(2887, 'TOURAN', 2, NULL, NULL),
(2890, 'F-10000', 13, NULL, NULL),
(2891, 'HOGGAR ESCAPADE', 22, NULL, NULL),
(2901, 'PHAETON', 13, NULL, NULL),
(2913, 'TRANSPORTER', 2, NULL, NULL),
(2914, 'GRAND BESTA', 16, NULL, NULL),
(2915, '200SX', 43, NULL, NULL),
(2916, '240SX', 43, NULL, NULL),
(2921, '300M', 19, NULL, NULL),
(2922, '300C TOURING', 19, NULL, NULL),
(2928, 'TORINO', 13, NULL, NULL),
(2931, 'VENTURE', 1, NULL, NULL),
(2932, 'FLEETLINE', 1, NULL, NULL),
(2933, 'FLEETMASTER', 1, NULL, NULL),
(2934, 'DELUXE', 1, NULL, NULL),
(2936, 'ESCORT XR3', 13, NULL, NULL),
(2937, 'MASTER', 1, NULL, NULL),
(2938, 'TORONADO', 120, NULL, NULL),
(2939, 'SIX', 120, NULL, NULL),
(2940, 'EIGHT', 120, NULL, NULL),
(2941, 'DELUXE', 120, NULL, NULL),
(2942, 'SERIES 60', 120, NULL, NULL),
(2943, 'SERIES 70', 120, NULL, NULL),
(2944, 'SERIES 80', 120, NULL, NULL),
(2945, 'SERIES 90', 120, NULL, NULL),
(2946, 'STARFIRE', 120, NULL, NULL),
(2947, '442', 120, NULL, NULL),
(2948, 'CUTLASS', 120, NULL, NULL),
(2949, 'CUTLASS SUPREME', 120, NULL, NULL),
(2950, 'CUTLASS SALON', 120, NULL, NULL),
(2951, 'CUTLASS CALAIS', 120, NULL, NULL),
(2952, 'CUTLASS CIERA', 120, NULL, NULL),
(2953, 'CUSTOM CRUISER', 120, NULL, NULL),
(2954, 'VISTA CRUISER', 120, NULL, NULL),
(2955, 'F-85', 120, NULL, NULL),
(2957, 'FIRENZA', 120, NULL, NULL),
(2958, 'ACHIEVA', 120, NULL, NULL),
(2959, 'ALERO', 120, NULL, NULL),
(2960, 'AURORA', 120, NULL, NULL),
(2961, 'BRAVADA', 120, NULL, NULL),
(2962, 'INTRIGUE', 120, NULL, NULL),
(2963, 'SILHOUETTE', 120, NULL, NULL),
(2972, 'SUPERBIRD', 123, NULL, NULL),
(2973, 'FURY', 123, NULL, NULL),
(2974, 'SPECIAL', 123, NULL, NULL),
(2975, 'PROWLER', 123, NULL, NULL),
(2976, 'TRAIL DUSTER', 123, NULL, NULL),
(2977, 'VOYAGER', 123, NULL, NULL),
(2978, 'SCAMP', 123, NULL, NULL),
(2979, 'ARROW', 123, NULL, NULL),
(2980, 'PT50', 123, NULL, NULL),
(2981, 'PT57', 123, NULL, NULL),
(2982, 'PT81', 123, NULL, NULL),
(2983, 'PT105', 123, NULL, NULL),
(2984, 'PT125', 123, NULL, NULL),
(2985, 'EXPRESS', 123, NULL, NULL),
(2986, 'VOYAGER EXPRESSO', 123, NULL, NULL),
(2987, 'NEON', 123, NULL, NULL),
(2988, 'LASER', 123, NULL, NULL),
(2989, 'CARAVELLE', 123, NULL, NULL),
(2990, 'STATION WAGON', 123, NULL, NULL),
(2991, 'MODEL Q', 123, NULL, NULL),
(2992, 'MODEL P6', 123, NULL, NULL),
(2993, 'DB9 COUPE', 31, NULL, NULL),
(2994, 'DB9 VOLANTE', 31, NULL, NULL),
(2995, 'VIRAGE COUPE', 31, NULL, NULL),
(2996, 'RAPIDE S', 31, NULL, NULL),
(2997, 'V12 VANTAGE', 31, NULL, NULL),
(2998, 'V8 VANTAGE COUPE', 31, NULL, NULL),
(2999, 'V8 VANTAGE ROADSTER', 31, NULL, NULL),
(3000, 'V8 VANTAGE S COUPE', 31, NULL, NULL),
(3001, 'V8 VANTAGE S ROADSTER', 31, NULL, NULL),
(3002, 'VANQUISH COUPE', 31, NULL, NULL),
(3003, 'VANQUISH VOLANTE', 31, NULL, NULL),
(3004, 'V12 ZAGATO', 31, NULL, NULL),
(3005, 'DB5', 31, NULL, NULL),
(3007, 'DBS', 31, NULL, NULL),
(3008, 'DBS VOLANTE', 31, NULL, NULL),
(3009, 'CYGNET', 31, NULL, NULL),
(3010, 'ONE-77', 31, NULL, NULL),
(3011, 'DBR9', 31, NULL, NULL),
(3013, 'M3', 36, NULL, NULL),
(3014, 'M5', 36, NULL, NULL),
(3015, 'M6', 36, NULL, NULL),
(3016, 'X6 M', 36, NULL, NULL),
(3017, 'CABRIO', 113, NULL, NULL),
(3018, 'COUPE', 113, NULL, NULL),
(3019, 'ROADSTER', 113, NULL, NULL),
(3020, 'COUNTRYMAN', 113, NULL, NULL),
(3021, 'PACEMAN', 113, NULL, NULL),
(3022, 'JOHN COOPER WORKS', 113, NULL, NULL),
(3023, 'ZONDA', 122, NULL, NULL),
(3024, 'NEW XV', 8, NULL, NULL),
(3025, 'IMPREZA WRX HATCH', 8, NULL, NULL),
(3026, 'IMPREZA WRX STI HATCH', 8, NULL, NULL),
(3027, 'IMPREZA WRX STI SEDAN', 8, NULL, NULL),
(3028, 'IMPREZA WRX SEDAN', 8, NULL, NULL),
(3030, 'ETIOS CROSS', 23, NULL, NULL),
(3031, 'HURACAN', 12, NULL, NULL),
(3032, 'UP', 2, NULL, NULL),
(3080, 'EXPLORER', 195, NULL, NULL),
(4964, 'FORTWO CABRIO', 142, NULL, NULL),
(4969, 'GT', 26, NULL, NULL),
(4970, 'GTL', 26, NULL, NULL),
(4971, 'GTM', 26, NULL, NULL),
(4972, 'C2', 26, NULL, NULL),
(4973, 'CRX', 26, NULL, NULL),
(4974, 'AC 2000', 26, NULL, NULL),
(4975, 'AVIATOR', 99, NULL, NULL),
(4976, 'BLACKWOOD', 99, NULL, NULL),
(4977, 'CAPRI', 99, NULL, NULL),
(4978, 'CONTINENTAL', 99, NULL, NULL),
(4979, 'LS', 99, NULL, NULL),
(4980, 'MARK', 99, NULL, NULL),
(4981, 'MARK LT', 99, NULL, NULL),
(4982, 'MKR', 99, NULL, NULL),
(4983, 'MKS', 99, NULL, NULL),
(4984, 'MKX', 99, NULL, NULL),
(4985, 'MKZ', 99, NULL, NULL),
(4986, 'NAVIGATOR', 99, NULL, NULL),
(4987, 'PREMIERE', 99, NULL, NULL),
(4988, 'TOWN CAR', 99, NULL, NULL),
(4989, 'VERSAILLES', 99, NULL, NULL),
(4990, 'ZEPHYR', 99, NULL, NULL),
(4991, 'CLASSIC', 1, NULL, NULL),
(4992, 'ACTYON', 21, NULL, NULL),
(5003, 'MARAJO', 1, NULL, NULL),
(5004, 'SUPREMA', 1, NULL, NULL),
(5005, 'NEW BEETLE', 2, NULL, NULL),
(5006, 'QUANTUM', 2, NULL, NULL),
(5007, 'CROSSFOX', 2, NULL, NULL),
(5008, 'MILLE', 3, NULL, NULL),
(5009, 'GC2', 534, NULL, NULL),
(5010, 'EC7', 534, NULL, NULL),
(5011, '530', 98, NULL, NULL),
(5012, 'MOBI', 3, NULL, NULL),
(5013, 'TORO', 3, NULL, NULL),
(5014, 'RENEGADE', 87, NULL, NULL),
(5015, 'DUSTER OROCH', 24, NULL, NULL),
(5016, 'SANDERO RS', 24, NULL, NULL),
(5017, 'HB20R', 14, NULL, NULL),
(5018, 'GRAND SANTA FE', 14, NULL, NULL),
(5019, 'GOLF VARIANT', 2, NULL, NULL),
(5020, 'SPACE CROSS', 2, NULL, NULL),
(5021, '2008', 22, NULL, NULL),
(5022, 'QUORIS', 16, NULL, NULL),
(5023, 'GRAND CARNIVAL', 16, NULL, NULL),
(5024, 'T8', 15, NULL, NULL),
(5025, 'T6', 15, NULL, NULL),
(5026, 'T5', 15, NULL, NULL),
(5027, 'KA SEDAN', 13, NULL, NULL),
(5028, 'FOCUS FASTBACK', 13, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atendentes`
--
ALTER TABLE `atendentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `atendentes_i_instituicao_atendimento_foreign` (`i_instituicao_atendimento`);

--
-- Indexes for table `atendimentos`
--
ALTER TABLE `atendimentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `atendimentos_id_ocorrencia_foreign` (`id_ocorrencia`),
  ADD KEY `atendimentos_id_paciente_foreign` (`id_paciente`),
  ADD KEY `atendimentos_id_viatura_foreign` (`id_viatura`);

--
-- Indexes for table `classificacao_ocorrencias`
--
ALTER TABLE `classificacao_ocorrencias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contato_emergencias`
--
ALTER TABLE `contato_emergencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contato_emergencias_id_paciente_foreign` (`id_paciente`);

--
-- Indexes for table `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instituicao_atendimentos`
--
ALTER TABLE `instituicao_atendimentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instituicao_atendimentos_id_estado_foreign` (`id_estado`),
  ADD KEY `id_instituicao_orgao` (`id_instituicao_orgao`);

--
-- Indexes for table `instituicao_orgaos`
--
ALTER TABLE `instituicao_orgaos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ocorrencias`
--
ALTER TABLE `ocorrencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ocorrencias_id_paciente_foreign` (`id_paciente`),
  ADD KEY `ocorrencias_id_tipo_ocorrencia_foreign` (`id_tipo_ocorrencia`),
  ADD KEY `ocorrencias_id_instituicao_foreign` (`id_instituicao`);

--
-- Indexes for table `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tipo_ocorrencias`
--
ALTER TABLE `tipo_ocorrencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_ocorrencias_id_classificacao_ocorrencia_foreign` (`id_classificacao_ocorrencia`),
  ADD KEY `id_instituicao_orgao` (`id_instituicao_orgao`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_instituicao_foreign` (`id_instituicao`);

--
-- Indexes for table `viaturas`
--
ALTER TABLE `viaturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `viaturas_id_modelo_foreign` (`id_modelo`);

--
-- Indexes for table `viatura_marcas`
--
ALTER TABLE `viatura_marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viatura_modelos`
--
ALTER TABLE `viatura_modelos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `viatura_modelos_id_marca_foreign` (`id_marca`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atendentes`
--
ALTER TABLE `atendentes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `atendimentos`
--
ALTER TABLE `atendimentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classificacao_ocorrencias`
--
ALTER TABLE `classificacao_ocorrencias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contato_emergencias`
--
ALTER TABLE `contato_emergencias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `instituicao_atendimentos`
--
ALTER TABLE `instituicao_atendimentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `instituicao_orgaos`
--
ALTER TABLE `instituicao_orgaos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ocorrencias`
--
ALTER TABLE `ocorrencias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tipo_ocorrencias`
--
ALTER TABLE `tipo_ocorrencias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `viaturas`
--
ALTER TABLE `viaturas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `viatura_marcas`
--
ALTER TABLE `viatura_marcas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=535;

--
-- AUTO_INCREMENT for table `viatura_modelos`
--
ALTER TABLE `viatura_modelos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5029;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
