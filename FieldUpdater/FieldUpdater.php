<?php

namespace Tactics\CrsvBundle\FieldUpdater;

interface FieldUpdater
{
    /**
     * @param mixed $object
     * @param array $changes
     * @return void
     */
    public function update($object, $changes);
}