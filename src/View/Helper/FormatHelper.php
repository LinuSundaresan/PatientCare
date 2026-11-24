<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\ORM\TableRegistry;

class FormatHelper extends Helper
{
    function getName($id , $resource)
    {
        $records = TableRegistry::getTableLocator()->get($resource);
        $record = $records->find()
            ->where(['id' => $id])
            ->first();

        return $record ? (string)$record->name : '';
    }
}