<?php
namespace Guestbook\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Guestbook\Model\Entry;

class IndexController extends AbstractActionController
{
    private $entryTable;
    
    private $entryForm;
    
    public function getEntryTable()
    {
        if (!$this->entryTable) {
            $sm = $this->getServiceLocator();
            $this->entryTable = $sm->get('guestbook_entry_table');
        }
        return $this->entryTable;
    }
    
    public function getEntryForm()
    {
        if (!$this->entryForm) {
            $sm = $this->getServiceLocator();
            $this->entryForm = $sm->get('guestbook_form');
        }
        return $this->entryForm;
    }
    
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function bookAction()
    {
        $entries = $this->getEntryTable()->findAll();
        $request = $this->getRequest();
        $entry = new Entry();
        $form = $this->getEntryForm();
        if ($request->isPost()) { 
            $form->setData($request->getPost());
            if ($form->isValid()) {
                
                $entry->exchangeArray($form->getData());
                $this->entryTable->add($entry);
                return $this->redirect()->toRoute('book');
            }
        }
 
        return new ViewModel(
                array(
                        'entries'   => $entries,
                        'entryForm' => $form
                    )
            );
    }
}
