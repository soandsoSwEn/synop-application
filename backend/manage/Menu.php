<?php

namespace Synop_Application\backend\manage;


use Synop_Application\core\TSingleton;

/**
 * Class Menu contains methods for working with the plugin menu in the admin panel
 * @package Synop_Application\backend\manage
 */
class Menu
{
    use TSingleton;

    /**
     * Adds a menu item to the admin panel
     */
    public function addMenu()
    {
        add_menu_page( __('Synop Application', 'synop-application'), __('Synop Data', 'synop-application'), 'manage_options', 'synop_application', array( self::class, 'PluginPage'), 'dashicons-cloud', 25 );
        add_submenu_page('synop_application', __('About Information', 'synop-application'), __('About', 'synop-application'), 'manage_options', 'about_synop_application', array( self::class, 'addAboutPage') );
    }

    /**
     * Include the Synop Data page in the admin panel
     */
    public function PluginPage()
    {
        require SYNOP_ADMIN_PAGE_TEMPLATE . 'general_page.php';
    }

    /**
     * Include the About Information page in the admin panel
     */
    public function addAboutpage()
    {
        require SYNOP_ADMIN_PAGE_TEMPLATE . 'about_page.php';
    }
}