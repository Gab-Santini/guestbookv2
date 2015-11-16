<?php
namespace Guestbook\Service;


class Entry 
{
   public function findAll()
   {
       return [
           [   'id'      => 1,
               'name'    => 'Albert',
               'email'   => 'arbert@hotmail.com',
               'website' => 'http://example.com',
               'message' => 'hello world'
           ],
           [   'id'      => 2,
               'name'    => 'Gabriele',
               'email'   => 'g.santini@gmail.com',
               'website' => 'http://www.blacksun.com',
               'message' => 'this is an example'
           ],
           [    'id'     => 3,
               'name'    => 'Walid',
               'email'   => 'wmnasri@gmail.com',
               'website' => 'http://www.wmnasri.com',
               'message' => 'this is an other example'
            ] 
       ];
   }
}