<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu;

use Plugin\AceClient43\AceServices\Model\Dependency\Mail;

/**
 * Class MailJyudenModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MailJyudenModel implements MailJyudenModelInterface
{
    use Mail\MailTrait;

    /** @var ?string $tbikou 伝票メール情報 */
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