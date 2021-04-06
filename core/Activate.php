<?php


namespace Synop_Application\core;


/**
 * Class Activate contains methods for the plugin activation process
 * @package Synop_Application\core
 */
class Activate
{
    /**
     * Checks against WordPress core version
     */
    public function activatePlugin()
    {
        if (version_compare(get_bloginfo( 'version' ), '5.0', '<')) {
            wp_die( __('You must update WordPress to use this plugin', 'synop-application') );
        }
    }

    /**
     * Loads all resources (.css and .js files) for the frontend
     */
    public function loadScripts()
    {
        wp_register_style('decoder-form', SYNOP_APP_FOLDER . 'resources/frontend/assets/css/style.css', array(), '1.0.0', 'all');
        wp_enqueue_style('decoder-form');

        wp_enqueue_script( 'jquery' );
        wp_register_script( 'ajax-script-form', SYNOP_APP_FOLDER . 'resources/frontend/assets/js/ajax.js', array('jquery'), '1.0.0', true );
        wp_enqueue_script( 'ajax-script-form' );
        wp_localize_script( 'ajax-script-form', 'decoderFormLink', array('url' => admin_url( 'admin-ajax.php' ), 'nonce' => wp_create_nonce( 'decoderFormLink' )) );
    }
}