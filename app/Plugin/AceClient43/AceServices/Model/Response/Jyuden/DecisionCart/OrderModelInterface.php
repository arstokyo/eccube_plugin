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

namespace Plugin\AceClient43\AceServices\Model\Response\Jyuden\DecisionCart;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\AceServices\Model\Response;

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
     * Set Jyusub
     *
     * @param JyusubModel|null $jyusub
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
     */
    public function setJyumei(?array $jyumei): void;

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
     */
    public function setPoint(?PointModel $point): void;

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
     */
    public function setMailJyuden(?MailJyudenModel $mailJyuden): void;
}
