<?php

namespace Tactics\FenixBundle\CrsVereniging\ObjectUpdater;

use Tactics\FenixBundle\CrsVereniging\Exceptions\FieldUpdaterNotFoundException;
use Tactics\FenixBundle\CrsVereniging\FieldUpdater\FieldUpdater;
use Tactics\FenixBundle\CrsVereniging\NamingStrategy\NamingStrategy;

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
     * {@inheritdoc}
     */
    public function update($object, string $fieldName, array $changes, int $revision, array $changeRequestDetails = [])
    {
        $fieldUpdater = $this->findFieldUpdater($fieldName);
        if (!$fieldUpdater) {
            $errorMsg = sprintf("No FieldUpdater found for %s.%s.", get_class($object), $fieldName);
            throw new FieldUpdaterNotFoundException($errorMsg, 404);
        }

        return $fieldUpdater->update($object, $changes, $revision, $changeRequestDetails);
    }

    /**
     * @return FieldUpdater[]
     */
    public function getFieldUpdaters()
    {
        return $this->updaters;
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