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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Person;

use Plugin\AceClient43\AceServices\Model\Request\Member\UpdateTaikai\UpdateTaikaiRequestModelInterface;

/**
 * Trait for Person Level 6 Extract
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait PersonLevel6ExtractTrait
{
    use PersonLevel5ExtractTrait;
    use PersonLevel6Trait;

    /**
     *  入会中
     */
    public function isActiveMember(): bool
    {
        return $this->getTaikai() == UpdateTaikaiRequestModelInterface::TAIKAI_ACTIVE;
    }

    public function hasUserId(): bool
    {
        return !empty($this->getUserId());
    }

    public function resolveEmail(): ?string
    {
        $userId = $this->getUserid();

        if (!empty($userId) && filter_var($userId, FILTER_VALIDATE_EMAIL)) {
            return $userId;
        }

        return !empty($this->getMail()) ? $this->getMail() : ($this->getMail1() ?: null);
    }
}
