<?php
namespace Model;

use \QUOTESFram\Manager;
use \Entity\Author;

abstract class AuthorsManager extends Manager
{
  /**
   * Méthode retournant un autheur précise.
   * @param $id int L'identifiant de l'autheur à récupérer
   * @return Author L'autheur. demandée
   */
  abstract public function getUnique($id);

  /**
   * Méthode retournant une liste d'autheur demandée
   * @return array La liste de citations. Chaque entrée est une instance de autheur.
   */

  abstract public function getList();
}