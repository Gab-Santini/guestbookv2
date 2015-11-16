<?php
namespace Guestbook\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Guestbook\Service\Entry as ServiceEntry;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function bookAction()
    {
        $entryService = new ServiceEntry();
        
        return new ViewModel([
                'entries' => $entryService->findAll()
            ]);
    }
}
