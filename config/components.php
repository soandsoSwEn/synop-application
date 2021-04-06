<?php

namespace Synop_Application\config;


use Synop_Application\core\Activate;
use Synop_Application\frontend\shortcodes\Decoder_Form;
use Synop_Application\process\decoder\Synop;

return [
    'form'          => Decoder_Form::class,
    'activate'      => Activate::class,
    'synop'         => Synop::class,
];
