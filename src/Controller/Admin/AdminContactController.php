<?php

namespace App\Controller\Admin;
use App\Framework\Viewer;
use App\Model\contact;

class AdminContactController {

  public function index() {
    $contactModal = new Contact;
    $contacts = $contactModal->getContactsWithUser();

    $viewer = new Viewer();
    echo $viewer->renderAdmin([
        "title" => "Danh sách liên hệ",
        "pageName" => "contact/index.php",
        "contacts" => $contacts,
    ]);
  }
}