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
class Zopim extends Module
{

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Implements hook "route.list"
     * @param array $routes
     */
    public function hookRouteList(array &$routes)
    {
        // Module settings page
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
        $settings = $this->config->module('zopim');

        if (!empty($settings['code'])//
                && (empty($settings['trigger_id'])//
                || $controller->isTriggered($settings['trigger_id']))) {
            $options = array('position' => 'bottom', 'aggregate' => false);
            $controller->setJs($settings['code'], $options);
        }
    }

}
