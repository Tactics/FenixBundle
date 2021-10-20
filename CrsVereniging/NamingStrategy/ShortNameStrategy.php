<?php

namespace Tactics\FenixBundle\CrsVereniging\NamingStrategy;

use Tactics\FenixBundle\CrsVereniging\FieldUpdater\FieldUpdater;

/**
 * Class ShortNameStrategy
 * @package Tactics\FenixBundle\CrsVereniging\NamingStrategy
 */
class ShortNameStrategy implements NamingStrategy
{
    public function getFieldUpdaterName(FieldUpdater $updater)
    {
        return \sfInflector::camelize(str_replace('Updater', '', (new \ReflectionClass($updater))->getShortName()));
    }
}