<?php

function render_template($template, $vars=[])
{
    extract($vars, EXTR_SKIP);
    ob_start();
    include SITE_ROOT. '/'. $template;
    return ob_get_clean();
}