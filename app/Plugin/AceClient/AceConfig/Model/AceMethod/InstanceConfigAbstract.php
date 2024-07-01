<?php

namespace Plugin\AceClient\AceConfig\Model\AceMethod;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Plugin\AceClient\Util\ConfigLoader\ConvertToConstTrait;

/**
 * InstanceConfigAbstract
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class InstanceConfigAbstract
{
    use ConvertToConstTrait;

    /**
     * @var ?string $className Class Name
     */
    #[SerializedName("class_name")]
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