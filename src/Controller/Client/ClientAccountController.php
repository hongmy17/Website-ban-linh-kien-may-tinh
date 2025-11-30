<?php

namespace App\Controller\Client;

use App\Framework\Viewer;

class ClientAccountController
{
    public function login()
    {
        $viewer = new Viewer();
        echo $viewer->renderClient(["pageName" => "account/login.php"]);
    }

    public function register()
    {
        $viewer = new Viewer();
        echo $viewer->renderClient(["pageName" => "account/register.php"]);
    }

    public function profile()
    {
        $viewer = new Viewer();
        echo $viewer->renderClient(["pageName" => "account/index.php"]);
    }
}
