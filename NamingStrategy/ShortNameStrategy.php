<?php

namespace Tactics\CrsvBundle\NamingStrategy;

use Tactics\CrsvBundle\Updaters\Updater;

/**
 * Class ShortNameStrategy
 * @package Tactics\CrsvBundle\NamingStrategy
 */
class ShortNameStrategy implements NamingStrategy
{
    public function getFieldUpdaterName(Updater $updater)
    {
        return \sfInflector::camelize(str_replace('Updater', '', (new \ReflectionClass($updater))->getShortName()));
    }
}