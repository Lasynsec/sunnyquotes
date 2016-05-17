<?php
namespace OCFram;

class PDOFactory
{
	public static function getMysqlConnexion()
	{
		$db = new \PDO('mysql:host=localhost;dbname=news', 'root',''); // On se connecte
		$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRORMODE_EXCEPTION);

		return $db;
	} 
}
?>