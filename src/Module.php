<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Application;

/**
 * Class Module
 * @package MSBios\Application
 */
class Module extends \MSBios\Module
{
    /** @const VERSION */
    const VERSION = '1.0.15';

    /**
     * @inheritdoc
     *
     * @return string
     */
    protected function getDir()
    {
        return __DIR__;
    }

    /**
     * @inheritdoc
     *
     * @return string
     */
    protected function getNamespace()
    {
        return __NAMESPACE__;
    }
}
