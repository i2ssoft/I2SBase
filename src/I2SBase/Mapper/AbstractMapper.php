<?php
namespace I2SBase\Mapper;

use I2SBase\EventManager\EventProvider;
use Doctrine\ORM\EntityManager;

class AbstractMapper extends EventProvider {
  
  protected $entityClass = '';
  /**
   * @var \Doctrine\ORM\EntityManager
   */
  protected $em;
  
  public function __construct(EntityManager $em) {
      $this->setEntityManager($em);
  }
  
  /**
   * @return \Doctrine\ORM\EntityRepository
   */
  public function getRepository() {
    return $this->getEntityManager()->getRepository($this->getEntityClass());
  }
  
  public function setEntityManager(EntityManager $em) {
    $this->em = $em;
  }
  /**
   * @return \Doctrine\ORM\EntityManager
   */
  public function getEntityManager() {
    return $this->em;
  }
  
  /****************************************************************************/
  protected function getEntityClass() {
    return $this->entityClass;
  }
}