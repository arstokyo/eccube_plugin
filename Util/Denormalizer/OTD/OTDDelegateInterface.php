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

namespace Plugin\AceClient43\Util\Denormalizer\OTD;

use Symfony\Component\Serializer\SerializerInterface;

/**
 * Delegate Interface for Object To Data.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface OTDDelegateInterface
{
    /**
     * Get Object
     *
     * @return object
     */
    public function getObject(): object;

    /**
     * Get Denormalize Options
     *
     * @return ?array
     */
    public function getDenomarlizeOptions(): ?array;

    /**
     * Get Serializer
     *
     * @return ?SerializerInterface
     */
    public function getSerializer(): ?SerializerInterface;

    /**
     * Set Serializer
     *
     * @param SerializerInterface $serializer
     *
     * @return void
     */
    public function setSerializer(SerializerInterface $serializer): void;
}
