<?php
namespace App\Frontend;

use \QUOTESFram\Application;

class FrontendApplication extends Application
{
	public function __construct()
	{
		parent::__construct();

		$this->name = 'Frontend'; // On assigne le nom de l'application.
	}

	public function run()
	{
		$controller = $this->getController(); // On recupère le controller.
		$controller->execute(); // On l'execute.

		$this->httpResponse->setPage($controller->page()); // Assignation de la page à la réponse.
		$this->httpResponse->send(); // On envoie la réponse.
	}
}

