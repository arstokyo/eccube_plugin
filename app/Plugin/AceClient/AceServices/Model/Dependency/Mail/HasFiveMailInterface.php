<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Mail;

/**
 * Interface For Mail 
 * 
 * @Target : Plugin\AceClient\AceServices\Model\Dependency\Person
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasFiveMailInterface
{
    /**
     * Get Mail 1
     * 
     * @return ?string
     */
    public function getMail1(): ?string;

    /**
     * Set Mail 1
     * 
     * @param ?string $mail1
     * @return self
     */
    public function setMail1(?string $mail1): self;

    /**
     * Get Mail 2
     * 
     * @return ?string
     */
    public function getMail2(): ?string;

    /**
     * Set Mail 2
     * 
     * @param ?string $mail2
     * @return self
     */
    public function setMail2(?string $mail2): self;

    /**
     * Get Mail 3
     * 
     * @return ?string
     */
    public function getMail3(): ?string;

    /**
     * Set Mail 3
     * 
     * @param ?string $mail3
     * @return self
     */
    public function setMail3(?string $mail3): self;

    /**
     * Get Mail 4
     * 
     * @return ?string
     */
    public function getMail4(): ?string;

    /**
     * Set Mail 4
     * 
     * @param ?string $mail4
     * @return self
     */
    public function setMail4(?string $mail4): self;

    /**
     * Get Mail 5
     * 
     * @return ?string
     */
    public function getMail5(): ?string;

    /**
     * Set Mail 5
     * 
     * @param ?string $mail5
     * @return self
     */
    public function setMail5(?string $mail5): self;
}