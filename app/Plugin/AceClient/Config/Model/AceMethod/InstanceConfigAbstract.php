<?php

namespace Plugin\AceClient\Config\Model\AceMethod;

use Symfony\Component\Serializer\Annotation\SerializedName;


class InstanceConfigAbstract
{
    /**
     * @var ?string $className Class Name
     */
    #[SerializedName("class_name")]
    protected ?string $className;  
    
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
        $this->className = $className;
    }

}