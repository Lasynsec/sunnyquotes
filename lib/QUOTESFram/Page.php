<?php
namespace QUOTESFram;

/**
* Génère la vue et le layout.
*/
class Page extends ApplicationComponent
{
	protected $contentFile;
	protected $vars = [];

	/**
	* Ajouter une variable de donnée à la page.
	* @param: $var, on reçoit le nom de la variable.
	* @param: $value, on reçoit la valeur de la variable.
	* 
	*/
	public function addVar($var, $value)
	{
		if(!is_string($var) || is_numeric($var) || empty($var))
		{	
			throw new \InvaldArgumentExcpetion('Le nom de la varibla doit être une chaine de caractère non nulle');
		}

		$this->$vars[$var] = $value;
	}

	/**
	* générer la page avec le layout de l'application.
	* @param: no
	* @return: no
	*/
	public function getGeneratedPage()
	{
		if(!file_exists($this->contentFile))
		{
			throw new \RuntimeException('La vue spécifiée n\'existe pas');
		}

		$user = $this->app->user(); // On initialise la variable user.

		extract($this->vars);

		ob_start();
			require $this->contentFile;
		$content = ob_get_clean();

		ob_start();
			require __DIR__.'/../../App/'.$this->app->name().'/Templates/layout.php'; // On recupère le layout.
	}

	/**
	* On assigne une vue à la page.
	* @param: $content
	*/
	public function setContentFile($contentFile)
	{
		if(!is_string($contentFile) || empty($contentFile)){
			throw new \InvalideArgumentException('La vue spécifiée est invalide');
		}

		$this->contentFile = $contentFile;
	}
} 