<?php
namespace Model;

use \Entity\Author;

class AuthorsManagerPDO extends AuthorsManager
{
  public function getUnique($id)
  {
  	$query = $this->dao->prepare('SELECT id, firstname, lastname, century FROM authors WHERE id = :id');
  	$query->bindValue(':id', (int) $id, \PDO::PARAM_INT);
  	$query->execute();

  	$query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Author');

  	if($author = $query->fetch())
  	{
  		return $author; // We send the author.
  	}
    return null; // We send nothing.
  }

  public function getList()
  {   // the query.
    $sql = 'SELECT id, firstname, lastname, century FROM authors ORDER BY id ASC';

    $query = $this->dao->query($sql);
    $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Author');
        
        $listeAuthors = $query->fetchAll();

        return $listeAuthors;
  }
}