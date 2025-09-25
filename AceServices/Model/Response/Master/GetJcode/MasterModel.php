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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetJcode;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class MasterModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MasterModel implements MasterModelInterface
{
    use HasMessageModelTrait;
    /**
     * Jcode
     *
     * @var JcodeModel[]|null
     */
    protected ?array $jcode = null;

    /**
     * {@inheritDoc}
     */
    public function getJcode(): ?array
    {
        return $this->jcode;
    }

    /**
     * {@inheritDoc}
     */
    public function setJcode(?array $jcode): void
    {
        $this->jcode = $jcode;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
            'jcode' => JcodeModel::class,
        ];
    }
}
