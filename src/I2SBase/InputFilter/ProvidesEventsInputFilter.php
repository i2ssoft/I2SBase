<?php
namespace I2SBase\InputFilter;

use Zend\InputFilter\InputFilter;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\EventManager;

class ProvidesEventsInputFilter extends InputFilter
{
    /**
     * @var EventManagerInterface
     */
    protected $events;

    /**
     * Set the event manager instance used by this context
     *
     * @param  EventManagerInterface $events
     * @return mixed
     */
    public function setEventManager(EventManagerInterface $events)
    {
        $this->events = $events;
        return $this;
    }

    /**
     * Retrieve the event manager
     *
     * Lazy-loads an EventManager instance if none registered.
     *
     * @return EventManagerInterface
     */
    public function getEventManager()
    {
        if (!$this->events instanceof EventManagerInterface) {
            $identifiers = array(__CLASS__, get_called_class());
            if (isset($this->eventIdentifier)) {
                if ((is_string($this->eventIdentifier))
                    || (is_array($this->eventIdentifier))
                    || ($this->eventIdentifier instanceof Traversable)
                ) {
                    $identifiers = array_unique($identifiers + (array) $this->eventIdentifier);
                } elseif (is_object($this->eventIdentifier)) {
                    $identifiers[] = $this->eventIdentifier;
                }
                // silently ignore invalid eventIdentifier types
            }
            $this->setEventManager(new EventManager($identifiers));
        }
        return $this->events;
    }
}
