<?php

namespace Plugin\AceClient\Tests\AceRequestTest\Jyuden;

use Eccube\Tests\Web\Admin\AbstractAdminWebTestCase;
use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Response;
use Plugin\AceClient\AceServices\Model\Response\Jyuden\AddCartResponseModel;
use Plugin\AceClient\AceServices\Model\Response\Member\RegMemResponseModel;
use Plugin\AceClient\AceClient;
use GuzzleHttp\Exception\ClientException;

class RegMemberTest extends AbstractAdminWebTestCase
{
    
    public function testReqMemberAdr()
    {
        $nmember = (new Request\Member\RegMemAdr\NmemberModel())->setEda(1)->setFax(2);
        $requestPrm = new Request\Member\RegMemAdr\MemberPrmModel;
        $requestPrm->setNmember($nmember);

        $request = new Request\Member\RegMemAdr\RegMemAdrRequestModel();
        $request->setId(1)->setPrm($requestPrm );

    }

}