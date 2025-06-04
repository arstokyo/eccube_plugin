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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetRirekiDetail;

use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Class GetRirekiDetailRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetRirekiDetailRequestModel extends RequestModelAbstract implements GetRirekiDetailRequestModelInterface
{
    use NoCategory\IdTrait;
    use NoCategory\McodeTrait;
    use Denpyo\DennoTrait;
    use Denpyo\DenkuTrait;

    public const XML_NODE_NAME = 'getRirekiDetail';

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (!$this->id) {
            throw new MissingRequestParameterException($this->compilePropertyName('id'));
        }
        if (!$this->mcode) {
            throw new MissingRequestParameterException($this->compilePropertyName('mcode'));
        }
        if (!$this->denno) {
            throw new MissingRequestParameterException($this->compilePropertyName('denno'));
        }
        if ($this->denku === null) {
            throw new MissingRequestParameterException($this->compilePropertyName('denku'));
        }
    }

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}
