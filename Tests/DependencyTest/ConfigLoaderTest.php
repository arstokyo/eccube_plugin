<?php

namespace Plugin\AceClient\Tests\AceRequestTest;

use Eccube\Tests\Web\Admin\AbstractAdminWebTestCase;
use Plugin\AceClient\Utils\Helper\AceClientHelper;

class ConfigLoaderTest extends AbstractAdminWebTestCase
{
   
    public function testAutoWireAceClientHelper()
    {
        $helper = new AceClientHelper();
        $aceClientHelper = $this->getContainer()->get('Plugin\AceClient\Utils\Helper\AceClientHelper');
        $this->assertInstanceOf('Plugin\AceClient\Utils\Helper\AceClientHelper', $aceClientHelper);
    }
}