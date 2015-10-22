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
        $entryService = $this->getServiceLocator()->get('guestbook_entry_service');
        $form = $this->getServiceLocator()->get('guestbook_form');
        $entries = $entryService->findAll();
        $request = $this->getRequest();
        if ($request->isPost()) {   
            $entryService->add($request->getPost()); 
            return $this->redirect()->toRoute('book');
        }
        return new ViewModel(
                array(
                        'entries'   => $entries,
                        'entryForm' => $form
                    )
            );
    }
}
