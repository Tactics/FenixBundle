<?php

namespace Tactics\FenixBundle\CrsVereniging\ObjectUpdater;

use Tactics\FenixBundle\CrsVereniging\Exceptions\FieldUpdaterNotFoundException;

interface IObjectUpdater
{
    /**
     * @param mixed $object
     * @param string $fieldName
     * @param array $changes
     * @param int $revision
     * @return bool
     * @throws FieldUpdaterNotFoundException
     */
    public function update($object, string $fieldName, array $changes, int $revision);
}