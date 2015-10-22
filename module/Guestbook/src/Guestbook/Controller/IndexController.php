<?php
namespace Guestbook\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

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
        $entries = $this->getEntryTable()->findAll();
        return new ViewModel(
                array(
                        'entries' => $entries
                    )
            );
    }
}
