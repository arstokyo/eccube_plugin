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

namespace Plugin\AceClient43\Events;

use Eccube\Entity\Customer;
use Plugin\AceClient43\AceServices\Model\Request\Contact\RegContact\RegContactRequestModelInterface;
use Symfony\Contracts\EventDispatcher\Event;

class PreAddContactEvent extends Event
{
    private RegContactRequestModelInterface $regContactRequestModel;

    private Customer $customer;

    private string $content;

    private array $options;

    public function __construct(
        RegContactRequestModelInterface $regContactRequestModel,
        Customer $customer,
        string $content,
        array $options,
    ) {
        $this->regContactRequestModel = $regContactRequestModel;
        $this->customer = $customer;
        $this->content = $content;
        $this->options = $options;
    }
}
