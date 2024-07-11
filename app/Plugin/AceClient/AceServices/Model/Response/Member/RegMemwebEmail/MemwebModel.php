<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\RegMemwebEmail;

use Plugin\AceClient\AceServices\Model\Dependency\Mail;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Model for MemwebModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MemwebModel implements MemwebModelInterface
{
    use Mail\MailTrait,
        NoCategory\MbidTrait;
}
