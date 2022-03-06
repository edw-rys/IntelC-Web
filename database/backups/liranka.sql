

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `liranka_juanleonmera`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Account`
--

CREATE TABLE `Account` (
  `AccountId` int(11) NOT NULL COMMENT 'Table Id Accounts AutoIncrements',
  `AccountNames` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Name Account Description',
  `AccountDateCreated` datetime NOT NULL COMMENT 'Date created',
  `AccountEmail` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Account Email',
  `AccountPassword` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `AccountDateUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Log Account Updated',
  `AccountStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'Account Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `Account`
--

INSERT INTO `Account` (`AccountId`, `AccountNames`, `AccountDateCreated`, `AccountEmail`, `AccountPassword`, `AccountDateUpdated`, `AccountStatus`) VALUES
(1, 'Account', '2019-05-28 00:00:00', 'admin@liranka.com', '80416306ef2c9edc5f989d9c46b87e09', '2020-03-13 20:55:34', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Activity`
--

CREATE TABLE `Activity` (
  `ActivityId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `ActivityName` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Activity Name Description',
  `ActivityDateCreated` datetime NOT NULL COMMENT 'Activity Creation Date',
  `ActivityDateUpdated` datetime NOT NULL COMMENT 'Updated Activity Date',
  `ActivityStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'Activity Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Actividad';

--
-- Volcado de datos para la tabla `Activity`
--

INSERT INTO `Activity` (`ActivityId`, `ActivityName`, `ActivityDateCreated`, `ActivityDateUpdated`, `ActivityStatus`) VALUES
(1, 'Actividad Formativa', '2019-05-29 00:00:00', '2019-05-29 00:00:00', 'A'),
(2, 'Actividad Sumativa', '2019-05-29 00:00:00', '2019-05-29 00:00:00', 'A'),
(3, 'Actividad Refuerzo', '2019-07-11 00:00:00', '2019-07-11 00:00:00', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Answer`
--

CREATE TABLE `Answer` (
  `AnswerId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `QuestionId` int(11) NOT NULL COMMENT 'Question Table Reference',
  `AnswerDescription` text COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Answer Description',
  `CorrectAnswer` tinyint(1) NOT NULL COMMENT 'Validate Answer',
  `AnswerPercentage` float NOT NULL COMMENT 'Answer Percentage',
  `AnswerDateCreated` datetime NOT NULL COMMENT 'Answer Creation Date',
  `AnswerDateUpdated` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Updated Answer Date',
  `AnswerStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'Answer Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Block`
--

CREATE TABLE `Block` (
  `BlockId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `BlockName` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Block Name Description',
  `TermId` int(11) NOT NULL COMMENT 'Term Table Reference',
  `BlockDateCreated` datetime NOT NULL COMMENT 'Block Creation Date',
  `BlockDateUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Updated Block Date',
  `BlockStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'Block Status',
  `BlockIdentificator` char(2) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `status_partial` varchar(5) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Bloque';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Content`
--

CREATE TABLE `Content` (
  `ContentId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `ContentName` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Content Name Description',
  `SubjectCourseId` int(11) NOT NULL COMMENT 'SubjectCourse Table Reference',
  `ContentDateCreated` datetime NOT NULL COMMENT 'Content Creation Date',
  `ContentDateUpdated` datetime NOT NULL COMMENT 'Updated Content Date',
  `ContentStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'Content Status',
  `MTDVideoLink` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `MTDExcercisesPDF` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Course`
--

CREATE TABLE `Course` (
  `CourseId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `CourseName` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Course Name Description',
  `CoursePromotedName` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `CourseCicle` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'School Educative Cicle',
  `CourseCatalogId` int(11) NOT NULL,
  `SectionId` int(11) NOT NULL COMMENT 'Section Table Reference',
  `CourseDateCreated` datetime NOT NULL COMMENT 'Course Creation Date',
  `CourseDateUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Updated Course Date',
  `CourseYear` year(4) NOT NULL COMMENT 'Course Year Detail',
  `CourseStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'Course Status',
  `percentage_partials` int(4) NOT NULL DEFAULT 80,
  `percentage_exam` int(4) NOT NULL DEFAULT 20
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Estructura de tabla para la tabla `SchoolSupplyList`
--

CREATE TABLE `SchoolSupplyList` (
  `SchoolSupplyListId` int(11) NOT NULL,
  `SchoolSupplyListCourse` varchar(500) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `SchoolSupplyListLink` varchar(500) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `SchoolSupplyListStatus` varchar(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `SchoolSupplyList`
--

-- INSERT INTO `SchoolSupplyList` (`SchoolSupplyListId`, `SchoolSupplyListCourse`, `SchoolSupplyListLink`, `SchoolSupplyListStatus`) VALUES
-- (1, 'PRIMER AÑO DE EDUCACION BASICA', 'http://fis.ucv.cl/docs/fis-133/textos/Fisica-Universitaria-Sears-Zemansky-12va-Edicion-Vol1.pdf', 'A'),
-- (2, 'SEGUNDO AÑO DE EDUCACION BASICA', 'http://www.bootstrapdash.com/demo/star-admin-pro/src/assets/images/auth/login_2.jpg', 'A');

--
-- Tabla config login
--
CREATE TABLE `auto_config_labels` ( 
  `id` INT(11) NOT NULL AUTO_INCREMENT , 
  `enable_utiles` SMALLINT(2) NOT NULL DEFAULT '1' , 
  `enable_pagos` SMALLINT(2) NOT NULL DEFAULT '1' , 
  `enable_registro` SMALLINT NOT NULL , 
  `password_change` SMALLINT NOT NULL , 
  `created_at` DATETIME NOT NULL , 
  `updated_at` DATETIME NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
INSERT INTO `auto_config_labels` (`id`, `enable_utiles`, `enable_pagos`, `enable_registro`, `password_change`,`created_at`, `updated_at`) VALUES ('1', '1', '1', '1', '1', '2020-10-26 23:09:33', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CourseCatalog`
--

CREATE TABLE `CourseCatalog` (
  `CourseCatalogId` int(11) NOT NULL,
  `SectionCatalogId` int(11) NOT NULL,
  `CourseName` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `CourseCatalogDateCreated` datetime NOT NULL,
  `CourseCatalogDateUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `CourseCatalogStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datatables_demo`
--

CREATE TABLE `datatables_demo` (
  `id` int(10) NOT NULL,
  `first_name` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '',
  `last_name` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '',
  `position` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '',
  `email` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '',
  `office` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '',
  `start_date` datetime DEFAULT NULL,
  `age` int(8) DEFAULT NULL,
  `salary` int(8) DEFAULT NULL,
  `seq` int(8) DEFAULT NULL,
  `extn` varchar(8) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Discount`
--

CREATE TABLE `Discount` (
  `DiscountId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `DiscountName` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Discount Name Description',
  `DiscountValue` int(10) NOT NULL COMMENT 'Discount Value Description',
  `DiscountDateCreated` datetime NOT NULL COMMENT 'Discount Creation Date',
  `DiscountDateUpdated` datetime NOT NULL COMMENT 'Update Discount Date',
  `DiscountStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Discount Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EditorialResource`
--

CREATE TABLE `EditorialResource` (
  `EditorialResourceId` int(11) NOT NULL,
  `EditorialResourceName` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ResourceCategoryId` int(11) NOT NULL,
  `EditorialResourceFile` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `EditorialResourceDateCreated` datetime NOT NULL,
  `EditorialResourceDateUpdated` datetime NOT NULL,
  `EditorialResourceStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL,
  `CourseId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Events`
--

CREATE TABLE `Events` (
  `EventId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `EventName` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Event Name Description',
  `EventDescription` text COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Event Description',
  `ParallelId` int(11) NOT NULL COMMENT 'Parallel Table Reference',
  `EventStartDate` datetime NOT NULL,
  `EventEndDate` datetime NOT NULL,
  `EventDateCreated` datetime NOT NULL COMMENT 'Event Creation Date',
  `EventDateUpdated` datetime NOT NULL COMMENT 'Updated Event Date',
  `EventStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'A' COMMENT 'Event Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Eventos';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Exam`
--

CREATE TABLE `Exam` (
  `ExamId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `ExamName` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Exam Name Description',
  `TermId` int(11) NOT NULL COMMENT 'Term Table Reference',
  `ExamDateCreated` datetime NOT NULL COMMENT 'Exam Creation Date',
  `ExamDateUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Updated Exam Date',
  `ExamStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'Exam Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Examen Quimestral';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ExamDetail`
--

CREATE TABLE `ExamDetail` (
  `ExamDetailId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `ExamDetailName` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'ExamDetail Name Description',
  `ExamDetailContent` longtext COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Exam Description',
  `ExamDetailGrade` int(11) NOT NULL COMMENT 'Exam Grade',
  `ExamDetailDateLimit` datetime NOT NULL COMMENT 'Exam Date Limit',
  `SCExamId` int(11) NOT NULL COMMENT 'SCExam Table Reference',
  `ExamDetailDateCreated` datetime NOT NULL COMMENT 'ExamDetail Creation Date',
  `ExamDetailDateUpdated` datetime NOT NULL COMMENT 'Updated ExamDetail Date',
  `ExamDetailStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'ExamDetail Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Detalle Examen Quimestral';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Fault`
--

CREATE TABLE `Fault` (
  `FaultId` int(11) NOT NULL,
  `SCUPId` int(11) NOT NULL,
  `FaultDay` date NOT NULL,
  `FaultJustified` tinyint(1) NOT NULL,
  `FaultDayJustified` date DEFAULT NULL,
  `FaultStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL,
  `JustifyReason` text COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `FaultTakenDaily`
--

CREATE TABLE `FaultTakenDaily` (
  `FaultTakenDailyId` int(11) NOT NULL,
  `SubjectCourseId` int(11) NOT NULL,
  `ParallelId` int(11) NOT NULL,
  `FaultDayTaken` date NOT NULL,
  `FaultDailyStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `FaultTemporary`
--

CREATE TABLE `FaultTemporary` (
  `FaultTemporaryId` int(11) NOT NULL,
  `StudentName` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `JustifiedFaults` int(11) NOT NULL,
  `UnjustifiedFaults` int(11) NOT NULL,
  `TotalFaults` int(11) NOT NULL,
  `TermIdentificator` varchar(2) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `BlockIdentificator` varchar(2) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `File`
--

CREATE TABLE `File` (
  `idFile` int(11) NOT NULL,
  `tableReference` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `idParent` int(11) NOT NULL,
  `alias` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `contentType` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `file` longblob NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `size` float NOT NULL,
  `active` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ImprovementPlan`
--

CREATE TABLE `ImprovementPlan` (
  `ImprovementPlanId` int(11) NOT NULL,
  `UserParallelId` int(11) NOT NULL,
  `TermId` int(11) DEFAULT NULL,
  `BlockId` int(11) DEFAULT NULL,
  `Type` varchar(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'A',
  `Description` longtext COLLATE utf8mb4_spanish_ci NOT NULL,
  `ImprovementPlanDateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `ImprovementPlanDateUpdated` datetime NOT NULL DEFAULT current_timestamp(),
  `ImprovementPlanStatus` varchar(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Message`
--

CREATE TABLE `Message` (
  `MessageId` int(11) NOT NULL,
  `MessageReceiver` int(11) NOT NULL,
  `MessageSender` int(11) NOT NULL,
  `MessageTitle` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `MessageContent` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `MessageDateCreated` datetime NOT NULL,
  `MessageDateUpdated` datetime NOT NULL,
  `MessageStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL,
  `MessageRead` tinyint(1) NOT NULL,
  `MessageType` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Module`
--

CREATE TABLE `Module` (
  `ModuleId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `ModuleTable` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ModuleLabel` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Module Name Description',
  `ModuleDateCreated` datetime NOT NULL COMMENT 'Module Creation Date',
  `ModuleDateUpdated` datetime NOT NULL COMMENT 'Updated Module Date',
  `ModuleStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'Module Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `Module`
--

INSERT INTO `Module` (`ModuleId`, `ModuleTable`, `ModuleLabel`, `ModuleDateCreated`, `ModuleDateUpdated`, `ModuleStatus`) VALUES
(1, 'SupplyDetail', 'Actividades', '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(2, 'Notifications', 'Notificaciones', '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(3, 'Scores', 'Calificaciones', '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(4, 'Schedule', 'Agenda', '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(5, 'Users', 'Usuarios', '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(6, 'Account', 'Cuentas', '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(7, 'Resources', 'Recursos', '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(8, 'EBooks', 'Libros Digitales', '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(9, 'ETutorials', 'Video Tutoriales', '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(10, 'Subscription', 'Matriculas', '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(11, 'Section', 'Secciones', '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(12, 'School', 'Colegios', '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(13, 'Course', 'Cursos', '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(14, 'Parallel', 'Paralelos', '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(15, 'Subject', 'Materias', '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(16, 'Certificates', 'Certificados', '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(17, 'Reports', 'Reportes', '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(18, 'Sylabbus', 'Sylabbus', '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(19, 'Role', 'Roles', '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(20, 'Module', 'Modulos', '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(21, 'Events', 'Eventos / Comunicados', '2019-02-18 00:00:00', '2019-02-18 00:00:00', 'A'),
(22, 'Assignations', 'Asignaturas y Cursos', '2019-02-24 21:29:42', '2019-02-24 21:29:42', 'A'),
(23, 'SupplyDetailStudent', 'Actividades', '2019-03-08 00:00:00', '2019-03-08 00:00:00', 'A'),
(24, 'ScoresStudent', 'Calificaciones', '2019-03-08 00:00:00', '2019-03-08 00:00:00', 'A'),
(25, 'NotificationsStudent', 'Notificaciones', '2019-03-08 00:00:00', '2019-03-08 00:00:00', 'A'),
(26, 'EventsStudent', 'Eventos', '2019-03-08 00:00:00', '2019-03-08 00:00:00', 'A'),
(27, 'Matriculate', 'Matricular', '2019-03-14 00:00:00', '2019-03-14 00:00:00', 'A'),
(28, 'MTD_Resources', 'Recursos', '2019-03-15 00:00:00', '2019-03-15 00:00:00', 'A'),
(29, 'MTD_Quiz', 'Evaluaciones en línea', '2019-03-15 00:00:00', '2019-03-15 00:00:00', 'A'),
(30, 'MTD_SupplyCreator', 'Evaluaciones en línea', '2019-03-26 00:00:00', '2019-03-26 00:00:00', 'A'),
(32, 'Assistance', 'Asistencia', '2019-04-26 00:00:00', '2019-04-26 00:00:00', 'A'),
(33, 'StudentResources', 'Recursos', '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'A'),
(34, 'Blocking', 'Administrar Bloqueos', '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'A'),
(35, 'TeacherMessages', 'Mensajes', '2019-05-16 00:00:00', '2019-05-16 00:00:00', 'A'),
(36, 'StudentMessages', 'Mensajes', '2019-05-16 00:00:00', '2019-05-16 00:00:00', 'A'),
(37, 'InspectorMessages', 'Reportes de Conducta', '2019-05-16 00:00:00', '2019-05-16 00:00:00', 'A'),
(38, 'DoctorMessages', 'Prescripciones', '2019-05-16 00:00:00', '2019-05-16 00:00:00', 'A'),
(39, 'SupervisorMessages', 'Mensajes', '2019-05-16 00:00:00', '2019-05-16 00:00:00', 'A'),
(40, 'UserAdministration', 'Administrar Usuarios', '2019-06-07 00:00:00', '2019-06-07 00:00:00', 'A'),
(41, 'courseReport', 'Reporte del Curso', '2019-06-12 00:00:00', '2019-06-12 00:00:00', 'A'),
(42, 'GradesReport', 'Boletines', '2019-06-19 00:00:00', '2019-06-19 00:00:00', 'A'),
(43, 'courseReportSupervisor', 'Reportes Por Curso', '2019-06-28 00:00:00', '2019-06-28 00:00:00', 'A'),
(44, 'SupervisorGrade', 'Calificaciones', '2019-07-04 00:00:00', '2019-07-04 00:00:00', 'A'),
(46, 'DirectorReport', 'Auditoria', '2019-07-16 00:00:00', '2019-07-16 00:00:00', 'A'),
(47, 'EventsDirector', 'Eventos', '2019-07-17 23:59:19', '2019-07-17 23:59:19', 'A'),
(48, 'SupervisorReports', 'Reportes', '2019-07-24 00:00:00', '2019-07-24 00:00:00', 'A'),
(49, 'SupervisorActivities', 'Actividades', '2019-08-20 00:00:00', '2019-08-20 00:00:00', 'A'),
(50, 'ExamDetail', 'Exámenes', '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(51, 'SupervisorExams', 'Exámenes', '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(52, 'SchoolCalendar', 'Calendario', '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(53, 'SupervisorFinalReports', 'Reportes Finales', '2019-07-24 00:00:00', '2019-07-24 00:00:00', 'A'),
(54, 'Videoconference', 'Clases Virtuales', '2019-07-24 00:00:00', '2019-07-24 00:00:00', 'A'),
(55, 'ImprovementPlan', 'Plan de Mejora', '2020-08-26 18:01:15', '2020-08-26 18:01:15', 'A'),
(56, 'ImprovementPlanDoc', 'Plan de Mejora', '2021-02-15 19:01:56', '2021-02-15 19:01:56', 'A'),
(57, 'courseReportDocente', 'Reportes de curso', '2021-02-15 19:01:56', '2021-02-15 19:01:56', 'A'),
(58, 'SignUser', 'Firma', '2021-02-15 19:01:56', '2021-02-15 19:01:56', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MTD_Answer`
--

CREATE TABLE `MTD_Answer` (
  `MTDAnswerId` int(11) NOT NULL,
  `MTDQuestionId` int(11) NOT NULL,
  `MTDAnswerDescription` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `MTDCorrectAnswer` tinyint(1) NOT NULL,
  `MTDAnswerPercentage` float NOT NULL,
  `MTDAnswerDateCreated` datetime NOT NULL,
  `MTDAnswerDateUpdated` datetime NOT NULL,
  `MTDAnswerStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MTD_Assignment`
--

CREATE TABLE `MTD_Assignment` (
  `MTDAssignmentId` int(11) NOT NULL,
  `UserParallerId` int(11) NOT NULL,
  `MTDAssignmentDescription` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `MTDQuizId` int(11) NOT NULL,
  `MTDAssignmentDateLimit` datetime NOT NULL,
  `MTDAssignmentQuizTimeLimit` time NOT NULL,
  `MTDAssignmentDateCreated` datetime NOT NULL,
  `MTDAssignmentDateUpdated` datetime NOT NULL,
  `MTDAssignmentStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MTD_Assignment_User`
--

CREATE TABLE `MTD_Assignment_User` (
  `MTDAssignmentUserId` int(11) NOT NULL,
  `MTDAssignmentId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `MTDGrade` float NOT NULL,
  `MTDAssignmentUserDateCreated` datetime NOT NULL,
  `MTDAssignmentUserDateUpdated` datetime NOT NULL,
  `MTDAssignmentUserStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MTD_Book`
--

CREATE TABLE `MTD_Book` (
  `MTDBookId` int(11) NOT NULL,
  `SubjectCourseId` int(11) NOT NULL,
  `MTDBookLink` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `MTDBookDateCreated` datetime NOT NULL,
  `MTDBookDateUpdated` datetime NOT NULL,
  `MTDBookStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL,
  `MTDBookName` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MTD_Question`
--

CREATE TABLE `MTD_Question` (
  `MTDQuestionId` int(11) NOT NULL,
  `MTDQuizId` int(11) NOT NULL,
  `MTDQuestionValue` float DEFAULT NULL,
  `MTDMultipleAnswers` tinyint(1) NOT NULL,
  `MTDQuestionDescription` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `MTDFilePath` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `MTDQuestionDateCreated` datetime NOT NULL,
  `MTDQuestionDateUpdated` datetime NOT NULL,
  `MTDQuestionStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MTD_Quiz`
--

CREATE TABLE `MTD_Quiz` (
  `MTDQuizId` int(11) NOT NULL,
  `MTDQuizName` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `MTDQuizDateCreated` datetime NOT NULL,
  `MTDQuizDateUpdated` datetime NOT NULL,
  `MTDQuizStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL,
  `SubjectCourseId` int(11) NOT NULL,
  `MTDQuizGrade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Notification`
--

CREATE TABLE `Notification` (
  `NotificationId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `NotificationName` text COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Notification Name Description',
  `NotificationType` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `NotificationParent` int(11) NOT NULL,
  `NotificationRead` tinyint(4) NOT NULL DEFAULT 0,
  `NotificationUserId` int(11) NOT NULL,
  `NotificationDateCreated` datetime NOT NULL COMMENT 'Notification Creation Date',
  `NotificationDateUpdated` datetime NOT NULL COMMENT 'Updated Notification Date',
  `NotificationStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'Notification Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Options`
--

CREATE TABLE `Options` (
  `OptionId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `OptionName` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Option Name Description',
  `ModuleId` int(11) NOT NULL COMMENT 'Module Table Reference',
  `OptionDateCreated` datetime NOT NULL COMMENT 'Option Creation Date',
  `OptionDateUpdated` datetime NOT NULL COMMENT 'Updated Option Date',
  `OptionStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'Option Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `Options`
--

INSERT INTO `Options` (`OptionId`, `OptionName`, `ModuleId`, `OptionDateCreated`, `OptionDateUpdated`, `OptionStatus`) VALUES
(1, 'create', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(2, 'show', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(3, 'edit', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(4, 'delete', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(5, 'list', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(6, 'create', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(7, 'show', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(8, 'edit', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(9, 'delete', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(10, 'list', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(11, 'create', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(12, 'show', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(13, 'edit', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(14, 'delete', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(15, 'list', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(16, 'create', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(17, 'show', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(18, 'edit', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(19, 'delete', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(20, 'list', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(21, 'create', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(22, 'show', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(23, 'edit', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(24, 'delete', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(25, 'list', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(26, 'create', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(27, 'show', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(28, 'edit', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(29, 'delete', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(30, 'list', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(31, 'create', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(32, 'show', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(33, 'edit', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(34, 'delete', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(35, 'list', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(36, 'create', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(37, 'show', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(38, 'edit', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(39, 'delete', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(40, 'list', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(41, 'create', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(42, 'show', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(43, 'edit', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(44, 'delete', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(45, 'list', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(46, 'create', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(47, 'show', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(48, 'edit', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(49, 'delete', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(50, 'list', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(51, 'create', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(52, 'show', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(53, 'edit', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(54, 'delete', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(55, 'list', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(56, 'create', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(57, 'show', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(58, 'edit', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(59, 'delete', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(60, 'list', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(61, 'create', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(62, 'show', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(63, 'edit', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(64, 'delete', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(65, 'list', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(66, 'create', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(67, 'show', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(68, 'edit', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(69, 'delete', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(70, 'list', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(71, 'create', 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(72, 'show', 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(73, 'edit', 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(74, 'delete', 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(75, 'list', 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(76, 'create', 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(77, 'show', 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(78, 'edit', 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(79, 'delete', 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(80, 'list', 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(81, 'create', 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(82, 'show', 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(83, 'edit', 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(84, 'delete', 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(85, 'list', 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(86, 'create', 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(87, 'show', 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(88, 'edit', 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(89, 'delete', 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(90, 'list', 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(91, 'create', 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(92, 'show', 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(93, 'edit', 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(94, 'delete', 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(95, 'list', 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(96, 'create', 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(97, 'show', 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(98, 'edit', 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(99, 'delete', 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(100, 'list', 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(101, 'create', 21, '2019-02-18 00:00:00', '2019-02-18 00:00:00', 'A'),
(102, 'list', 21, '2019-02-18 00:00:00', '2019-02-18 00:00:00', 'A'),
(103, 'create', 22, '2019-02-24 00:00:00', '2019-02-24 00:00:00', 'A'),
(104, 'list', 22, '2019-02-24 00:00:00', '2019-02-24 00:00:00', 'A'),
(105, 'viewSupply', 23, '2019-03-08 00:00:00', '2019-03-08 00:00:00', 'A'),
(106, 'viewGradesBySubject', 24, '2019-03-08 00:00:00', '2019-03-08 00:00:00', 'A'),
(107, 'viewNotifications', 25, '2019-03-08 00:00:00', '2019-03-08 00:00:00', 'A'),
(108, 'viewEvent', 26, '2019-03-08 00:00:00', '2019-03-08 00:00:00', 'A'),
(109, 'matriculateStudent', 27, '2019-03-14 00:00:00', '2019-03-14 00:00:00', 'A'),
(110, 'viewGradesSummary', 24, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(111, 'viewBooks', 28, '2019-03-15 00:00:00', '2019-03-15 00:00:00', 'A'),
(112, 'viewVideoTutorials', 28, '2019-03-15 00:00:00', '2019-03-15 00:00:00', 'A'),
(113, 'viewTrainingExcersises', 28, '2019-03-15 00:00:00', '2019-03-15 00:00:00', 'A'),
(114, 'viewOnlineQuizzes', 29, '2019-03-15 00:00:00', '2019-03-15 00:00:00', 'A'),
(115, 'MTD_CreateSupply', 30, '2019-03-26 00:00:00', '2019-03-26 00:00:00', 'A'),
(116, 'MTD_AssignmentResults', 30, '2019-03-26 00:00:00', '2019-03-26 00:00:00', 'A'),
(117, 'DailyAssistance', 32, '2019-04-26 00:00:00', '2019-04-26 00:00:00', 'A'),
(118, 'FaultsByStudent', 32, '2019-04-26 00:00:00', '2019-04-26 00:00:00', 'A'),
(120, 'recursosEditorial', 33, '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'A'),
(121, 'recursosProfesor', 33, '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'A'),
(122, 'block', 34, '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'A'),
(123, 'sendMessageT', 35, '2019-05-16 00:00:00', '2019-05-16 00:00:00', 'A'),
(124, 'readMessages', 36, '2019-05-16 00:00:00', '2019-05-16 00:00:00', 'A'),
(125, 'sendMessageI', 37, '2019-05-16 00:00:00', '2019-05-16 00:00:00', 'A'),
(126, 'sendMessageD', 38, '2019-05-16 00:00:00', '2019-05-16 00:00:00', 'A'),
(127, 'sendMessagesSu', 39, '2019-05-16 00:00:00', '2019-05-16 00:00:00', 'A'),
(128, 'blockBlock', 34, '2019-05-17 00:00:00', '2019-05-17 00:00:00', 'A'),
(129, 'unblockBlock', 34, '2019-05-17 00:00:00', '2019-05-17 00:00:00', 'A'),
(130, 'readMessagesT', 35, '2019-05-17 00:00:00', '2019-05-17 00:00:00', 'A'),
(131, 'readMessagesI', 37, '2019-05-17 00:00:00', '2019-05-17 00:00:00', 'A'),
(132, 'readMessagesD', 38, '2019-05-17 00:00:00', '2019-05-17 00:00:00', 'A'),
(133, 'readMessagesSu', 39, '2019-05-17 00:00:00', '2019-05-17 00:00:00', 'A'),
(134, 'viewSummaryGradesTeacher', 17, '2019-05-18 00:00:00', '2019-05-18 00:00:00', 'A'),
(135, 'viewReportsGrade', 17, '2019-05-18 00:00:00', '2019-05-18 00:00:00', 'I'),
(136, 'createUser', 40, '2019-06-07 00:00:00', '2019-06-07 00:00:00', 'A'),
(137, 'listUser', 40, '2019-06-07 00:00:00', '2019-06-07 00:00:00', 'A'),
(138, 'changeStudentParallel', 40, '2019-06-07 00:00:00', '2019-06-07 00:00:00', 'A'),
(139, 'changeTeacherParallel', 40, '2019-06-07 00:00:00', '2019-06-07 00:00:00', 'A'),
(140, 'reportByBlock', 41, '2019-06-12 00:00:00', '2019-06-12 00:00:00', 'A'),
(141, 'generateGradesReport', 42, '2019-06-19 00:00:00', '2019-06-19 00:00:00', 'A'),
(142, 'reportByBlock', 43, '2019-06-28 00:00:00', '2019-06-28 00:00:00', 'A'),
(143, 'create', 44, '2019-07-04 00:00:00', '2019-07-04 00:00:00', 'A'),
(145, 'view', 46, '2019-07-16 00:00:00', '2019-07-16 00:00:00', 'A'),
(146, 'gradesByStudent', 42, '2019-07-17 00:00:00', '2019-07-17 00:00:00', 'A'),
(147, 'create', 47, '2019-07-18 00:01:02', '2019-07-18 00:01:02', 'A'),
(148, 'list', 47, '2019-07-18 00:01:02', '2019-07-18 00:01:02', 'A'),
(149, 'ViewReport', 48, '2019-07-24 00:00:00', '2019-07-24 00:00:00', 'A'),
(150, 'viewDetailedGradeReport', 17, '2019-08-07 00:00:00', '2019-08-07 00:00:00', 'A'),
(151, 'gradeSummaryDetailed', 48, '2019-08-13 00:00:00', '2019-08-13 00:00:00', 'A'),
(152, 'create', 49, '2019-08-20 00:00:00', '2019-08-20 00:00:00', 'A'),
(153, 'view', 49, '2019-08-20 00:00:00', '2019-08-20 00:00:00', 'A'),
(154, 'createExam', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(155, 'create', 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(156, 'show', 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(157, 'edit', 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(158, 'delete', 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(159, 'list', 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'I'),
(160, 'TermReports', 42, '2019-06-19 00:00:00', '2019-06-19 00:00:00', 'A'),
(161, 'TermReportsByStudent', 42, '2019-07-17 00:00:00', '2019-07-17 00:00:00', 'A'),
(162, 'viewGradesExam', 17, '2019-07-17 00:00:00', '2019-07-17 00:00:00', 'A'),
(163, 'StudentBlockReport', 41, '2019-09-10 00:00:00', '2019-09-10 00:00:00', 'A'),
(164, 'StudentTermReport', 41, '2019-09-10 00:00:00', '2019-09-10 00:00:00', 'A'),
(165, 'StudentTermCompleteReport', 41, '2019-09-10 00:00:00', '2019-09-10 00:00:00', 'A'),
(166, 'learningReport', 17, '2019-09-10 00:00:00', '2019-09-10 00:00:00', 'A'),
(167, 'learningReportFull', 17, '2019-09-10 00:00:00', '2019-09-10 00:00:00', 'A'),
(168, 'learningReportSupervisor', 48, '2019-09-11 00:00:00', '2019-09-11 00:00:00', 'A'),
(169, 'learningReportFullSupervisor', 48, '2019-09-11 00:00:00', '2019-09-11 00:00:00', 'A'),
(170, 'StudentBlockReportSupervisor', 43, '2019-09-11 00:00:00', '2019-09-11 00:00:00', 'A'),
(171, 'StudentTermReportSupervisor', 43, '2019-09-11 00:00:00', '2019-09-11 00:00:00', 'A'),
(172, 'StudentTermCompleteReportSupervisor', 43, '2019-09-11 00:00:00', '2019-09-11 00:00:00', 'A'),
(173, 'createExam', 44, '2019-07-04 00:00:00', '2019-07-04 00:00:00', 'I'),
(174, 'viewSummaryGradesTermSupervisor', 43, '2019-09-11 00:00:00', '2019-09-11 00:00:00', 'A'),
(175, 'viewSummaryGradesTerm', 41, '2019-09-10 00:00:00', '2019-09-10 00:00:00', 'A'),
(176, 'create', 51, '2019-10-01 20:43:21', '2019-10-01 20:43:21', 'A'),
(177, 'SchoolCalendarStudent', 52, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(178, 'createExam', 44, '2019-10-01 20:43:21', '2019-10-01 20:43:21', 'A'),
(179, 'finalReport', 53, '2019-10-01 20:43:21', '2019-10-01 20:43:21', 'A'),
(180, 'finalTeacherReport', 53, '2019-10-01 20:43:21', '2019-10-01 20:43:21', 'A'),
(181, 'viewAllUsersByParallel', 40, '2020-04-22 00:00:00', '2020-04-22 00:00:00', 'A'),
(182, 'create', 54, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(183, 'viewInfoStudents', 40, '2020-04-22 00:00:00', '2020-04-22 00:00:00', 'A'),
(184, 'finalCertificatePromotion', 53, '2019-10-01 20:43:21', '2019-10-01 20:43:21', 'A'),
(185, 'ByBlock', 55, '2020-08-26 17:40:48', '2020-08-26 17:58:16', 'A'),
(186, 'ReporteAssistance', 17, '2020-09-18 12:00:00', '2020-09-18 12:00:00', 'A'),
(187, 'SupervisorReportAssistance', 48, '2020-09-23 10:28:00', '2020-09-23 10:28:00', 'A'),
(188, 'viewGrades3p', 24, '2020-10-07 09:19:46', '2020-10-07 09:19:46', 'A'),
(189, 'ByTerm', 55, '2020-08-26 17:40:48', '2020-08-26 17:58:16', 'A'),
(190, 'blockOptionModule', 34, '2019-05-17 00:00:00', '2019-05-17 00:00:00', 'A'),
(191, 'SupervisorFaultsByStudent', 48, '2020-09-23 10:28:00', '2020-09-23 10:28:00', 'I'),
(192, 'disableBlock', 34, '2021-01-19 11:28:37', '2021-01-19 11:28:37', 'A'),
(193, 'enableBlock', 34, '2021-01-19 11:28:37', '2021-01-19 11:28:37', 'A'),
(194, 'finalReportPromotion', 53, '2021-01-21 13:08:48', '2021-01-21 13:08:48', 'A'),
(197, 'ByBlockDoc', 56, '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'A'),
(198, 'StudentBlockReportDocente', 57, '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'A'),
(199, 'sign_update', 58, '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'A'),
(200, 'StudentBlockReportDocente', 57, '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'A'),
(201, 'ByTermDoc', 56, '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'A'),
(202, 'StudentTermReportDocente', 57, '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'A'),
(203, 'ByFinal', 55, '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'A'),
(204, 'FinalReportsByStudent2', 42, '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'A')

;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Parallel`
--

CREATE TABLE `Parallel` (
  `ParallelId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `ParallelName` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Parallel Name Description',
  `CourseId` int(11) NOT NULL COMMENT 'Course Table Reference',
  `ParallelDateCreated` datetime NOT NULL COMMENT 'Parallel Creation Date',
  `ParallelDateUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Updated Parallel Date',
  `ParallelStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'Parallel Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Paralelo';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Question`
--

CREATE TABLE `Question` (
  `QuestionId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `QuizId` int(11) NOT NULL COMMENT 'Quiz Table Reference',
  `QuestionValue` float NOT NULL COMMENT 'Question Value',
  `MultipleAnswers` tinyint(1) NOT NULL COMMENT 'Support Multiple Answers',
  `QuestionDescription` text COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Question Description',
  `FilePath` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'File Path',
  `QuestionDateCreated` datetime NOT NULL COMMENT 'Question Creation Date',
  `QuestionDateUpdated` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Updated Question Date',
  `QuestionStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'Question Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Pregunta';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Quiz`
--

CREATE TABLE `Quiz` (
  `QuizId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `QuizName` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Quiz Name Description',
  `QuizDateCreated` datetime NOT NULL COMMENT 'Quiz Creation Date',
  `QuizDateUpdated` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Updated Quiz Date',
  `QuizStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'Quiz Status',
  `QuizStartDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Report`
--

CREATE TABLE `Report` (
  `ReportId` int(11) NOT NULL,
  `ReportUserId` int(11) NOT NULL,
  `ActivityType` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `ActivityId` int(11) DEFAULT NULL,
  `ActivityDateCreated` datetime NOT NULL,
  `ActivityDateUpdated` datetime DEFAULT NULL,
  `ReportStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ResourceCategory`
--

CREATE TABLE `ResourceCategory` (
  `ResourceCategoryId` int(11) NOT NULL,
  `ResourceCategoryName` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ResourceCategoryDateCreated` datetime NOT NULL,
  `ResourceCategoryDateUpdated` datetime NOT NULL,
  `ResourceCategoryStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ResourceCategory`
--

INSERT INTO `ResourceCategory` (`ResourceCategoryId`, `ResourceCategoryName`, `ResourceCategoryDateCreated`, `ResourceCategoryDateUpdated`, `ResourceCategoryStatus`) VALUES
(1, 'Libro', '2019-05-31 00:00:00', '2019-05-31 00:00:00', 'A'),
(2, 'Imagen', '2019-05-31 00:00:00', '2019-05-31 00:00:00', 'A'),
(3, 'Actividad Multimedia', '2019-05-31 00:00:00', '2019-05-31 00:00:00', 'A'),
(4, 'Enlace Externo', '2019-05-31 00:00:00', '2019-05-31 00:00:00', 'A'),
(5, 'Video', '2019-05-31 00:00:00', '2019-05-31 00:00:00', 'A'),
(6, 'Audio', '2019-05-31 00:00:00', '2019-05-31 00:00:00', 'A'),
(7, 'PDF', '2019-05-31 00:00:00', '2019-05-31 00:00:00', 'A'),
(8, 'Diapositivas', '2019-05-31 00:00:00', '2019-05-31 00:00:00', 'A'),
(9, 'Simuladores', '2019-05-31 00:00:00', '2019-05-31 00:00:00', 'A'),
(10, 'AudioLibro', '2019-05-31 00:00:00', '2019-05-31 00:00:00', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ResponseSupplyDetail`
--

CREATE TABLE `ResponseSupplyDetail` (
  `ResponseSupplyDetailId` bigint(20) NOT NULL,
  `SubjectCourseUserParallelId` int(11) DEFAULT NULL,
  `SupplyDetailId` int(11) DEFAULT NULL,
  `ResponseSupplyDetailComment` text COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `ResponseSupplyDetailFile` int(11) DEFAULT NULL,
  `ResponseSupplyDetailDateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `ResponseSupplyDetailDateUpdated` datetime NOT NULL DEFAULT current_timestamp(),
  `ResponseSupplyDetailStatus` varchar(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Role`
--

CREATE TABLE `Role` (
  `RoleId` int(11) NOT NULL COMMENT 'Role Table Id AutoIncrements',
  `RoleName` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Name Role Description',
  `RoleDateCreated` datetime DEFAULT NULL COMMENT 'Role Creation Date',
  `RoleDateUpdated` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Updated Role Date',
  `RoleStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'Role Status',
  `in_role` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `Role`
--

INSERT INTO `Role` (`RoleId`, `RoleName`, `RoleDateCreated`, `RoleDateUpdated`, `RoleStatus`, `in_role`) VALUES
(1, 'Docente', '2019-05-28 00:00:00', '2019-05-28 15:54:04', 'A', 1),
(2, 'Estudiante', '2019-05-28 00:00:00', '2019-05-28 15:54:16', 'A', 1),
(3, 'Administrador', '2019-05-28 00:00:00', '2019-05-28 16:03:23', 'A', 0),
(4, 'Supervisor', '2019-05-28 00:00:00', '2019-05-28 16:03:33', 'A', 1),
(7, 'Inspector', '2019-05-28 00:00:00', '2019-05-28 16:04:07', 'A', 0),
(8, 'Doctor', '2019-05-28 00:00:00', '2019-05-28 16:04:13', 'A', 0),
(9, 'Tutor de Curso', '2019-06-12 00:00:00', '2019-06-12 23:17:05', 'A', 1),
(10, 'Director', '2019-07-15 23:34:40', '2019-07-15 23:34:40', 'A', 1),
(11, 'Orientador', '2019-07-17 00:00:00', '2019-07-17 00:00:00', 'A', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Role_Module`
--

CREATE TABLE `Role_Module` (
  `RoleModuleId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `RoleId` int(11) NOT NULL COMMENT 'Role Table Reference',
  `ModuleId` int(11) NOT NULL COMMENT 'Module Table Reference',
  `RoleModuleDateCreated` datetime NOT NULL COMMENT 'RoleModule Creation Date',
  `RoleModuleDateUpdated` datetime NOT NULL COMMENT 'Updated RoleModule Date',
  `RoleModuleStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'RoleModule Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `Role_Module`
--

INSERT INTO `Role_Module` (`RoleModuleId`, `RoleId`, `ModuleId`, `RoleModuleDateCreated`, `RoleModuleDateUpdated`, `RoleModuleStatus`) VALUES
(1, 3, 1, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(2, 3, 2, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(3, 3, 3, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(4, 3, 4, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(5, 3, 5, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(6, 3, 6, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(7, 3, 7, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(8, 3, 8, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(9, 3, 9, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(10, 3, 10, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(11, 3, 11, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(12, 3, 12, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(13, 3, 13, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(14, 3, 14, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(15, 3, 15, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(16, 3, 16, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(17, 3, 17, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(18, 3, 18, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(19, 3, 19, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(20, 3, 20, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(21, 2, 1, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'I'),
(22, 2, 2, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'I'),
(23, 2, 3, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'I'),
(24, 2, 4, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'I'),
(25, 2, 8, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'I'),
(26, 2, 9, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'I'),
(27, 2, 9, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'I'),
(28, 2, 17, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'I'),
(29, 1, 1, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(30, 1, 2, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'I'),
(31, 1, 3, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(32, 1, 4, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'I'),
(33, 1, 7, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(34, 1, 17, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(35, 1, 21, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'A'),
(41, 4, 22, '2019-02-24 21:30:40', '2019-02-24 21:30:40', 'A'),
(42, 2, 23, '2019-03-08 00:00:00', '2019-03-08 00:00:00', 'A'),
(43, 2, 24, '2019-03-08 00:00:00', '2019-03-08 00:00:00', 'I'),
(44, 2, 25, '2019-03-08 00:00:00', '2019-03-08 00:00:00', 'A'),
(45, 2, 26, '2019-03-08 00:00:00', '2019-03-08 00:00:00', 'A'),
(46, 4, 27, '2019-03-14 00:00:00', '2019-03-14 00:00:00', 'A'),
(48, 5, 28, '2019-03-15 00:00:00', '2019-03-15 00:00:00', 'A'),
(49, 5, 29, '2019-03-15 00:00:00', '2019-03-15 00:00:00', 'A'),
(50, 6, 30, '2019-03-26 00:00:00', '2019-03-26 00:00:00', 'A'),
(51, 1, 32, '2019-04-26 00:00:00', '2019-04-26 00:00:00', 'A'),
(52, 2, 33, '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'A'),
(53, 4, 34, '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'A'),
(54, 1, 35, '2019-05-16 00:00:00', '2019-05-16 00:00:00', 'A'),
(55, 2, 36, '2019-05-16 00:00:00', '2019-05-16 00:00:00', 'A'),
(56, 7, 37, '2019-05-16 00:00:00', '2019-05-16 00:00:00', 'A'),
(58, 8, 38, '2019-05-16 00:00:00', '2019-05-16 00:00:00', 'A'),
(60, 4, 39, '2019-05-16 00:00:00', '2019-05-16 00:00:00', 'A'),
(61, 4, 40, '2019-06-07 00:00:00', '2019-06-07 00:00:00', 'A'),
(62, 9, 41, '2019-06-12 00:00:00', '2019-06-12 00:00:00', 'A'),
(63, 9, 1, '2019-06-12 00:00:00', '2019-06-12 00:00:00', 'A'),
(64, 9, 3, '2019-06-12 00:00:00', '2019-06-12 00:00:00', 'A'),
(65, 9, 7, '2019-06-12 00:00:00', '2019-06-12 00:00:00', 'A'),
(66, 9, 17, '2019-06-12 00:00:00', '2019-06-12 00:00:00', 'A'),
(67, 9, 21, '2019-06-12 00:00:00', '2019-06-12 00:00:00', 'A'),
(68, 9, 32, '2019-06-12 00:00:00', '2019-06-12 00:00:00', 'A'),
(69, 9, 35, '2019-06-12 00:00:00', '2019-06-12 00:00:00', 'A'),
(70, 4, 42, '2019-06-19 00:00:00', '2019-06-19 00:00:00', 'A'),
(71, 4, 43, '2019-06-28 00:00:00', '2019-06-28 00:00:00', 'A'),
(72, 4, 44, '2019-07-04 00:00:00', '2019-07-04 00:00:00', 'A'),
(73, 10, 42, '2019-07-15 00:00:00', '2019-07-15 00:00:00', 'A'),
(74, 10, 43, '2019-07-15 00:00:00', '2019-07-15 00:00:00', 'A'),
(75, 10, 44, '2019-07-15 00:00:00', '2019-07-15 00:00:00', 'I'),
(77, 10, 46, '2019-07-16 00:00:00', '2019-07-16 00:00:00', 'A'),
(78, 11, 42, '2019-07-17 00:00:00', '2019-07-17 00:00:00', 'A'),
(79, 11, 46, '2019-07-17 00:00:00', '2019-07-17 00:00:00', 'A'),
(80, 10, 47, '2019-07-18 00:01:23', '2019-07-18 00:01:23', 'A'),
(81, 4, 48, '2019-07-24 00:00:00', '2019-07-24 00:00:00', 'A'),
(82, 10, 48, '2019-07-24 00:00:00', '2019-07-24 00:00:00', 'A'),
(83, 4, 49, '2019-08-20 00:00:00', '2019-08-20 00:00:00', 'A'),
(84, 1, 50, '2019-09-03 20:02:20', '2019-09-03 20:02:20', 'A'),
(86, 9, 50, '2019-09-04 00:00:00', '2019-09-04 00:00:00', 'A'),
(87, 4, 50, '2019-09-30 00:00:00', '2019-09-30 00:00:00', 'I'),
(88, 4, 51, '2019-10-01 20:42:59', '2019-10-01 20:42:59', 'A'),
(89, 2, 52, '2019-09-04 00:00:00', '2019-09-04 00:00:00', 'A'),
(90, 4, 53, '2019-09-04 00:00:00', '2019-09-04 00:00:00', 'A'),
(91, 1, 54, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(92, 9, 54, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(93, 2, 54, '2019-02-11 00:00:00', '2019-02-11 00:00:00', 'A'),
(94, 10, 39, '2020-07-03 11:16:10', '2020-07-03 11:16:10', 'I'),
(95, 4, 47, '2019-07-18 00:01:23', '2019-07-18 00:01:23', 'A'),
(96, 9, 55, '2020-08-26 17:59:27', '2020-08-26 17:59:27', 'A'),
(97, 7, 48, '2020-08-26 17:59:27', '2020-08-26 17:59:27', 'A'),
(98, 10, 53, '2021-01-22 09:45:39', '2021-01-22 09:45:39', 'A'),
(99, 7, 53, '2021-01-22 10:05:20', '2021-01-22 10:05:20', 'A'),
(100, 7, 53, '2021-01-22 10:05:20', '2021-01-22 10:05:20', 'A'),
(101, 7, 43, '2021-01-22 10:10:04', '2021-01-22 10:10:04', 'A'),
(102, 7, 42, '2021-01-22 11:37:03', '2021-01-22 11:37:03', 'A'),
(103, 1, 56, '2021-02-14 00:00:00', '2021-02-14 00:00:00', 'A'),
(104, 1, 57, '2021-02-14 00:00:00', '2021-02-14 00:00:00', 'A'),
(105, 9, 58, '2021-02-14 00:00:00', '2021-02-14 00:00:00', 'A'),
(106, 10, 58, '2021-02-14 00:00:00', '2021-02-14 00:00:00', 'A'),
(107, 4, 58, '2021-02-14 00:00:00', '2021-02-14 00:00:00', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `School`
--

CREATE TABLE `School` (
  `SchoolId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `SchoolName` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'School Name Description',
  `SchoolShortName` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'School Short Name',
  `SchoolMotto` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT 'School Motto',
  `SchoolCity` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `SchoolPrincipal` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `SchoolSecretary` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `SchoolAddress` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `SchoolPhone` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `SchoolEmail` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `SchoolZoom` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `SchoolGoogleMeet` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `AccountId` int(11) NOT NULL COMMENT 'Index Associated Table',
  `SchoolCode`  VARCHAR(50) NULL DEFAULT NULL,
  `sports`  VARCHAR(50) NULL DEFAULT NULL,
  `SchoolDateCreated` datetime NOT NULL COMMENT 'Input School Creation Date',
  `SchoolDateUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Updated School Date',
  `SchoolStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'School Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `School`
--

INSERT INTO `School` (`SchoolId`, `SchoolName`, `SchoolShortName`, `SchoolMotto`, `SchoolCity`, `SchoolPrincipal`, `SchoolSecretary`, `SchoolAddress`, `SchoolPhone`, `SchoolEmail`, `SchoolZoom`, `SchoolGoogleMeet`, `AccountId`, `SchoolDateCreated`, `SchoolDateUpdated`, `SchoolStatus`) VALUES
(1, 'UNIDAD EDUCATIVA', 'INSTITUCIÓN', 'Nombre', 'Cuidad', 'MSc. Secretaria', 'Nombres', 'Dirección', '000000', 'correo@hotmail.es', 'https://zoom.us/signin', '', 1, '2020-03-13 15:57:26', '2020-05-30 21:01:06', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SCUP_ExamDetail`
--

CREATE TABLE `SCUP_ExamDetail` (
  `SCUPExamDetailId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `SubjectCourseUserParallelId` int(11) NOT NULL COMMENT 'SubjectCourseUserParallel Table Reference',
  `ExamDetailId` int(11) NOT NULL COMMENT 'ExamDetail Table Reference',
  `StudentExamGrade` float NOT NULL COMMENT 'Student Exam Grade',
  `SCUPExamDetailDateCreated` datetime NOT NULL COMMENT 'SCUPExamDetail Creation Date',
  `SCUPExamDetailDateUpdated` datetime NOT NULL COMMENT 'Updated SCUPExamDetail Date',
  `SCUPExamDetailStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'SCUPExamDetail Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Nota del estudiante por examen';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SCUP_SD_QT_Answer`
--

CREATE TABLE `SCUP_SD_QT_Answer` (
  `SCUP_SD_QT_AnswerId` int(11) NOT NULL,
  `SCUP_SD_QuizTimeId` int(11) NOT NULL,
  `AnswerId` int(11) NOT NULL,
  `AnswerText` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `DateCreated` datetime NOT NULL,
  `DateUpdated` datetime NOT NULL,
  `Status` char(1) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SCUP_SD_QuizTime`
--

CREATE TABLE `SCUP_SD_QuizTime` (
  `SCUP_SD_QuizTimeId` int(11) NOT NULL,
  `SCUPSupplyDetailId` int(11) NOT NULL,
  `QuizTime` time NOT NULL,
  `DateCreated` datetime NOT NULL,
  `DateUpdated` datetime NOT NULL,
  `Status` char(1) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SCUP_Suppletory`
--

CREATE TABLE `SCUP_Suppletory` (
  `SCUPSuppletoryDetailId` int(11) NOT NULL,
  `SubjectCourseUserParallelId` int(11) NOT NULL,
  `SuppletoryDetailId` int(11) NOT NULL,
  `StudentSupletoryDetailGrade` float NOT NULL,
  `SCUPSupletoryDetailDateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `SCUPSupletoryDetailDateUpdated` timestamp NOT NULL DEFAULT current_timestamp(),
  `SCUPSupletoryDetailStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SCUP_SupplyDetail`
--

CREATE TABLE `SCUP_SupplyDetail` (
  `SCUPSupplyDetailId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `SubjectCourseUserParallelId` int(11) NOT NULL COMMENT 'SubjectCourseUserParallel Table Reference',
  `SupplyDetailId` int(11) NOT NULL COMMENT 'SupplyDetail Table Reference',
  `SCUPSupplyDetailDateCreated` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'SCUPSupplyDetail Creation Date',
  `SCUPSupplyDetailDateUpdated` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Updated SCUPSupplyDetail Date',
  `StudentSupplyGrade` float NOT NULL DEFAULT 0 COMMENT 'Student Supply Grade',
  `StudentResponseStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'P',
  `PendingActivityChecked` tinyint(1) NOT NULL DEFAULT 0,
  `GradeChecked` tinyint(1) NOT NULL DEFAULT 0,
  `SCUPSupplyDetailStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'A' COMMENT 'SCUPSupplyDetail Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Nota del estudiante por insumo';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SC_Exam`
--

CREATE TABLE `SC_Exam` (
  `SCExamId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `SubjectCourseId` int(11) NOT NULL COMMENT 'SubjectCourse Table Reference',
  `ExamId` int(11) NOT NULL COMMENT 'Exam Table Reference',
  `SCExamDateCreated` datetime NOT NULL COMMENT 'SCExam Creation Date',
  `SCExamDateUpdated` datetime NOT NULL COMMENT 'Updated SCExam Date',
  `SCExamStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'SCExam Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Enlace de Examen con Materia de un Curso';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SC_Suppletory`
--

CREATE TABLE `SC_Suppletory` (
  `SCSuppletoryId` int(11) NOT NULL,
  `SubjectCourseId` int(11) NOT NULL,
  `SuppletoryId` int(11) NOT NULL,
  `SCSuppletoryDateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `SCSuppletoryDateUpdated` timestamp NOT NULL DEFAULT current_timestamp(),
  `SCSuppletoryStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SC_Supply`
--

CREATE TABLE `SC_Supply` (
  `SCSupplyId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `SubjectCourseId` int(11) NOT NULL COMMENT 'SubjectCourse Table Reference',
  `SupplyId` int(11) NOT NULL COMMENT 'Supply Table Reference',
  `SCSupplyDateCreated` datetime NOT NULL COMMENT 'SCSupply Creation Date',
  `SCSupplyDateUpdated` datetime NOT NULL COMMENT 'Updated SCSupply Date',
  `SCSupplyStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'SCSupply Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Enlace de Insumo con Materia de un Curso';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Section`
--

CREATE TABLE `Section` (
  `SectionId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `SectionCatalogId` int(11) NOT NULL,
  `SectionName` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Section Name Description',
  `SchoolId` int(11) NOT NULL COMMENT 'School Table Reference',
  `SectionDateCreated` datetime NOT NULL COMMENT 'Section Creation Date',
  `SectionDateUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Updated Section Date',
  `SectionStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'A' COMMENT 'Section Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `Section`
--

INSERT INTO `Section` (`SectionId`, `SectionCatalogId`, `SectionName`, `SchoolId`, `SectionDateCreated`, `SectionDateUpdated`, `SectionStatus`) VALUES
(1, 0, 'EDUCACIÓN INICIAL', 1, '2020-04-01 23:55:48', '2020-04-01 23:55:48', 'A'),
(2, 0, 'PREPARATORIA', 1, '2020-04-01 23:55:48', '2020-04-01 23:55:48', 'A'),
(3, 0, 'BÁSICA ELEMENTAL', 1, '2020-04-01 23:55:48', '2020-04-01 23:55:48', 'A'),
(4, 0, 'BÁSICA MEDIA', 1, '2020-04-01 23:55:48', '2020-04-01 23:55:48', 'A'),
(5, 0, 'BÁSICA SUPERIOR', 1, '2020-04-01 23:55:48', '2020-04-01 23:55:48', 'A'),
(6, 0, 'BACHILLERATO GENERAL UNIFICADO', 1, '2020-04-01 23:55:48', '2020-04-01 23:55:48', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SectionCatalog`
--

CREATE TABLE `SectionCatalog` (
  `SectionCatalogId` int(11) NOT NULL,
  `ShortName` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Name` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `SectionCatalogDateCreated` datetime NOT NULL,
  `SectionCatalogDateUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `SectionCatalogStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `signature`
--

CREATE TABLE `signature` (
  `id_sign` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status_signature` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `StudentAgent`
--

CREATE TABLE `StudentAgent` (
  `StudentAgentId` int(11) NOT NULL,
  `StudentName` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `StudentAgentName` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Subject`
--

CREATE TABLE `Subject` (
  `SubjectId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `SubjectName` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Subject Name Description',
  `SubjectOrder` int(255) DEFAULT NULL COMMENT 'School Subject Order',
  `SchoolId` int(11) NOT NULL COMMENT 'School Table Reference',
  `SubjectDateCreation` datetime NOT NULL COMMENT 'Subject Creation Date',
  `SubjectDateUpdated` datetime NOT NULL COMMENT 'Updated Subject Date',
  `SubjectStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'Subject Status',
  `is_letter` smallint(1) DEFAULT 0,
  `type_letter` varchar(20) COLLATE utf8mb4_spanish_ci NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SubjectCourse_UserParallel`
--

CREATE TABLE `SubjectCourse_UserParallel` (
  `SubjectCourseUserParallelId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `SubjectCourseId` int(11) NOT NULL COMMENT 'SubjectCourse Table Reference',
  `UserParallelId` int(11) NOT NULL COMMENT 'UserParallel Table Reference',
  `SubjectCourseUserParallelDateCreated` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'SubjectCourseUserParallel Creation Date',
  `SubjectCourseUserParallelDateUpdated` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Updated SubjectCourseUserParallel Date',
  `SubjectCourseUserParallelStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'A' COMMENT 'SubjectCourseUserParallel Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Subject_Course`
--

CREATE TABLE `Subject_Course` (
  `SubjectCourseId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `SubjectId` int(11) NOT NULL COMMENT 'Subject Table Reference',
  `CourseId` int(11) NOT NULL COMMENT 'Course Table Reference',
  `SubjectCourseDateCreated` datetime NOT NULL COMMENT 'SubjectCourse Creation Date',
  `SubjectCourseDateUpdated` datetime NOT NULL COMMENT 'Updated SubjectCourse Date',
  `SubjectCourseStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'SubjectCourse Status',
  `SubjectCourseSummaryGroup` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Suppletory`
--

CREATE TABLE `Suppletory` (
  `SuppletoryId` int(11) NOT NULL,
  `SuppletoryName` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ParallelId` int(11) NOT NULL,
  `SuppletoryDateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `SuppletoryDateUpdated` timestamp NOT NULL DEFAULT current_timestamp(),
  `SuppletoryIdentificator` char(3) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'SUP',
  `SuppletoryStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SuppletoryDetail`
--

CREATE TABLE `SuppletoryDetail` (
  `SuppletoryDetailId` int(11) NOT NULL,
  `SuppletoryDetailName` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `SuppletoryDetailContent` longtext COLLATE utf8mb4_spanish_ci NOT NULL,
  `SuppletoryDetailGrade` int(11) NOT NULL,
  `SuppletoryDetailDateLimit` datetime NOT NULL,
  `SCSuppletoryId` int(11) NOT NULL,
  `SuppletoryDetailDateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `SuppletoryDetailDateUpdated` timestamp NOT NULL DEFAULT current_timestamp(),
  `SuppletoryDetailStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Supply`
--

CREATE TABLE `Supply` (
  `SupplyId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `SupplyName` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Supply Name Description',
  `BlockId` int(11) NOT NULL COMMENT 'Block Table Reference',
  `ActivityId` int(11) NOT NULL COMMENT 'Activity Table Reference',
  `SupplyDateCreated` datetime NOT NULL COMMENT 'Supply Creation Date',
  `SupplyDateUpdated` datetime NOT NULL COMMENT 'Updated Supply Date',
  `SupplyStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'Supply Status',
  `ReportLabel` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `InsumoVisible` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Insumo';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SupplyDetail`
--

CREATE TABLE `SupplyDetail` (
  `SupplyDetailId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `SupplyDetailName` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'SupplyDetail Name Description',
  `SupplyDetailContent` longtext COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'SupplyDetail Content Description',
  `SupplyDetailResponse` int(11) NOT NULL DEFAULT 0,
  `SCSupplyId` int(11) NOT NULL COMMENT 'SCSupply Table Reference',
  `SupplyDetailGrade` int(11) NOT NULL DEFAULT 0 COMMENT 'Supply Grade',
  `SupplyDetailDateCreated` datetime NOT NULL COMMENT 'SupplyDetail Creation Date',
  `SupplyDetailDateUpdated` datetime NOT NULL COMMENT 'Updated SupplyDetail Date',
  `SupplyDetailDateLimit` datetime NOT NULL COMMENT 'Supply Detail Delivered Date',
  `SupplyDetailStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'SupplyDetail Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Detalles de insumo';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SupplyDetail_Quiz`
--

CREATE TABLE `SupplyDetail_Quiz` (
  `SupplyDetailQuizId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `SupplyDetailId` int(11) NOT NULL COMMENT 'SupplyDetail Table Reference',
  `QuizId` int(11) NOT NULL COMMENT 'Quiz Table Reference',
  `SupplyDetailQuizDateCreated` datetime NOT NULL COMMENT 'SupplyDetailQuiz Creation Date',
  `SupplyDetailQuizDateUpdated` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Updated SupplyDetailQuiz Date',
  `SupplyDetailQuizStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'SupplyDetailQuiz Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TeacherResource`
--

CREATE TABLE `TeacherResource` (
  `TeacherResourceId` int(11) NOT NULL,
  `TeacherResourceName` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `TeacherResourceFile` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `SubjectCourseId` int(11) NOT NULL,
  `UserParallelId` int(11) NOT NULL,
  `TeacherResourceDateCreated` datetime NOT NULL,
  `TeacherResourceDateUpdated` datetime NOT NULL,
  `TeacherResourceStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ResourceCategoryId` int(11) NOT NULL,
  `TeacherResourceSource` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Term`
--

CREATE TABLE `Term` (
  `TermId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `TermName` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'Term Name Description',
  `ParallelId` int(11) NOT NULL COMMENT 'Parallel Table Reference',
  `TermDateCreated` datetime NOT NULL COMMENT 'Term Creation Date',
  `TermDateUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Updated Term Date',
  `TermYear` year(4) NOT NULL COMMENT 'Term Year Detail',
  `TermStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'Term Status',
  `TermIdentificator` char(2) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci COMMENT='Periódo';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `User`
--

CREATE TABLE `User` (
  `UserId` int(11) NOT NULL COMMENT 'UserID',
  `UserNames` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'User Names',
  `SchoolId` int(11) NOT NULL COMMENT 'School Table Reference',
  `RoleId` int(11) NOT NULL COMMENT 'Role Table Reference',
  `UserLastNames` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'User LastNames',
  `UserEmail` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'User Email for login',
  `UserPassword` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'User Password',
  `UserDateCreated` datetime NOT NULL COMMENT 'Log for Date Created',
  `UserDateUpdated` datetime NOT NULL COMMENT 'Log for Date Updated',
  `UserStatus` varchar(2) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'A' COMMENT 'User Status',
  `UserDateBlocked` datetime DEFAULT NULL,
  `is_main` int(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `UserDetails`
--

CREATE TABLE `UserDetails` (
  `UserDetailId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `UserSex` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UserSchoolBus` varchar(10) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserAddress` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `UserIdNumber` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `UserBloodType` varchar(5) COLLATE utf8mb4_spanish_ci NOT NULL,
  `UserAllergies` text COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserFatherName` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserMotherName` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserRepresentant` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserRepresentantAuthorized` varchar(10) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserRepresentantRelationShip` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserRepresentantIdNumber` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserRepresentantNationality` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserRepresentantEducation` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserRepresentantContactNumber` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserRepresentantContactMobileNumber` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserRepresentantContactWorkNumber` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserRepresentantProfession` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserRepresentantWorkPlace` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserRepresentantAddress` text COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserContactNumber` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `UserRepresentantEmail` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserBirthDate` date NOT NULL,
  `UserNationality` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `UserParish` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserCity` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserProvince` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserCountry` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserMatValue` float DEFAULT NULL,
  `UserPenValue` float DEFAULT NULL,
  `FilePath` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `UserRelatives`
--

CREATE TABLE `UserRelatives` (
  `UserRelativeId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `UserRelativeName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserRelativeAuthorized` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserRelativeRelationship` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserRelativeIdNumber` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserRelativeNationality` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserRelativeEmail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserRelativeEducation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserRelativeAddress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserRelativeContactNumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserRelativeContactMobileNumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserRelativeContactWorkNumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserRelativeProfession` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserRelativeWorkPlace` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `UserRelativeDateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `UserRelativeDateUpdated` datetime NOT NULL DEFAULT current_timestamp(),
  `UserRelativeStatus` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `User_Options_RoleModule`
--

CREATE TABLE `User_Options_RoleModule` (
  `UserOptionsRoleModuleId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `UserOptionsRoleModuleName` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'UserOptionsRoleModule Name Description',
  `UserId` int(11) NOT NULL COMMENT 'User Table Reference',
  `OptionsId` int(11) NOT NULL COMMENT 'Options Table Reference',
  `RoleModuleId` int(11) NOT NULL COMMENT 'RoleModule Table Reference',
  `UserOptionsRoleModuleDateCreated` datetime NOT NULL COMMENT 'UserOptionsRoleModule Creation Date',
  `UserOptionsRoleModuleDateUpdated` datetime NOT NULL COMMENT 'Updated UserOptionsRoleModule Date',
  `UserOptionsRoleModuleDateStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'UserOptionsRoleModule Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `User_Parallel`
--

CREATE TABLE `User_Parallel` (
  `UserParallerId` int(11) NOT NULL COMMENT 'Table Id AutoIncrements',
  `UserId` int(11) NOT NULL COMMENT 'User Table Reference',
  `ParallelId` int(11) NOT NULL COMMENT 'Parallel Table Reference',
  `UserParallelDateCreated` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'UserParallel Creation Date',
  `UserParallelDateUpdated` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Updated UserParallel Date',
  `UserParallelStatus` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'A' COMMENT 'UserParallel Status',
  `IsTutor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

COMMIT;


INSERT into Options (OptionName, ModuleId, OptionStatus, OptionDateCreated, OptionDateUpdated) values('ByFinalDoc' , (SELECT ModuleId FROM `Module` where ModuleTable='ImprovementPlanDoc' ), 'A', '2019-05-10 00:00:00', '2019-05-10 00:00:00')


-- PINES

CREATE TABLE `course_books_active_pin` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table Id Accounts AutoIncrements',
  `book_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` varchar(10) DEFAULT 'active',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;


CREATE TABLE `user_pines_active` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT  'Table Id Accounts AutoIncrements',
  `pin` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `status` varchar(10) DEFAULT 'active',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;




CREATE TABLE `printing` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` varchar(10) DEFAULT 'active',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
