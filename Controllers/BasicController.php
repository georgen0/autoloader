<?php

namespace Controllers;

class BasicController
{

    function __construct()
    {
        $this->sidebar = "Sidebar Content";
        $this->content = "";
    }

    /**
     * Renders a layout.
     *
     * @param string $layout
     *   Template path.
     * @param array $vars
     *   Custom vars for template, e.g. array('content' => "text");
     */
    function renderLayout($layout, $vars = array())
    {
        $variables = $vars + $this->getLayoutVars();
        echo render_template('Templates/layouts/' . $layout, $variables);
    }

    /**
     * @param $template
     * @param array $variables
     * @return false|string
     */
    function renderTemplate($template, $variables = [])
    {
        return render_template($template, $variables);
    }

    /**
     * @return array
     */
    function getLayoutVars()
    {
        return array(
            "content" => $this->content,
            "sidebar" => $this->sidebar,
        );
    }
}