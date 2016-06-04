<?php
namespace Model;

use \Entity\Quote;

class QuotesManagerPDO extends QuotesManager
{
	public function getList()
	{   // the query.
		$sql = 'SELECT id, author, quote FROM quotes ORDER BY id ASC';

		$query = $this->dao->query($sql);
		$query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Quote');
        
        $listeQuotes = $query->fetchAll();

        $query->closeCursor();

        return $listeQuotes;
	}

    public function getListOf($author)
	{
		if(!ctype_digit($author)) // si non numerique.
		{
			throw new \InvalidArgumentException('The ID must be a number');
		}

		$query = $this->dao->prepare('SELECT id, author, quote FROM quotes WHERE author = :author');
		$query->bindValue(':author', $author, \PDO::PARAM_INT);
		$query->execute();

		$query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Quote');

		$quotes = $query->fetchAll();

		return $quotes;

	}

	public function getAuthorId()
	{
		$sql = 'SELECT author FROM quotes ORDER BY id ASC';

		$query = $this->dao->query($sql);
		$query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Quote');
        
        $listeQuotes = $query->fetchAll();

        return $listeQuotes;
	}
}