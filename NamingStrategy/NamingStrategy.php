<?php

namespace Tactics\CrsvBundle\NamingStrategy;

use Tactics\CrsvBundle\Updaters\Updater;

/**
 * Interface NamingStrategy
 * @package Tactics\CrsvBundle\NamingStrategy
 */
interface NamingStrategy
{
    /**
     * @param CommandHandler $handler
     * @return string
     */
    public function getFieldUpdaterName(Updater $updater);
}