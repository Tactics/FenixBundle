<?php

namespace Tactics\CrsvBundle\ObjectUpdater;

use Tactics\CrsvBundle\Exceptions\FieldUpdaterNotFoundException;

interface IObjectUpdater
{
    /**
     * @param mixed $object
     * @param string $fieldName
     * @param array $changes
     * @return bool
     * @throws FieldUpdaterNotFoundException
     */
    public function update($object, string $fieldName, array $changes);
}