<?php
/**
 * Plugin Name: Synop Application
 * Description: Plugin for testing and approbation of the soandso/synop vendor library
 * Plugin URI: https://soandso.biz/
 * Author: soandso
 * Author URI: https://soandso.biz/
 * Version: 0.1.1
 * License: GPL-2.0-or-later
 * Text Domain: synop-application
 */

/*
    Copyright (C) Year  Author  Email

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

namespace Synop_Application;

use Synop_Application\backend\manage\Menu;
use Synop_Application\core\Application;

if (!defined('ABSPATH') )
{
    exit();
}

if(!function_exists('add_action'))
{
    esc_html_e('Not Allowed!', 'synop-application');
    exit();
}

//Setup
define('SYNOP_APP', true);
define('SYNOP_APP_PATH', plugin_dir_path( __FILE__ ));
define('SYNOP_APP_CONFIG', SYNOP_APP_PATH . 'config/');
define('SYNOP_APP_FOLDER',  plugin_dir_url( __FILE__ ));
define('SYNOP_ADMIN_PAGE_TEMPLATE', SYNOP_APP_PATH . 'resources/admin/');
define('SYNOP_FRONTEND_TEMPLATE', SYNOP_APP_PATH . 'resources/frontend/');


//Includes
require_once SYNOP_APP_PATH . '../../vendor/autoload.php';
$components = require SYNOP_APP_CONFIG . 'components.php';


//Init
$menuAdmin = Menu::instance();
$application = Application::instance($components);


//Hooks
register_activation_hook(  __FILE__, array($application::$app->activate, 'activatePlugin') );
add_action( 'admin_menu', array($menuAdmin, 'addMenu') );
add_action( 'wp_enqueue_scripts', array($application::$app->activate, 'loadScripts') );
add_action( 'wp_ajax_decoder_form', array($application::$app->synop, 'getDecode') );
add_action( 'wp_ajax_nopriv_decoder_form', array($application::$app->synop, 'getDecode') );


//Shortcodes
add_shortcode('item_decoder', array($application::$app->form, 'getView'));