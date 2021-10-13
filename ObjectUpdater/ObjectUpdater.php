<?php

namespace Tactics\CrsvBundle\ObjectUpdater;

use Tactics\CrsvBundle\FieldUpdater\FieldUpdater;
use Tactics\CrsvBundle\NamingStrategy\NamingStrategy;

class ObjectUpdater implements IObjectUpdater
{
    /** @var NamingStrategy */
    private $namingStrategy;

    /** @var FieldUpdater[] */
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
     * @param mixed $object
     * @param string $fieldName
     * @param array $changes
     * @return void
     */
    public function update($object, string $fieldName, array $changes)
    {
        $fieldUpdater = $this->findFieldUpdater($fieldName);
        if (!$fieldUpdater) return;

        $fieldUpdater->update($object, $changes);
    }


    /**
     * @param string $fieldname
     * @return FieldUpdater|null
     */
    private function findFieldUpdater(string $fieldname)
    {
        $needle = \sfInflector::camelize($fieldname);

        return array_key_exists($needle, $this->updaters)
            ? $this->updaters[$needle]
            : null;
    }
}