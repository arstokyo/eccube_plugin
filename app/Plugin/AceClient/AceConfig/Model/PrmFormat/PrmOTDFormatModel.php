<?php

namespace Plugin\AceClient43\AceConfig\Model\PrmFormat;

use Plugin\AceClient43\AceConfig\Model\ConfigModelInterface;
use Plugin\AceClient43\AceConfig\Model\OverridableConfigAbstract;

/**
 * Model for Prm OTD Format
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class PrmOTDFormatModel extends OverridableConfigAbstract implements ConfigModelInterface
{

    /**
     * @return PrmDetailFormatModel
     */
    public function getDefaultConfig(): ConfigModelInterface
    {
        return parent::getDefaultConfig();
    }

    /**
     * @return ?PrmDetailFormatModel
     */
    public function getSpecificOverride(string $classNameFQD): ?ConfigModelInterface
    {
        return parent::getSpecificOverride($classNameFQD);
    }

    /**
     * {@inheritDoc}
     */
    protected function setDetailConfigClassName(): string
    {
        return PrmDetailFormatModel::class;
    }

    /**
     * Perform Override Config
     * 
     * @param PrmDetailFormatModel $overrideConfig
     * 
     * @return PrmDetailFormatModel
     */
    protected function performOverrideConfig(ConfigModelInterface $overrideConfig): ConfigModelInterface
    {
        $result = new PrmDetailFormatModel;
        
        if ($overrideConfig->getFormat())
        {
            $result->setFormat($overrideConfig->getFormat());
        } else {
            $result->setFormat($this->getDefaultConfig()->getFormat());
        }

        if ($overrideConfig->getOptions())
        {
            $result->setOptions($overrideConfig->getOptions());
        } elseif ($overrideConfig->getFormat() === $this->getDefaultConfig()->getFormat()) {
            $result->setOptions($this->getDefaultConfig()->getOptions());
        }
        
        return $result;
    }

}