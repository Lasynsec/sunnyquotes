<?php
namespace OCFram;

abstract class Entity implements \ArrayAccess
{
	protected $erreurs = [];
	protected $id; // identifiant de chaque entité.

	public function __construct(array $donnees = [])
	{
		if(!empty($donnees)){ // if there is datas ?
			$this->hydrate($donnees);
		}
	}

	/**
	* check if id doens't already exists in database.
	* @param: no
	* @return: the current id
	*/
	public function isNew()
	{
		return empty($this->id);
	}

	/**
	* @Getters.
	*/
	public function erreurs()
	{	
		return $this->erreurs;
	}

	public function id()
	{
		return $this->id();
	}

	/**
	* @setters
	*/
	public function setId($id)
	{
		$this->id = (int) $id;
	}

	/**
	* hydrate the datas from database
	* @param: the array of datas
	* @return: no 
	*/
	public function hydrate(array $donnees)
	{
		foreach ($donnees as $attribut=> $valeur) { // on parcourt le tableau d'array de données.
			$methode = 'set'.ucfirst($attribut);  // On recupère les setters

			if(is_callable([$this, $methode])){ // On verifie si les méthodes existent ds l'objet
				$this->$methode($valeur); // On hydrate les methode.
			}
		}
	}

	/**
	* offsets
	*/
	public function offsetGet($var)
	{   //  Verify that the contents of a variable can be called as a function.
		if(isset($this->$var) && is_callable([$this, $var])) 
		{
			return $this->$var();
		}
	}

	public function offsetSet($var, $value)
	{
		$method = 'set'.ucfirst($var);

		if(isset($this->$var) && is_callable([$this, $method]) 
		{
			$this->$method($value);
		}
	}

	public function offsetExists($var)
	{
		return isset($this->$var) && is_callable([$this, $var]);
	}

	public function offsetUnset($var)
	{
		throw new \Exception("Impossible de supprimet une quelconque valeur");
		
	}
}
?>