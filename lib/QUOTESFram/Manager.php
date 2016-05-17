<?php
namespace QUOTESFram;

/**
* Est charger d'implementer un constructeur qui demandera le DAO
*/
abstract class Manager
{
	protected $dao;

	public function __construct($dao)
	{
		$this->dao = $dao;
	}
}
?>