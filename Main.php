<?php

/**
 * @package Zopim
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2017, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GNU General Public License 3.0
 */

namespace gplcart\modules\zopim;

use gplcart\core\Module;

/**
 * Main class for Zopim module
 */
class Main
{

    /**
     * Module class instance
     * @var \gplcart\core\Module $module
     */
    protected $module;

    /**
     * @param Module $module
     */
    public function __construct(Module $module)
    {
        $this->module = $module;
    }

    /**
     * Implements hook "route.list"
     * @param array $routes
     */
    public function hookRouteList(array &$routes)
    {
        $routes['admin/module/settings/zopim'] = array(
            'access' => 'module_edit',
            'handlers' => array(
                'controller' => array('gplcart\\modules\\zopim\\controllers\\Settings', 'editSettings')
            )
        );
    }

    /**
     * Implements hook "construct.controller.frontend"
     * @param \gplcart\core\controllers\frontend\Controller $controller
     */
    public function hookConstructControllerFrontend($controller)
    {
        $this->setModuleAssets($controller);
    }

    /**
     * Sets module specific assets
     * @param \gplcart\core\controllers\frontend\Controller $controller
     */
    protected function setModuleAssets($controller)
    {
        if (!$controller->isInternalRoute()) {
            $settings = $this->module->getSettings('zopim');
            if (!empty($settings['code']) && (empty($settings['trigger_id']) || $controller->isTriggered($settings['trigger_id']))) {
                $controller->setJs($settings['code'], array('position' => 'bottom'));
            }
        }
    }

}
