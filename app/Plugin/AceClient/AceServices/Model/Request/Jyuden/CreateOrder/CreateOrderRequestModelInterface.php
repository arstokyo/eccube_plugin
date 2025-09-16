<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Jyuden\CreateOrder;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\OrderPrmModel;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\OrderPrmModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\DecisionCart\OptionsModel as DecisionOptionsModel;
use Plugin\AceClient43\AceServices\Model\Request\Jyuden\DecisionCart\OptionsModelInterface as DecisionOptionsModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

/**
 * 統合注文作成用リクエストモデルのインターフェース
 *
 * - AddCart 相当の受注情報（prm）を流用
 * - DecisionCart 用オプション（既存 OptionsModel）を別プロパティとして保持
 */
interface CreateOrderRequestModelInterface extends RequestModelInterface, NoCategory\HasIdInterface, NoCategory\HasSessIdInterface
{
    /**
     * AddCart 相当の受注情報を設定
     *
     * @return self
     */
    public function setPrm(OrderPrmModel $prm): self;

    /**
     * AddCart 相当の受注情報を取得
     */
    public function getPrm(): OrderPrmModelInterface;

    /**
     * DecisionCart 用オプションを設定（既存 OptionsModel を利用）
     *
     * @return self
     */
    public function setDecisionOptions(DecisionOptionsModel $decisionOptions): self;

    /**
     * DecisionCart 用オプションを取得
     */
    public function getDecisionOptions(): ?DecisionOptionsModelInterface;
}
