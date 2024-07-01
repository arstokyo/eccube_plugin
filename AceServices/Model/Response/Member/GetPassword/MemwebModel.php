<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetPassword;

use Plugin\AceClient\AceServices\Model\Dependency\Mail;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Model for Memweb
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MemwebModel implements MemwebModelInteface
{
    use Mail\MailTrait,
        NoCategory\PassWdTrait;
}
