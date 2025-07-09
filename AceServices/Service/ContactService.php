<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\AceServices\Service;

use Plugin\AceClient43\AceServices\AceMethod;
use Plugin\AceClient43\AceServices\AceServiceAbstract;
use Plugin\AceClient43\AceServices\AceServiceInterface;

/**
 * Contact Service
 *
 * @deprecated Inject Method as service instead of using this service. This class will be removed in the future.
 *
 * @author Ars-Phuoc <minh.phuoc.le@ar-system.co.jp>
 */
class ContactService extends AceServiceAbstract implements AceServiceInterface
{
    protected string $baseServiceName = 'Contact';

    /**
     * Make RegContactMethod
     *
     * @deprecated Inject RegContactMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Contact\RegContactMethod
     */
    public function makeRegContactMethod(): AceMethod\Contact\RegContactMethod
    {
        return new AceMethod\Contact\RegContactMethod($this->serviceRetriever);
    }
}
