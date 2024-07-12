<?php

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
     * @return Response\Jyuden\DecisionCart\JyusubModelInterface|null
     */
    public function getJyusub(): ?JyusubModelInterface;

    /**
     * Set Jyusub
     * 
     * @param Response\Jyuden\DecisionCart\JyusubModel|null $jyusub
     */
    public function setJyusub(?JyusubModel $jyusub): void;

    /**
     * Get Jyuden
     * 
     * @return Response\Jyuden\DecisionCart\JyudenModelInterface|null
     */
    public function getJyuden(): ?JyudenModelInterface;

    /**
     * Set Jyuden
     * 
     * @param Response\Jyuden\DecisionCart\JyudenModel|null $jyuden
     */
    public function setJyuden(?JyudenModel $jyuden): void;

    /**
     * Get Jyumei
     * 
     * @return Response\Jyuden\DecisionCart\JyumeiModelInterface[]|null
     */
    public function getJyumei(): ?array;

    /**
     * Set Jyumei
     * 
     * @param Response\Jyuden\DecisionCart\JyumeiModel[]|null $jyumei
     */
    public function setJyumei(?array $jyumei): void;

    /**
     * Get Point
     * 
     * @return Response\Jyuden\DecisionCart\PointModel|null
     */
    public function getPoint(): ?PointModel;

    /**
     * Set Point
     * 
     * @param Response\Jyuden\DecisionCart\PointModel|null $point
     */
    public function setPoint(?PointModel $point): void;

    /**
     * Get MailJyuden
     * 
     * @return Response\Jyuden\DecisionCart\MailJyudenModel|null
     */
    public function getMailJyuden(): ?MailJyudenModel;

    /**
     * Set MailJyuden
     * 
     * @param Response\Jyuden\DecisionCart\MailJyudenModel|null $mailJyuden
     */
    public function setMailJyuden(?MailJyudenModel $mailJyuden): void;

}