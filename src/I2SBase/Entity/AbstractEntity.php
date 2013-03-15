<?php
namespace I2SBase\Entity;

use I2SBase\Entity\Exception;

class AbstractEntity {
  
  public function __call($method, $arguments) {
    $lcMethod = strtolower($method);
    
    if(substr($lcMethod, 0, 3) == 'set') 
    {
      $suffix = substr($lcMethod, 3, strlen($lcMethod));
      if(!isset($arguments[0]) && !is_null($arguments[0]))
        throw new EntityException('You must specify the value to ' . $method);
      if(!property_exists($this, $suffix))
        throw new EntityException('Unknown property ' . $suffix);
      $this->$suffix = $arguments[0];
      return $this;
    } 
    
    if(substr($lcMethod, 0, 3) == 'get') 
    {
      $suffix = substr($lcMethod, 3, strlen($lcMethod));
      if(!property_exists($this, $suffix))
        throw new EntityException('Unknown property ' . $suffix);
      return $this->$suffix;
    }
    
    
    throw new \Exception(sprintf('Unknown method %s::%s', get_class($this), $method));
  }
  

}