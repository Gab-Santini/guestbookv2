<?php
namespace Guestbook;

use Zend\Db\ResultSet\ResultSet;
use Guestbook\Model\EntryTable;
use Guestbook\Form\Entry as EntryForm;

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
            'invokables' => array(
                'guestbook_entry_service'   => 'Guestbook\Service\Entry',
                'guestbook_model_entry'     => 'Guestbook\Model\Entry',
                'guestbook_entry_filter'    => 'Guestbook\Form\EntryFilter',  
            ),
            'factories' => array(
                'guestbook_entry_table' =>  function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype($sm->get('guestbook_model_entry'));
                    $entryTable =  new EntryTable('guestbook_entry', $dbAdapter, null, $resultSetPrototype);
                    return $entryTable;
                },
                'guestbook_form' => function($sm) {
                    $entryForm = new EntryForm();
                    $entryForm->setInputFilter($sm->get('guestbook_entry_filter'));
                    return $entryForm;
                }
            ),
        );
    }
}
