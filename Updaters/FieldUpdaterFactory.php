<?php

namespace Tactics\CrsvBundle\Updaters;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Tactics\CrsvBundle\NamingStrategy\NamingStrategy;

class FieldUpdaterFactory implements IFieldUpdaterFactory
{
    /** @var NamingStrategy */
    private $namingStrategy;

    private $updaters = [];

    /**e
     * @param NamingStrategy $namingStrategy
     */
    public function __construct(NamingStrategy $namingStrategy)
    {
        $this->namingStrategy = $namingStrategy;
    }

    public function registerUpdater(Updater $updater)
    {
        $this->updaters[$this->namingStrategy->getFieldUpdaterName($updater)] = $updater;
    }

    /**
     * @param string $fieldname
     * @return Updater|void
     */
    public function getFieldUpdater(string $fieldname)
    {
        $needle = \sfInflector::camelize($fieldname);

        return array_key_exists($needle, $this->updaters)
            ? $this->updaters[$needle]
            : null;
    }
}