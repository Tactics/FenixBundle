<?php

namespace Tactics\CrsvBundle\NamingStrategy;

use Tactics\CrsvBundle\FieldUpdater\FieldUpdater;

/**
 * Class ShortNameStrategy
 * @package Tactics\CrsvBundle\NamingStrategy
 */
class ShortNameStrategy implements NamingStrategy
{
    public function getFieldUpdaterName(FieldUpdater $updater)
    {
        return \sfInflector::camelize(str_replace('Updater', '', (new \ReflectionClass($updater))->getShortName()));
    }
}