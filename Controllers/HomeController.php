<?php

namespace Controllers;

class HomeController extends BasicController
{
    function loginPage()
    {
        $this->content = $this->renderTemplate("Templates/login.tpl.php");
        $this->renderLayout("twocolumns.tpl.php");
    }

    function loginAction() {
        $postData = $_POST;
        var_dump($postData);
    }

    function homepage()
    {
        $this->content = $this->renderTemplate("Templates/homepage.tpl.php");
        $this->renderLayout("twocolumns.tpl.php");
    }

    function logout()
    {
        $this->content = "Logout";
        echo "This is my logout";
    }
}