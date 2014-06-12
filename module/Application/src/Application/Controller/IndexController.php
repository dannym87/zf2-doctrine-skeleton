<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $users = $this->getServiceLocator()->get('Doctrine\\ORM\\EntityManager')->getRepository('Application\\Entity\\User')->findOneBy(array('id' => 3));
        return new ViewModel(array(
            'users' => $users,
        ));
    }
}
