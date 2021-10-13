<?php

namespace Tactics\CrsvBundle\FIeldUpdaterManager;

use Tactics\CrsvBundle\FieldUpdater\FieldUpdater;
use Tactics\CrsvBundle\NamingStrategy\NamingStrategy;

class FieldUpdaterManager implements IFieldUpdaterManager
{
    /** @var NamingStrategy */
    private $namingStrategy;

    private $updaters = [];

    /**
     * @param NamingStrategy $namingStrategy
     */
    public function __construct(NamingStrategy $namingStrategy)
    {
        $this->namingStrategy = $namingStrategy;
    }

    /**
     * @param FieldUpdater $updater
     */
    public function registerFieldUpdater(FieldUpdater $updater)
    {
        $this->updaters[$this->namingStrategy->getFieldUpdaterName($updater)] = $updater;
    }

    /**
     * @param string $fieldname
     * @return FieldUpdater|null
     */
    public function getFieldUpdater(string $fieldname)
    {
        $needle = \sfInflector::camelize($fieldname);

        return array_key_exists($needle, $this->updaters)
            ? $this->updaters[$needle]
            : null;
    }
}