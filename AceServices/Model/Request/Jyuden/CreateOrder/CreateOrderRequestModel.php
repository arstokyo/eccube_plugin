<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Jyuden\CreateOrder;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\OrderPrmModel;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\OrderPrmModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\DecisionCart\OptionsModel as DecisionOptionsModel;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\DecisionCart\OptionsModelInterface as DecisionOptionsModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * 統合注文作成用リクエストモデル
 *
 * AddCart の prm（受注情報）を流用しつつ、DecisionCart のオプションのみを分離して保持します。
 * 既存の DecisionCart 用 OptionsModel をそのまま再利用します。
 */
class CreateOrderRequestModel extends RequestModelAbstract implements CreateOrderRequestModelInterface
{
    use NoCategory\IdTrait;
    use NoCategory\SessIdTrait;

    /** @var ?OrderPrmModel AddCart 相当の受注情報（必須） */
    private ?OrderPrmModel $prm = null;

    /** @var ?DecisionOptionsModel DecisionCart 用オプション（任意） */
    private ?DecisionOptionsModel $decisionOptions = null;

    public const XML_NODE_NAME = 'createOrder';

    /**
     * AddCart 相当の受注情報を設定します。
     */
    public function setPrm(OrderPrmModel $prm): self
    {
        $this->prm = $prm;

        return $this;
    }

    /**
     * AddCart 相当の受注情報を取得します。
     */
    public function getPrm(): OrderPrmModelInterface
    {
        return $this->prm;
    }

    /**
     * DecisionCart 用オプションを設定します（既存の OptionsModel を再利用）。
     */
    public function setDecisionOptions(DecisionOptionsModel $decisionOptions): self
    {
        $this->decisionOptions = $decisionOptions;

        return $this;
    }

    /**
     * DecisionCart 用オプションを取得します。
     */
    public function getDecisionOptions(): ?DecisionOptionsModelInterface
    {
        return $this->decisionOptions;
    }

    /**
     * 必須パラメータの検証を行います。
     */
    public function ensureParameterNotMissing(): void
    {
        if (empty($this->id)) {
            throw new MissingRequestParameterException($this->compilePropertyName('id'));
        }
        if (empty($this->sessId)) {
            throw new MissingRequestParameterException($this->compilePropertyName('sessId'));
        }
        if (empty($this->prm)) {
            throw new MissingRequestParameterException($this->compilePropertyName('prm'));
        }
        $this->prm->ensureParameterNotMissing();
    }

    /**
     * ルート要素名を返します。
     */
    public function fetchRequestNodeName(): string
    {
        return self::XML_NODE_NAME;
    }
}
