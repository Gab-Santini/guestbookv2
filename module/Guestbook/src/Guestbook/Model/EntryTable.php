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
}

?>