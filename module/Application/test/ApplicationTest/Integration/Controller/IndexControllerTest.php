<?php

namespace ApplicationTest\Integration\Controller;

use ApplicationTest\PHPUnit\AbstractPHPUnitControllerTestCase;

class IndexControllerTest extends AbstractPHPUnitControllerTestCase
{

    public function testIndexAction()
    {
        $this->dispatch('/application', 'GET');
        $statusCode = $this->getResponseStatusCode();
        $this->assertEquals(200, $statusCode);
    }

}
