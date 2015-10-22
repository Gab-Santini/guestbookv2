<?php
namespace Guestbook\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Guestbook\Form\Entry;
use Guestbook\Form\EntryFilter;

class IndexController extends AbstractActionController
{
    private $entryTable;
    
    public function getEntryTable()
    {
        if (!$this->entryTable) {
            $sm = $this->getServiceLocator();
            $this->entryTable = $sm->get('guestbook_entry_table');
        }
        return $this->entryTable;
    }
    
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function bookAction()
    {
        $form = new Entry();
        $entries = $this->getEntryTable()->findAll();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $filter = new EntryFilter();
            $form->setInputFilter($filter);  
            $form->setData($request->getPost());
            if ($form->isValid()) {
                echo 'Form is valid !';
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
