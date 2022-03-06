SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Disparadores `Parallel`
--
DELIMITER $$
CREATE TRIGGER `TermxParalel` AFTER INSERT ON `Parallel` FOR EACH ROW BEGIN
	INSERT INTO `Term` (`TermId`, `TermName`, `ParallelId`, `TermDateCreated`, `TermDateUpdated`, `TermYear`, `TermStatus`) VALUES (NULL, 'Primer Quimestre', new.ParallelId, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, YEAR(CURDATE()), 'A');

INSERT INTO `Term` (`TermId`, `TermName`, `ParallelId`, `TermDateCreated`, `TermDateUpdated`, `TermYear`, `TermStatus`) VALUES (NULL, 'Segundo Quimestre', new.ParallelId, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, YEAR(CURDATE()), 'A');


END
$$
DELIMITER ;


--
-- Disparadores `Term`
--
DELIMITER $$
CREATE TRIGGER `BlockQuizxTerm` AFTER INSERT ON `Term` FOR EACH ROW BEGIN


INSERT INTO `Block` (`BlockId`, `BlockName`, `TermId`, `BlockDateCreated`, `BlockDateUpdated`, `BlockStatus`) VALUES (NULL, 'Primer Parcial',new.TermId, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 'A');

INSERT INTO `Block` (`BlockId`, `BlockName`, `TermId`, `BlockDateCreated`, `BlockDateUpdated`, `BlockStatus`) VALUES (NULL, 'Segundo Parcial', new.TermId, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 'A');
INSERT INTO `Block` (`BlockId`, `BlockName`, `TermId`, `BlockDateCreated`, `BlockDateUpdated`, `BlockStatus`) VALUES (NULL, 'Tercer Parcial', new.TermId, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 'A');

INSERT INTO `Exam` (`ExamId`, `ExamName`, `TermId`, `ExamDateCreated`,`ExamStatus`) VALUES (NULL, CONCAT('Examen ',new.TermName), new.TermId, CURRENT_TIMESTAMP, 'A');





END
$$
DELIMITER ;
COMMIT;
