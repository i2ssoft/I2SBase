<?php
namespace I2SBase\Controller;

use Zend\Mvc\Controller\AbstractActionController as ZendAbstractActionController;
use Doctrine\ORM\EntityManager;

class AbstractActionController extends ZendAbstractActionController {
  protected $em;
  
  public function setEntityManager(EntityManager $em) {
    $this->em = $em;
  }
  
  /**
   * 
   * @return Doctrine\ORM\EntityManager
   */
  public function getEntityManager() {
    if(null === $this->em)
      $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
    return $this->em;
  }
  
  
}