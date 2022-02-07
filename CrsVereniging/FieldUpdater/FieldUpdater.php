<?php

namespace Tactics\FenixBundle\CrsVereniging\FieldUpdater;

interface FieldUpdater
{
    /**
     * @param mixed $object
     * @param array $changes
     * @param int $revision
     * @param array $changeRequestDetails
     * @return bool true if success, false on failure
     */
    public function update($object, array $changes, int $revision, array $changeRequestDetails = []);
}