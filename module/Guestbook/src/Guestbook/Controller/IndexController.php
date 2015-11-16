<?php
namespace Guestbook\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function bookAction()
    {
        $entryService = $this->getServiceLocator()->get('service_entry');
        
        return new ViewModel([
                'entries' => $entryService->findAll()
            ]);
    }
}
