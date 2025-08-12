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

namespace Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\AceServices\Model\Response;
use Symfony\Component\Serializer\Attribute\Ignore;

/**
 * Interface for OrderModel.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface OrderModelInterface extends HasMessageModelInterface, Response\AsListDenormalizableInterface
{
    /**
     * Get Jyusub
     *
     * @return JyusubModelInterface|null
     */
    public function getJyusub(): ?JyusubModelInterface;

    /**
     * Set jyusub
     *
     * @param JyusubModel|null $jyusub
     *
     * @return void
     */
    public function setJyusub(?JyusubModel $jyusub): void;

    /**
     * Get Jyuden
     *
     * @return JyudenModelInterface|null
     */
    public function getJyuden(): ?JyudenModelInterface;

    /**
     * Set Jyuden
     *
     * @param JyudenModel|null $jyuden
     *
     * @return void
     */
    public function setJyuden(?JyudenModel $jyuden): void;

    /**
     * Get Jyumei
     *
     * @return JyumeiModelInterface[]|null
     */
    public function getJyumei(): ?array;

    /**
     * Set Jyumei
     *
     * @param JyumeiModel[]|null $jyumei
     *
     * @return void
     */
    public function setJyumei(?array $jyumei): void;

    /**
     * Get MailJyuden
     *
     * @return MailJyudenModel|null
     */
    public function getMailJyuden(): ?MailJyudenModel;

    /**
     * Set MailJyuden
     *
     * @param MailJyudenModel|null $mailJyuden
     *
     * @return void
     */
    public function setMailJyuden(?MailJyudenModel $mailJyuden): void;

    /**
     * Get Point
     *
     * @return PointModel|null
     */
    public function getPoint(): ?PointModel;

    /**
     * Set Point
     *
     * @param PointModel|null $point
     *
     * @return void
     */
    public function setPoint(?PointModel $point): void;

    /**
     * 受注サポート行（support）を取得
     *
     * @return SupportModel[]|null
     */
    public function getSupport(): ?array;

    /**
     * 受注サポート行（support）を設定
     *
     * @param SupportModel[]|null $support
     *
     * @return void
     */
    public function setSupport(array $support): void;

    /**
     * ユーザーが獲得可能なポイント数を取得します。
     *
     * @Ignore()
     *
     * @return float|null 獲得可能なポイント数（小数点を含む場合あり）、またはnull
     */
    public function getEarnablePoints(): ?float;
}
