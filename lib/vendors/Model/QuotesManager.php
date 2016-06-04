<?php
namespace Model;

use \QUOTESFram\Manager;
use \Entity\Quote;

abstract class QuotesManager extends Manager
{
  /**
   * Méthode retournant une liste de citations demandée
   * @return array La liste de citations. Chaque entrée est une instance de quote.
   */

  abstract public function getList();

  /**
   * Méthode permettant de récupérer une liste de citations par autheur.
   * @param $author L'autheur sur lequel on veut récupérer les citations.
   * @return array
   */
  abstract public function getListOf($author);

  /**
  * Methode qui recupère l'id de l'auteur.
  * @param: neant
  * @return: id de l'autheur.
  */
  abstract public function getAuthorId();
}