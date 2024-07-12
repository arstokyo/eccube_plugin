<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Jyuden\GetDeliveryInfo;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;

/**
 * Class GetDeliveryInfoRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetDeliveryInfoRequestModel extends RequestModelAbstract implements GetDeliveryInfoRequestModelInterface
{
    use NoCategory\IdTrait,
        Day\ExecDateFromTrait,
        Day\ExecDateToTrait;

    const XML_NODE_NAME = 'getDeliveryInfo';

    /**
     * {@inheritDoc}
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (empty($this->id)) { throw new MissingRequestParameterException($this->compilePropertyName('id')); };
    }
}
