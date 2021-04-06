<?php

namespace Synop_Application\frontend\shortcodes;


/**
 * Class Decoder_Form contains methods for working with the decoded form
 *
 * @package Synop_Application\frontend\shortcodes
 */
class Decoder_Form
{
    /**
     * Returns the HTML resource of the decoder form
     * @return string
     */
    public function getView()
    {
        $view = $this->getSource();
        $view = str_replace( "DECODER_TITLE", __('Decode', 'synop-application'), $view);

        return $view;
    }

    /**
     * Returns the raw HTML template of the decoder form
     * @return false|string
     */
    public function getSource()
    {
        return file_get_contents(SYNOP_FRONTEND_TEMPLATE . 'form-decoder.php');
    }
}