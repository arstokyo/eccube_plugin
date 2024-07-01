<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Message;

/**
 * Trait for Result
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait ResultTrait
{

    /**
     * Result
     *
     * @var ?string $result
     */
    protected ?string $result = null;

    /**
     * {@inheritDoc}
     */
    public function getResult(): ?string
    {
        return $this->result;
    }

    /**
     * {@inheritDoc}
     */
    public function setResult(?string $result)
    {
        $this->result = $result;
        return $this;
    }

}