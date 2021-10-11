<?php

namespace Tactics\CrsvBundle\Updaters;

interface IFieldUpdaterFactory
{
    /**
     * @param string $fieldname
     * @return Updater
     */
    public function getFieldUpdater(string $fieldname);
}