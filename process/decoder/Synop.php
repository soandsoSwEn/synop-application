<?php

namespace Synop_Application\process\decoder;


use Synop\Report;

/**
 * Class Synop contains methods for decoding weather reports
 * @package Synop_Application\process\decoder
 */
class Synop
{
    /**
     * Returns decoded weather report data
     * @throws \Exception
     */
    public function getDecode()
    {
        $reportData = $this->getReport();
        $report = new Report($reportData);
        $isValid = $report->validate();

        if ($isValid) {
            $report->parse();
        }

        $response['html'] = $this->getResultDecodeOutput($isValid, $report);

        wp_send_json( $response );
        wp_die();
    }

    /**
     * Return the source weather report
     * @return string
     */
    public function getReport()
    {
        if (!wp_verify_nonce($_POST['security'], 'decoderFormLink')) {
            wp_die(__('Error Permission!', 'synop-application'));
        }

        return sanitize_text_field( trim($_POST['report']) );
    }

    /**
     * Returns an HTML resource with decoded weather report data
     * @param $isValid bool
     * @param $report Report
     * @return false|string
     */
    public function getResultDecodeOutput($isValid, $report)
    {
        ob_start();
        include (SYNOP_FRONTEND_TEMPLATE . 'result-decode.php');
        return ob_get_clean();
    }
}