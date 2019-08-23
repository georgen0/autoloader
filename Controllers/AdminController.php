<?php


namespace Controllers;


class AdminController extends BasicController
{
    public function adminPage() {
        $this->content = $this->renderTemplate('Templates/admin_page.tpl.php');
        $this->renderLayout('basic_admin.tpl.php');
    }

    public function manageUsersPage() {
        $this->sidebar = $this->renderTemplate('Templates/sidebar_manage_users.tpl.php');
        $this->content = $this->renderTemplate('Templates/admin_manage_users.tpl.php');
        $this->renderLayout('twocolumns_admin.tpl.php');
    }

    public function settingsPage() {
        $this->content = $this->renderTemplate('Templates/admin_settings.tpl.php');
        $this->renderLayout('basic_admin.tpl.php');
    }

}