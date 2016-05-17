<?php
namespace QUOTESFram;

/**
* Class chargé de représenter les composants des applications.
*/ 
abstract class ApplicationComponent
{
	protected $app; // Contient l'application ou l'on se trouve (FrontEnd ou BackEnd).

	public function __construct(Application $app) // On recupère une application. Front ou Back.
	{
		$this->app = $app;
	}

	public function app()
	{
		return $this->app;
	}
}
?>