<?php
namespace QUOTESFram;

/*
* Classe gerant les managers.
*/
class Managers
{
	protected $api = null; 	// stockera l'api(pdo ou mysqli)
	protected $dao = null; 	// stockera les requetes.
	protected $managers = [];

	public function __construct($api, $dao){
		$this->api = $api; // On initialise l'api (PDO ou Mysqli);
		$this->dao = $dao; // On initialise le dao.
	}

	/*
	* On recupère le manager du module.
	*/ 
	public function getManagerOf($module)
	{
		if(!is_string($module) || empty($module)){ // doit être un string et avoir une valeur.
			throw new \InvalidArgumentException("The specified module is not valid !", 1);
		}

		if(!isset($this->managers[$module])){ // l'élement module ne doit pas être null.
			$manager = '\\Model\\'.$module.'Manager'.$this->api;

			$this->managers[$module] = new $manager($this->dao); 
		}

		return $this->managers[$module]; // On retourne l'element
	}
}