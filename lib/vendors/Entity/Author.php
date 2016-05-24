<?php
namespace Entity;

use \QUOTESFram\Entity;

class Author extends Entity
{
	protected $id,
	          $firstname,
	          $lastname,
	          $century;

	const INVALID_FIRSTNAME = 1;
	const INVALID_LASTNAME = 2;
	const INVALID_CENTURY = 3;

	public function isValid()
	{
		return !(empty($this->firstname) || empty($this->lastname) || empty($this->century));
	}

	/*
	* Setters.
	*/
	public function setId($id)
	{
		$this->id = (int) $id;
	}

	public function setFirstname($firstname)
	{
		if(!is_string($firstname) || empty($firstname)){
			$this->errors[] = self::INVALID_QUOTE;
		}
		$this->firstname = $firstname;
	}

	public function setLastname($lastname)
	{
		if(!is_string($lastname) || empty($lastname)){
			$this->errors[] = self::INVALID_QUOTE;
		}
		$this->lastname = $lastname;
	}

	public function setCentury($century)
	{
		$this->century = (int) $century;
	}
    
    /*
    * Getters
    */
    public function id(){return $this->id;}
    public function firstname(){return $this->firstname;}
    public function lastname(){return $this->lastname;}
    public function century(){return $this->century;}
   
	/*
	* Conversion décimal en chiffre romain.
	*/ 
	public function toRomanus($num)
	{
		  //I V X  L  C   D   M
		  //1 5 10 50 100 500 1k
		  $rome =array("","I","II","III","IV","V","VI","VII","VIII","IX");
		  $rome2=array("","X","XX","XXX","XL","L","LX","LXX","LXXX","XC");
		  $rome3=array("","C","CC","CCC","CD","D","DC","DCC","DCCC","CM");
		  $rome4=array("","M","MM","MMM","IVM","VM","VIM","VIIM","VIIIM","IXM");
		  $str=$rome[$num%10];
		  $num-=($num%10);
		  $num/=10;
		  $str=$rome2[$num%10].$str;
		  $num-=($num%10);
		  $num/=10;
		  $str=$rome3[$num%10].$str;
		  $num-=($num%10);
		  $num/=10;
		  $str=$rome4[$num%10].$str;
		  return $str;
	}
 
	//echo chif_rome(152);.
	// Retourne CLII.
}