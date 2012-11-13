<?php

class Application_Model_DbTable_Category extends Zend_Db_Table_Abstract
{

    protected $_name = 'category';

    public function getTop()
    {
        $select = $this->select()->where('IdT = ?', 0);
        $rows = $this->fetchAll($select); 
        return (!empty($rows)) ? $rows : null;
    }
}

