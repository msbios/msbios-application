<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Application\Widget;

use MSBios\Widget\AbstractRendererWidget;

/**
 * Class FollowDevelopmentWidget
 * @package MSBios\Application\Widget
 */
class FollowDevelopmentWidget extends AbstractRendererWidget
{
    /**
     * @param null $data
     * @return string
     */
    public function output($data = null)
    {
        return $this->render('follow-development', $data);
    }
}