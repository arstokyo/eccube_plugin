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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetId;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Class IdModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class IdModel implements IdModelInterface
{
    use NoCategory\IdTrait;
    /** @var ?string ID名 */
    protected ?string $idName = null;

    /**
     * {@inheritDoc}
     */
    public function getIdName(): ?string
    {
        return $this->idName;
    }

    /**
     * {@inheritDoc}
     */
    public function setIdName(?string $idName)
    {
        $this->idName = $idName;

        return $this;
    }
}
