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
     * @inheritDoc
     *
     * @return string
     */
    protected function getDir(): string
    {
        return __DIR__;
    }

    /**
     * @inheritDoc
     *
     * @return string
     */
    protected function getNamespace(): string
    {
        return __NAMESPACE__;
    }
}