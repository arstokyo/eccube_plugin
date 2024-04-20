<?php

namespace Plugin\AceClient\Config\Model;

use Plugin\AceClient\Utils\Denormalize\ADTAODenormalizerTrait;

class PrmOTDFormatModel implements ConfigModelInterface
{
    use ADTAODenormalizerTrait;
    /**
     * Default Format
     * 
     * @var PrmDetailFormatModel $default
     */
    private PrmDetailFormatModel $default;

    /**
     * Overrides Format
     * 
     * @var ?array $overrides
     */
    private ?array $overrides;

    /**
     * Get the value of default
     * 
     * @return PrmDetailFormatModel
     */
    public function getDefault(): PrmDetailFormatModel
    {
        return $this->default;
    }

    /**
     * Set the value of default
     *
     * @return  void
     */
    public function setDefault(array $default): void
    {
        $this->default = $this->denormalizeDTO($default, PrmDetailFormatModel::class);
    }

    /**
     * Get the value of overrides
     * 
     * @return ?array
     */
    public function getOverrides(): ?array
    {
        return $this->overrides;
    }

    /**
     * Set the value of overrides
     *
     * @param ?array $overrides
     * 
     * @return void
     */
    public function setOverrides(?array $overrides): void
    {
        $this->overrides = $this->denormalizeADTAO($overrides, PrmDetailFormatModel::class);
    }

    /**
     * Get a specific override value
     * 
     * @param string $classNameFQD
     * 
     * @return ?PrmDetailFormatModel
     */
    public function getSpecificOverride(string $classNameFQD): ?PrmDetailFormatModel
    {
        foreach ($this->overrides as $key => $value) {
            if (is_array($value) && array_key_exists($classNameFQD, $value)) {
                return $value[$classNameFQD];
            }
        }
        return null;
    }

}