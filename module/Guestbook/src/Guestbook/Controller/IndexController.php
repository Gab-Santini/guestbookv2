<?php
namespace Guestbook\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        echo "hello world !";
        exit;
    }
}
