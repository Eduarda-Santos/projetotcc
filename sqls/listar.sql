DELIMITER $$

USE `projetotcc`$$

DROP PROCEDURE IF EXISTS `listar`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar`()
BEGIN

SELECT 
nome
FROM
funcionarios;

END$$

DELIMITER ;