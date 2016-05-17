<?php
namespace QUOTESFram;

session_start(); // démarer la session des l'inclusion du fichier.

/**
* Enregistre temporairement l'utilisateur ds la memoire du serveur.
*/ 
class User
{
	/*
	* Obtenir la valeur d'un attribut de session.
	*/
	public function getAttribute($attr)
	{
		return isset($_SESSION[$attr]) ? $_SESSION[$attr] : null;
	}

	/*
	* Assigner un attribut de session à l'utilisateur.
	*/
	public function setAttribut($attr, $value)
	{	
		$_SESSION[$attr] = $value;
	}

	/*
	* Authentifier un utilisateur
	*/
	public function setAuthenticated($authenticated = true)
	{
		if(!is_bool($authenticated)) {
			throw new \InvalidArgumentException("La valeur spécifiée à la methode User::setAuthenticated() doit être un boolean");
		}

		$_SESSION['auth'] = $authenticated;
	} 

	/**
	* Savoir si l'utilisateur est authentifié.
	*/
	public function isAuthenticated()
	{
		return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
	}

	/**
    * Récupérer le message de l'utilisateur.
	*/
	public function getFlash()
	{
		$flash = $_SESSION['flash'];
		unset($_SESSION['flash']);

		return $flash;
	}

	/**
	* Savoir si l'utilisateur à un message.
	*/
	public function hasFlash()
	{
		return isset($_SESSION['flash']);
	}

	/*
	* Assigner un message informatif à l'utilisateur que l'on affichera sur la page.
	*/
	public function setFlash($value)
	{
		$_SESSION['flash'] = $value;
	}
}