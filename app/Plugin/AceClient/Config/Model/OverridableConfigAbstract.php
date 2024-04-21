<?php

namespace Plugin\AceClient\Config\Model;

use Plugin\AceClient\Utils\Denormalize\DTO\ADTAODenormalizerTrait;

/**
 * Abstract Class for Overridable Config
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
abstract class OverridableConfigAbstract implements OverridableConfigInterface
{
    use ADTAODenormalizerTrait;
    /**
     * Default Format
     * 
     * @var ConfigModelInterface $default
     */
    protected ConfigModelInterface $default;

    /**
     * Overrides Format
     * 
     * @var ?array $overrides
     */
    protected ?array $overrides;

    /**
     * Get the value of default
     * 
     * @return ConfigModelInterface
     */
    public function getDefaultConfig(): ConfigModelInterface
    {
        return $this->default;
    }

    /**
     * Set the value of default
     *
     * @param array $default
     * 
     * @return  void
     */
    public function setDefault(array $default): void
    {
        $this->default = $this->denormalizeDTO($default, $this->setChildConfigClassName());
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
     * @param array|null $overrides
     * 
     * @return void
     */
    public function setOverrides(array|null $overrides): void
    {
        $this->overrides = $overrides ? $this->denormalizeADTAO($overrides, $this->setChildConfigClassName()) : [];
    }

    /**
     * Get the specific override for the config
     *
     * @return ?ConfigModelInterface
     */
    public function getSpecificOverride(string $target): ?ConfigModelInterface
    {
        if (isset($this->overrides)) {
            foreach ($this->overrides as $key => $value) {
                if (is_array($value) && array_key_exists($target, $value)) {
                    return $value[$target];
                }
            }
        }
        return null;
    }

    abstract protected function setChildConfigClassName(): string; 

}