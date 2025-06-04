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

namespace Plugin\AceClient43\AceConfig\Model\AceMethod;

use Plugin\AceClient43\Util\ConfigLoader\ConvertToConstTrait;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * InstanceConfigAbstract
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class InstanceConfigAbstract
{
    use ConvertToConstTrait;

    /**
     * @var ?string Class Name
     */
    /** @SerializedName("class_name") */
    protected ?string $className = null;

    /**
     * Get the class name.
     *
     * @return ?string
     */
    public function getClassName(): ?string
    {
        return $this->className;
    }

    /**
     * Set the class name.
     *
     * @param ?string $className
     *
     * @return void
     */
    public function setClassName(?string $className): void
    {
        if (\defined($className)) {
            $className = $this->convertVarToStringConst($className);
        }
        $this->className = $className;
    }
}
