<?php

namespace Synop_Application\backend\manage;


use Synop_Application\core\TSingleton;

class Menu
{
    use TSingleton;

    public function addMenu()
    {
        add_menu_page( __('Synop Application', 'synop-application'), __('Synop Data', 'synop-application'), 'manage_options', 'synop_application', array( self::class, 'PluginPage'), 'dashicons-cloud', 25 );
        add_submenu_page('synop_application', __('About Information', 'synop-application'), __('About', 'synop-application'), 'manage_options', 'about_synop_application', array( self::class, 'addAboutPage') );
    }

    public function PluginPage()
    {
        require SYNOP_ADMIN_PAGE_TEMPLATE . 'general_page.php';
    }

    public function addAboutpage()
    {
        require SYNOP_ADMIN_PAGE_TEMPLATE . 'about_page.php';
    }
}