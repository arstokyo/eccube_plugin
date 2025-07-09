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

namespace Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart;

use Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyumei;
use Plugin\AceClient43\AceServices\Model\Dependency\Zaiko;

/**
 * Model for Jyumei
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class JyumeiModel extends Jyumei\JyumeiModelGroup2 implements JyumeiModelInterface
{
    use Jyumei\JyumeiModelGroup3Trait;
    use Zaiko\ZaikoTrait;
    use Zaiko\IgnoreZaikoTrait;

    private $supportSpid = [];

    private $supportProvider = [];

    private $supportSpidQty = [];

    private $supportSummary = [];

    private $itemType = '';

    public function setSupportSpid(string $supportSpid): void
    {
        $this->supportSpid = $supportSpid === '' ? [] : explode(',', $supportSpid);
    }

    public function getSupportSpid(): array
    {
        return $this->supportSpid;
    }

    public function setSupportProvider(string $supportProvider): void
    {
        $this->supportProvider = $supportProvider === '' ? [] : explode(',', $supportProvider);
    }

    public function getSupportProvider(): array
    {
        return $this->supportProvider;
    }

    public function setSupportSpidQty(string $supportSpidQty): void
    {
        $result = [];

        if ($supportSpidQty !== '') {
            foreach (explode(',', $supportSpidQty) as $item) {
                $parts = explode(':', $item, 2);
                $spid = isset($parts[0]) ? $parts[0] : null;
                $qty = isset($parts[1]) ? $parts[1] : null;
                if ($spid !== null && $qty !== null) {
                    $result[$spid] = (int) $qty;
                }
            }
        }

        $this->supportSpidQty = $result;
    }

    public function getSupportSpidQty(): array
    {
        return $this->supportSpidQty;
    }

    public function setSupportSummary(string $supportSummary): void
    {
        $result = [];

        if ($supportSummary !== '') {
            foreach (explode(',', $supportSummary) as $item) {
                $parts = explode(':', $item);
                if (count($parts) === 3) {
                    $spid = $parts[0];
                    $providers = $parts[1];
                    $qty = $parts[2];
                    $providerArr = [];
                    if ($providers !== null && $providers !== '') {
                        $providerArr = array_filter(explode(',', $providers), function ($v) {
                            return $v !== '' && $v !== null && $v !== 'null';
                        });
                    }
                    $result[] = [
                        'spid' => $spid,
                        'providers' => $providerArr,
                        'qty' => (int) $qty,
                    ];
                }
            }
        }

        $this->supportSummary = $result;
    }

    public function getSupportSummary(): array
    {
        return $this->supportSummary;
    }

    public function setItemType(string $itemType): void
    {
        $this->itemType = $itemType;
    }

    public function getItemType(): string
    {
        return $this->itemType;
    }
}
