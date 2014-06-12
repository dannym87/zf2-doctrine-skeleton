<?php

namespace ApplicationTest\Unit\Controller;

use ApplicationTest\PHPUnit\AbstractPHPUnitTestCase;
use Application\Controller\IndexController;

class IndexControllerTest extends AbstractPHPUnitTestCase
{

    public function testIndexAction()
    {
        $controller = new IndexController();
        $controller->setServiceLocator($this->serviceManager);
        $this->assertInstanceOf('Zend\View\Model\ViewModel', $controller->indexAction());
    }

}
