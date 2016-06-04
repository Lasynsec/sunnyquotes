<?php
namespace App\Frontend\Modules\Quotes;

use \QUOTESFram\BackController;
use \QUOTESFram\HTTPRequest;
use \Entity\Author;

class QuotesController extends BackController
{
	public function executeIndex(HTTPRequest $request)
	{
      
	}
	public function executeShow(HTTPRequest $request)
	{
      
	}
	public function executeInsert(HTTPRequest $request)
	{
      
	}

	public function executeTest(HTTPRequest $request)
	{
       // Let's the Quote Entity.
		//$quotes = $this->managers->getManagerOf('Quote')->getListOf($author);
		$quotes = $this->managers->getManagerOf('Quotes')->getList();
       

        // echo'<pre>';
        // 	print_r($quotes);
        // echo'</pre>';
        
     
		$author = $this->managers->getManagerOf('Authors')->getUnique($quotes[0]->author());
        //authors = $this->managers->getManagerOf('Authors')->getList();
  
		//print_r($quotes);
		//echo $quotes['author'];
		//$authorId = $quotes->author();
       
       // Add the new variable in Template.
       $this->page->addVar('quotes', $quotes);
       $this->page->addVar('author', $author);
 	}
}