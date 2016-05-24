<?php
namespace App\Frontend\Modules\Quotes;

use \QUOTESFram\BackController;
use \QUOTESFram\HTTPRequest;

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
		$manager = $this->managers->getManagerOf('Quote');
       // Let's get all quotes in a array
		$listQuotes = $manager->getList();
       
       // Add the new variable in Template.
       $this->page->addVar('listQuotes', $listQuotes);    
 	}
}