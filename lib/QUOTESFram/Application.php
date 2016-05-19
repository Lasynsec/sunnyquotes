<?php
namespace QUOTESFram;

/**
* Classe de Réference pour les applications FrontEnd et BackEnd.
*/
abstract class Application
{
	protected $httpRequest;  // contient la requete du client
	protected $httpResponse; // contient la response à envoyer au client.
	protected $name; // contient le nom de l'application(frontEnd ou backEnd).
	protected $user; // contient l'utilisateur.

	public function __construct()
	{
		$this->httpRequest = new HTTPRequest($this); 	// On instentie l'entité de la requête.
		$this->httpResponse = new HTTPResponse($this);	// On instentie l'entité de la reponse.
		$this->user = new User($this); 					// on instancie la classe lib/MYFram/User avec en parametre une instance de FrontendApplication
		$this->name = ''; // par defaut il ny a encore pas de nom de l'application.
	}

	/**
	* On recupère le controleur correspondant à la Url.
	*/
	public function getController()
	{
		$router = new Router; // on instancie le router.

		$xml = new \DOMDocument; // On creer un objet qui se chargera du fichier xml.
		$xml->load(__DIR__.'/../../App/'.$this->name.'/Config/routes.xml'); // on charge le fichier xml contenant les routes.

		$routes = $xml->getElementsByTagName('route'); // On recupère toute les balise route ds l'array routes.

		// On parcourt les routes du fichier XML via la NodeList $routes.
		foreach($routes as $route) {
			$vars = []; // on crée un array vide qui contiendra les routes.

			// On verifie si chaque balise a l'attribut vars.
			if($route->hasAttribute('vars')){
				$vars = explode(',', $route->getAttribute('vars')); // on stock chaque variable dans var.
			}

			//On ajoute la route au routeur.
			$router->addRoute(new Route($route->getAttribute('url'),   // On recupère l'url
				                        $route->getAttribute('module'), // On recupère la valeur de l'attribut module. 
										$route->getAttribute('action'), $vars)); // On recupère la valeur de l'attribut action.
		}

		try
		{
			// On recupère la route qui correspond à l'URL.
			$matchedRoute = $router->getRoute($this->httpRequest->requestURI());
		} catch(\RuntimeException $e) {
			if($e->getCode() == Router::NO_ROUTE){
				// Si aucune route ne correspond, c'est que la page demandé n'existe pas.
				$this->httpResponse->redirect404();// dans ce cas on redirige vers la page 404.
			}
		}

		// On ajoute les variables de l'URL au tableau =_GET.
		$_GET = array_merge($_GET, $matchedRoute->vars());

		// On instancie le contrôleur.
    	$controllerClass = 'App\\'.$this->name.'\\Modules\\'.$matchedRoute->module().'\\'.$matchedRoute->module().'Controller';
    	return new $controllerClass($this, $matchedRoute->module(), $matchedRoute->action());
	}

	/**
	* On exececute  
	*/
	abstract public function run();

	/**
	* Getters
	*/
	public function httpRequest()
	{
		return $this->httpRequest;
	}

	public function httpResponse()
	{
		return $this->httpResponse;
	}

	public function name()
	{
		return $this->name;
	}

	public function user()
	{
		return $this->user;
	}
}
?>