<?php
namespace I2SBase\Controller;

class PublicActionController extends AbstractActionController {
  
  public function __construct() {
    $headTitle = new \Zend\View\Helper\HeadTitle();
    $headTitle->set('W3JeT');
  }
  
  
//  public function init(MvcEvent $e) {
//    
//  }
//  
//  protected function attachDefaultListeners() {
//    parent::attachDefaultListeners();
//
//    $events = $this->getEventManager();
//    $events->attach(MvcEvent::EVENT_DISPATCH, array($this, 'init'), 100);
//  }
  
  
}