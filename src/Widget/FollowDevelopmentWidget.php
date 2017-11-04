<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Application\Widget;

use MSBios\View\Model\ViewModel;
use MSBios\Widget\RendererWidgetAwareInterface;
use MSBios\Widget\RendererWidgetAwareTrait;
use MSBios\Widget\WidgetInterface;
use Zend\View\Model\ModelInterface;

/**
 * Class FollowDevelopmentWidget
 * @package MSBios\Application\Widget
 */
class FollowDevelopmentWidget implements WidgetInterface, RendererWidgetAwareInterface
{
    use RendererWidgetAwareTrait;

    /**
     * @param null $data
     * @return string
     */
    public function output($data = null)
    {
        /** @var ModelInterface $viewModel */
        $viewModel = new ViewModel($data);
        $viewModel->setTemplate('follow-development');
        return $this->render($viewModel);
    }
}
