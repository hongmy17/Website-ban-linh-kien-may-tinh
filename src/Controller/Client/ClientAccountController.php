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

    public function checkOut()
    {
        $viewer = new Viewer();
        echo $viewer->renderClient(["pageName" => "account/login.php"]);
    }
}
