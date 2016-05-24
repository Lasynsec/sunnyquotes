<?php
namespace Model;

use \Entity\Quote;

class QuoteManagerPDO extends QuoteManager
{
	public function getList()
	{   // the query.
		$sql = 'SELECT id, author, quote FROM quotes ORDER BY id DESC';

		$query = $this->dao->query($sql);
		$query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Quote');
        
        $listeQuotes = $query->fetchAll();

        return $listeQuotes;
	}
}