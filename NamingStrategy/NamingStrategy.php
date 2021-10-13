<?php

namespace Tactics\CrsvBundle\NamingStrategy;

use Tactics\CrsvBundle\FieldUpdater\FieldUpdater;

/**
 * Interface NamingStrategy
 * @package Tactics\CrsvBundle\NamingStrategy
 */
interface NamingStrategy
{
    /**
     * @param FieldUpdater $updater
     * @return string
     */
    public function getFieldUpdaterName(FieldUpdater $updater);
}