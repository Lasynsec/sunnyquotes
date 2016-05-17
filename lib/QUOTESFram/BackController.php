<?php
namespace OCFram;

/*
* Execute une action ici (méthode);
* Obtient la page associée au contrôleur.
* Modifie le module, l'action et la vue associée au contrôleur.
*/
abstract class BackController extends ApplicationComponent
{
	protected $action = ''; // l'action (méthode)à executer.
	protected $module = ''; // Le' module (Bundle) à trouver.
	protected $page = null; // La page dans laquelle stocker des données.
	protected $view = '';   // La vue 
	protected $managers = null; // get the managers.

	public function __construct(Application $app, $module, $action)
	{
		parent::__construct($app); // On recupère le contructeur du parent.

		$this->page = new Page($app);	
		$this->managers = new Managers('PDO', PDOFactory::getMysqlConnexion()); // On transmet les données à la vue.

		$this->setModule($module);
		$this->setAction($action);
		$this->setView($action);
	}

	/*
	* On execute l'action.
	*/
	public function execute()
	{
		$method = 'execute'.ucfirst($this->action);

		if(!is_callable([$this, $method])){ // si la methode existe dans l'objet.
			throw new \RuntimeException('L\'action "'.$this->action.'" n\'est pas définie sur ce module');
		}

		$this->$method($this->app->httpRequest());
	}

	/**
	* getter
	*/
	public function page()
	{
		return $this->page;
	}

	/**
	* setters
	*/
	public function setModule($module)
	{
		if(!is_string($module) || empty($module)){
			throw new \InvalidArgumentException('Le module doit être une chaine de caractères valide');
		}

		$this->module = $module;
	}

	public function setAction($action)
	{
		if(!is_string($action) || empty($action)){
			throw new \InvalidArgumentException('L\'action doit être une chaine de caractères valide');
		}

		$this->action = $action;
	}

	/**
	* On assigne une vue.
	*/
	public function setView($view)
	{
		if(!is_string($view) || empty($view))
	    {
	      throw new \InvalidArgumentException('La vue doit être une chaine de caractères valide');
	    }

	    $this->view = $view;

	    $this->page->setContentFile(__DIR__.'/../../App/'.$this->app->name().'/Modules/'.$this->module.'/Views/'.$this->view.'.php');
	}
} 

