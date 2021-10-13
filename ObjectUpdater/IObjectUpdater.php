<?php

namespace Tactics\CrsvBundle\ObjectUpdater;

interface IObjectUpdater
{
    /**
     * @param mixed $object
     * @param string $fieldName
     * @param array $changes
     * @return void
     */
    public function update($object, string $fieldName, array $changes);
}