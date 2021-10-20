<?php

namespace Tactics\FenixBundle\CrsVereniging\NamingStrategy;

use Tactics\FenixBundle\CrsVereniging\FieldUpdater\FieldUpdater;

/**
 * Interface NamingStrategy
 * @package Tactics\FenixBundle\CrsVereniging\NamingStrategy
 */
interface NamingStrategy
{
    /**
     * @param FieldUpdater $updater
     * @return string
     */
    public function getFieldUpdaterName(FieldUpdater $updater);
}