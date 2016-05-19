<?php
namespace QUOTESFram;

/*
* represente la réponse envoyée au client
*/
class HTTPResponse extends ApplicationComponent
{
	protected $page;

	/**
	* On ajoute un header spécifique.
	*/
	public function addHeader($header)
	{
		header($header);
	}

	/**
	* On redirige l'utilisateur 
	*/
	public function redirect($location)
	{
		header('Location: '.$locationtion);
		exit;
	}

	/**
	* On redirige l'utilisateur vers la page d'erreur 404.
	*/
	public function redirect404()
	{
		$this->page = new Page($this->app); // On creer une instance de la page avec en paramètre le nom de l'application.
		$this->page->setContentFile(__DIR__.'/../../Errors/404.html'); // On assigne la vue.

		$this->addHeader('HTTP/1.0 404 Not Found'); // Erreur 404, document non trouvé.


		$this->send(); // On envoie la reponse.
	}

	/**
	* On envoie la reponse en générant la page.
	*/
	public function send()
	{
		exit($this->page->getGeneratedPage());
	}

	/**
	*	On 	ajoute un cookie
	*/
	public function setCookie($name, $value = '', $expire = 0, $path = null, $domain = null, $secure = false, $httpOnly = true)
    {
    	setcookie($name, $value, $expire, $path, $domain, $secure, $httpOnly);
  	}

	/**
	* On assigne une page à la réponse
	*/
	public function setPage($page)
	{
		$this->page = $page;
	} 
}