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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Bikou;

/**
 * Trait for Three 納品書備考
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait ThreeNotesTrait
{
    /** @var ?string 備考1 */
    protected ?string $note1 = null;
    /** @var ?string 備考2 */
    protected ?string $note2 = null;
    /** @var ?string 備考3 */
    protected ?string $note3 = null;

    /**
     * {@inheritDoc}
     */
    public function getNote1(): ?string
    {
        return $this->note1;
    }

    /**
     * {@inheritDoc}
     */
    public function setNote1(?string $note1)
    {
        $this->note1 = $note1;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getNote2(): ?string
    {
        return $this->note2;
    }

    /**
     * {@inheritDoc}
     */
    public function setNote2(?string $note2)
    {
        $this->note2 = $note2;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getNote3(): ?string
    {
        return $this->note3;
    }

    /**
     * {@inheritDoc}
     */
    public function setNote3(?string $note3)
    {
        $this->note3 = $note3;

        return $this;
    }
}
