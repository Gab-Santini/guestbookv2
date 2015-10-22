<?php
namespace Guestbook\Model;

use Zend\Db\TableGateway\TableGateway;

class EntryTable extends TableGateway
{
    public function findAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }
    
    public function add(Entry $entry)
    {
        $data = array(
            'name'      => $entry->getName(),
            'email'     => $entry->getEmail(),
            'website'   => $entry->getWebsite(),
            'message'   => $entry->getMessage()
        );
        $this->insert($data);
    }
}

?>