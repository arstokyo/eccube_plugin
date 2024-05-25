<?php

namespace Plugin\AceClient\Tests\AceRequestTest;

use Eccube\Tests\Web\Admin\AbstractAdminWebTestCase;
use Plugin\AceClient\Utils\Helper\ServiceRetrieveHelper;


class ConfigLoaderTest extends AbstractAdminWebTestCase
{
   
    public function testAutoWireServiceRetrieveHelper()
    {
        self::bootKernel();
        $container = static::$kernel->getContainer();

        /** @var ServiceRetrieveHelper $aceClientHelper */
        $aceClientHelper = $container->get('service.retrieve.helper');

        $this->assertNotNull($aceClientHelper->getConfigRepository());
    }
}