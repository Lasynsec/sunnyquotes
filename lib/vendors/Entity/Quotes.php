<?php
namespace Entity;

use \QUOTESFram\Entity;

class Quote extends Entity
{
	protected $author,
	          $quote;

	const INVALID_AUTHOR = 1;
	const INVALID_QUOTE  = 2;

	public function isValid()
	{
		return !(empty($this->author) || empty($this->quote));
	}
    
    /*
    * Setters
    */
	public function setAuthor($author) // The author's id.
	{
		$this->author = (int) $author;
	}

	public function setQuote($quote)
	{
		if(!is_string($quote) || empty($quote)){
			$this->errors[] = self:: INVALID_AUTHOR;
		}

	}

	/*
	* Getters
	*/
	public function author()
	{
		return $this->author;
	}

	public function quote()
	{
		return $this->quote;
	}
              
}