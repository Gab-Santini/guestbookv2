<?php
namespace Guestbook\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    protected $entryService;
    
    public function getEntryService()
    {
        if (!$this->entryService) {
            $this->entryService = $this->getServiceLocator()->get('service_entry');
        }
        return $this->entryService;
    }
    
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function bookAction()
    {
        $entryService =  $this->getEntryService();
        
        return new ViewModel([
                'entries' => $entryService->findAll()
            ]);
    }
}
