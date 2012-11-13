<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $category = new Application_Model_DbTable_Category();
        $this->view->category = $category->getTop();
    }


}

