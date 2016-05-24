<?php
namespace QUOTESFram;

class PDOFactory
{
	public static function getMysqlConnexion()
	{
		$db = new \PDO('mysql:host=localhost;dbname=sunnyquotes', 'root','deparigo'); // On se connecte
		$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); 

		return $db;
	} 
}
?>