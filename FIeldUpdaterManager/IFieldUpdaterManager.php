<?php

namespace Tactics\CrsvBundle\FIeldUpdaterManager;

use Tactics\CrsvBundle\FieldUpdater\FieldUpdater;

interface IFieldUpdaterManager
{
    /**
     * @return FieldUpdater
     */
    public function getFieldUpdater(string $fieldName);
}