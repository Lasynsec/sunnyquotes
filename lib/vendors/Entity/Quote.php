<?php
namespace Entity;

use \QUOTESFram\Entity;

class Quote extends Entity
{
	protected $author,
	          $quote,
	          $id;

	const INVALID_QUOTE  = 1;

	public function isValid()
	{
		return !(empty($this->author) || empty($this->quote));
	}
    
    /*
    * Setters
    */
    public function setId($id)
    {
    	$this->id = (int) $id;
    }

	public function setAuthor($author) // The author's id.
	{
		$this->author = (int) $author;
	}

	public function setQuote($quote)
	{
		if(!is_string($quote) || empty($quote)){
			$this->errors[] = self::INVALID_QUOTE;
		}
	}

	/*
	* Getters
	*/
	public function id()
	{
		return $this->id;
	}

	public function author()
	{
		return $this->author;
	}

	public function quote()
	{
		return $this->quote;
	}
              
}