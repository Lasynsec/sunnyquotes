<?php
namespace QUOTESFram;

class Route 
{
	protected $action; // the action method.
	protected $module; // the module controller
	protected $url;    // Url.
	protected $varsNames; // names fo variables;
	protected $vars = []; // variables arrays/

	// initialize properties
	public function __construct($url, $module, $action, array $varsNames)
	{
		$this->setUrl($url);
    	$this->setModule($module);
    	$this->setAction($action);
    	$this->setVarsName($varsNames);
	}

	/***/
	/*Actions-----------------------------------*/
	/***/

	/**
	* if variable exists.
	*/
	public function hasVars()
	{
		return !empty($this->varsNames); // return true if not empty.
	}

	/**
	* if the url match.
	*/
	public function match($url)
	{
		if(preg_match('`^'.$this->url.'$`', $url, $matches))
		{
			return $matches; // if ok return the value of the url
		}
		else
		{
			return false; // return false;
		}
	}

	/***/
	/*Setters----------------------------------*/
	/***/
	public function setAction($action)
	{
		if(is_string($action)){
			$this->action = $action;
		}

	}

	public function setModule($module)
	{
		if(is_string($module)){
			$this->module = $module;
		}		
	}

	public function setUrl($url)
	{
		if(is_string($url)){
			$this->url = $url;
		}
	}

	public function setVarsName(array $varsNames)
	{
		$this->varsNames = $varsNames;
	}

	public function setVars(array $vars)
	{
		$this->vars = $vars;
	}

	/***/
	/*Getters------------------------------*/
	/***/
	public function action()
	{
		return $this->action;
	}

	public function module()
	{
		return $this->module;
	}

	public function vars()
	{
		return $this->vars;
	}

	public function varsNames()
	{
		return $this->varsNames;
	}
}


?>