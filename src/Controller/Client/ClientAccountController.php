<?php

namespace App\Controller\Client;

use App\Framework\Viewer;
use App\Model\User;

class ClientAccountController
{
    public function index()
    {
        $userID = 1;
        $userModel = new User();
        $user = $userModel->find($userID);

        $viewer = new Viewer();
        echo $viewer->renderClient([
            "title" => "Tài khoản của tôi",
            "pageName" => "account/index.php",
            "user" => $user,
        ]);
    }

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
}
