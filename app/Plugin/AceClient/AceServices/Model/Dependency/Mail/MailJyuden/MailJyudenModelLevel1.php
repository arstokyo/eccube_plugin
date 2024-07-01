<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Mail\MailJyuden;

use Plugin\AceClient\AceServices\Model\Dependency\Mail;

/**
 * Class For MailJyudenModelLevel1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MailJyudenModelLevel1 implements MailJyudenModelLevel1Interface
{
    use Mail\MailTrait;

    /** @var ?string $tbikou 注文コメント(お客様) */
    protected ?string $tbikou = null;

    /**
     * {@inheritDoc}
     */
    public function getTbikou(): ?string
    {
        return $this->tbikou;
    }

    /**
     * {@inheritDoc}
     */
    public function setTbikou(?string $tbikou)
    {
        $this->tbikou = $tbikou;
        return $this;
    }
}