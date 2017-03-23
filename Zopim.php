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
     * Module info
     * @return array
     */
    public function info()
    {
        return array(
            'name' => 'Zopim',
            'version' => '1.0.0-dev',
            'description' => 'Integrates Zopim live chat into your GPL Cart site',
            'author' => 'Iurii Makukh <gplcart.software@gmail.com>',
            'core' => '1.x',
            'license' => 'GNU General Public License 3.0',
            'configure' => 'admin/module/settings/zopim',
            'settings' => array(
                'code' => '',
                'trigger_id' => ''
            )
        );
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
