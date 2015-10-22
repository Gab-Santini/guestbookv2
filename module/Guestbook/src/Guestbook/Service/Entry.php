<?php
namespace Guestbook\Service;

use Guestbook\Model\Entry as EntryEntity;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;

class Entry implements ServiceManagerAwareInterface
{
    protected $serviceManager;
    
    protected $entryTable;
    
    protected $entryForm;

    public function getEntryTable()
    {
        if (!$this->entryTable) {
            $this->entryTable = $this->getServiceManager()->get('guestbook_entry_table');
        }
        return $this->entryTable;
    }
    
    public function getEntryForm()
    {
        if (!$this->entryForm) {
            $this->entryForm = $this->getServiceManager()->get('guestbook_form');
        }
        return $this->entryForm;
    }
    
    public function getServiceManager()
    {
        return $this->serviceManager;
    }

    public function setServiceManager(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
        return $this;
    }
    
    public function findAll()
    {
        return $this->getEntryTable()->findAll();
    }
    
    public function add($dataPost)
    {
        $entry = new EntryEntity();
        $form = $this->getEntryForm();
            $form->setData($dataPost);
            if ($form->isValid()) {
                $entry->exchangeArray($form->getData());
                $this->getEntryTable()->add($entry);
                return true;
            }
        return false;
    }
}