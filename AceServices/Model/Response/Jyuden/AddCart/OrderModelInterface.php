<?php

namespace Plugin\AceClient\AceServices\Model\Response\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient\AceServices\Model\Response;

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
     * @return Response\Jyuden\AddCart\JyusubModelInterface|null
     */
    public function getJyusub(): ?JyusubModelInterface;

    /**
     * Set jyusub
     * 
     * @param Response\Jyuden\AddCart\JyusubModel|null $jyusub
     * @return void
     */
    public function setJyusub(?JyusubModel $jyusub): void;

    /**
     * Get Jyuden
     * 
     * @return Response\Jyuden\AddCart\JyudenModelInterface|null
     */
    public function getJyuden(): ?JyudenModelInterface;

    /**
     * Set Jyuden
     * 
     * @param Response\Jyuden\AddCart\JyudenModel|null $jyuden
     * @return void
     */
    public function setJyuden(?JyudenModel $jyuden): void;

    /**
     * Get Jyumei
     * 
     * @return Response\Jyuden\AddCart\JyumeiModelInterface[]|null
     */
    public function getJyumei(): ?array;

    /**
     * Set Jyumei
     * 
     * @param Response\Jyuden\AddCart\JyumeiModel[]|null $jyumei
     * @return void
     */
    public function setJyumei(?array $jyumei): void;

    /**
     * Get MailJyuden
     * 
     * @return Response\Jyuden\AddCart\MailJyudenModel|null
     */
    public function getMailJyuden(): ?MailJyudenModel;

    /**
     * Set MailJyuden
     * 
     * @param Response\Jyuden\AddCart\MailJyudenModel|null $mailJyuden
     * @return void
     */
    public function setMailJyuden(?MailJyudenModel $mailJyuden): void;

    /**
     * Get Point
     * 
     * @return Response\Jyuden\AddCart\PointModel|null
     */
    public function getPoint(): ?PointModel;

    /**
     * Set Point
     * 
     * @param Response\Jyuden\AddCart\PointModel|null $point
     * @return void
     */
    public function setPoint(?PointModel $point): void;

}