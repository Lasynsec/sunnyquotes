<?php
namespace QUOTESFram;

/**
* Represente la reqêute du client (POST, GET, COOKIE).
*/
class HTTPRequest extends ApplicationComponent
{	
	public function __construct(Application $app)
	{
		
	}
	/*
	* On recupère la valeur du cookie en paramètre.
	*/
	public function cookieData($key)
	{
		return isset($_COOKIE[$key]) ? $_COOKIE[$key] : null;
	}

	/*
	* On verifie l'existance du cookie en paramètre.
	*/
	public function cookieExists($key)
	{
		return isset($_COOKIE[$key]);
	}

	/*
	* On recupère la valeur de la requete de GET.
	*/
	public function getData($key)
	{
		return isset($_GET[$key]) ? $_GET[$key] : null; 
	}

	/*
	* On verifie si la valeur en  de GET existe.
	*/
	public function getExists($key)
	{
		return isset($_GET[$key]); 
	}

	/*
	* On retourne le mode de requete de l'utilisateur: POST ou GET.
	*/
	public function method()
	{
		return $_SERVER['REQUEST_METHOD'];
	}

	/*
	* On recupère la valeur de la requete post
	*/
	public function postData($key)
	{
		return isset($_POST[$key]) ? $_POST[$key] : null; 
	}

	/*
	* On verifie si le POST exists. 
	*/
	public function postExists($key)
	{
		return isset($_POST[$key]);
	}

	/*
	* On recupère l'url de la page.
	*/
	public function requestURI()
	{
		return $_SERVER['REQUEST_URI'];
	}
}