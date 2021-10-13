<?php

namespace Tactics\CrsvBundle\FieldUpdater;

interface FieldUpdater
{
    /**
     * @param mixed $object
     * @param array $changes
     * @return bool true if success, false on failure
     */
    public function update($object, $changes);
}