<?php
namespace Guestbook;

use Guestbook\Model\Entry;
use Zend\Db\ResultSet\ResultSet;
use Guestbook\Model\EntryTable;
use Guestbook\Form\Entry as EntryForm;
use Guestbook\Form\EntryFilter; 

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'guestbook_entry_table' =>  function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Entry());
                    $entryTable =  new EntryTable('guestbook_entry', $dbAdapter, null, $resultSetPrototype);
                    return $entryTable;
                },
                'guestbook_form' => function($sm) {
                    $entryForm = new EntryForm();
                    $filter = new EntryFilter();
                    $entryForm->setInputFilter($filter);
                    return $entryForm;
                }
            ),
        );
    }
}
