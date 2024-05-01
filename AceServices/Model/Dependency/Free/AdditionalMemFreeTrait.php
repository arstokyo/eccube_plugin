<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

class  AdditionalMemFreeTrait implements AdditionalMemFreeInterface
{
  
    /** @var ?string $freeOrderMail1 注文確認ﾒｰﾙｱﾄﾞﾚｽ1 */
    protected ?string $freeOrderMail1 = null; 

    /** @var ?string $freeOrderMail2 注文確認ﾒｰﾙｱﾄﾞﾚｽ2 */
    protected ?string $freeOrderMail2 = null;

    /** @var ?string $freeOrderMail3 注文確認ﾒｰﾙｱﾄﾞﾚｽ3 */
    protected ?string $freeOrderMail3 = null;

    /** @var ?string $freeOrderMail4 注文確認ﾒｰﾙｱﾄﾞﾚｽ4 */
    protected ?string $freeOrderMail4 = null;

    /** @var ?string $freeOrderMail5 注文確認ﾒｰﾙｱﾄﾞﾚｽ5 */
    protected ?string $freeOrderMail5 = null;

    /** @var ?string $freeShukaMail1 出荷報告ﾒｰﾙｱﾄﾞﾚｽ1 */
    protected ?string $freeShukaMail1 = null;

    /** @var ?string $freeShukaMail2 出荷報告ﾒｰﾙｱﾄﾞﾚｽ2 */
    protected ?string $freeShukaMail2 = null;

    /** @var ?string $freeShukaMail3 出荷報告ﾒｰﾙｱﾄﾞﾚｽ3 */
    protected ?string $freeShukaMail3 = null;

    /** @var ?string $freeShukaMail4 出荷報告ﾒｰﾙｱﾄﾞﾚｽ4 */
    protected ?string $freeShukaMail4 = null;

    /** @var ?string $freeShukaMail5 出荷報告ﾒｰﾙｱﾄﾞﾚｽ5 */
    protected ?string $freeShukaMail5 = null;

    /** @var ?string $freeSeikyuMail1 請求明細ﾒｰﾙｱﾄﾞﾚｽ1 */
    protected ?string $freeSeikyuMail1 = null;

    /** @var ?string $freeSeikyuMail2 請求明細ﾒｰﾙｱﾄﾞﾚｽ2 */
    protected ?string $freeSeikyuMail2 = null;

    /** @var ?string $freeSeikyuMail3 請求明細ﾒｰﾙｱﾄﾞﾚｽ3 */
    protected ?string $freeSeikyuMail3 = null;

    /** @var ?string $freeSeikyuMail4 請求明細ﾒｰﾙｱﾄﾞﾚｽ4 */
    protected ?string $freeSeikyuMail4 = null;

    /** @var ?string $freeSeikyuMail5 請求明細ﾒｰﾙｱﾄﾞﾚｽ5 */
    protected ?string $freeSeikyuMail5 = null;

    /** @var ?string $freeShouHinMail1 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ1 */
    protected ?string $freeShouHinMail1 = null;

    /** @var ?string $freeShouHinMail2 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ2 */
    protected ?string $freeShouHinMail2 = null;

    /** @var ?string $freeShouHinMail3 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ3 */
    protected ?string $freeShouHinMail3 = null;

    /** @var ?string $freeShouHinMail4 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ4 */
    protected ?string $freeShouHinMail4 = null;

    /** @var ?string $freeShouHinMail5 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ5 */
    protected ?string $freeShouHinMail5 = null;

    /** @var ?string $freedenshiMail1 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ1 */
    protected ?string $freedenshiMail1 = null;

    /** @var ?string $freedenshiMail2 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ2 */
    protected ?string $freedenshiMail2 = null;

    /** @var ?string $freedenshiMail3 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ3 */
    protected ?string $freedenshiMail3 = null;

    /** @var ?string $freedenshiMail4 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ4 */
    protected ?string $freedenshiMail4 = null;

    /** @var ?string $freedenshiMail5 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ5 */
    protected ?string $freedenshiMail5 = null;

    /** @var ?string $freeshoukaiShamemo 紹介者顧客メモ */
    protected ?string $freeshoukaiShamemo = null;

    /** @var ?int $freeIkomoto 移行元 */
    protected ?int $freeIkomoto = null;

    /** @var ?string $freeDaihyouShasei 代表者姓 */
    protected ?string $freeDaihyouShasei = null;

    /** @var ?string $freeDaihyoShamei 代表者名 */
    protected ?string $freeDaihyoShamei = null;

    /** @var ?string $freeDaihyoShaseiFuri 代表者姓カナ */
    protected ?string $freeDaihyoShaseiFuri = null;

    
    /**
     * {@inheritDoc}
     */
    public function setDenshiMail3(?string $denshiMail3): self
    {
        $this->denshiMail3 = $denshiMail3;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDenshiMail4(): ?string
    {
        return $this->denshiMail4;
    }

    /**
     * {@inheritDoc}
     */
    public function setDenshiMail4(?string $denshiMail4): self
    {
        $this->denshiMail4 = $denshiMail4;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDenshiMail5(): ?string
    {
        return $this->denshiMail5;
    }

    /**
     * {@inheritDoc}
     */
    public function setDenshiMail5(?string $denshiMail5): self
    {
        $this->denshiMail5 = $denshiMail5;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getShoukaiShamemo(): ?string
    {
        return $this->shoukaiShamemo;
    }

    /**
     * {@inheritDoc}
     */
    public function setShoukaiShamemo(?string $shoukaiShamemo): self
    {
        $this->shoukaiShamemo = $shoukaiShamemo;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeIkomoto(?int $fIkomoto): self
    {
        $this->freeIkomoto = $fIkomoto;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreeIkomoto(): ?int
    {
        return $this->freeIkomoto;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreeDaihyouShasei(): ?string
    {
        return $this->freeDaihyouShasei;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeDaihyouShasei(?string $fDaihyouShasei): self
    {
        $this->freeDaihyouShasei = $fDaihyouShasei;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreeDaihyoShamei(): ?string
    {
        return $this->freeDaihyoShamei;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeDaihyoShamei(?string $fDaihyoShamei): self
    {
        $this->freeDaihyoShamei = $fDaihyoShamei;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreeDaihyoShaseiFuri(): ?string
    {
        return $this->freeDaihyoShaseiFuri;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeDaihyoShaseiFuri(?string $fDaihyoShaseiFuri): self
    {
        $this->freeDaihyoShaseiFuri = $fDaihyoShaseiFuri;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setDenshiMail4(?string $denshiMail4): self
    {
        $this->denshiMail4 = $denshiMail4;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDenshiMail5(): ?string
    {
        return $this->denshiMail5;
    }

    /**
     * {@inheritDoc}
     */
    public function setDenshiMail5(?string $denshiMail5): self
    {
        $this->denshiMail5 = $denshiMail5;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getShoukaiShamemo(): ?string
    {
        return $this->shoukaiShamemo;
    }

    /**
     * {@inheritDoc}
     */
    public function setShoukaiShamemo(?string $shoukaiShamemo): self
    {
        $this->shoukaiShamemo = $shoukaiShamemo;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDenshiMail5(): ?string
    { 
        return $this->denshiMail5;
    }

    
    /**
     * {@inheritDoc}
     */
    public function setDenshiMail5(?string $denshiMail5): self;

    /**
     * Get 紹介者顧客メモ
     * 
     * @return ?string
     */
    public function getShoukaiShamemo(): ?string;

    /**
     * Set 紹介者顧客メモ
     * 
     * @param ?string $shoukaiShamemo
     * @return self
     */
    public function setShoukaiShamemo(?string $shoukaiShamemo): self;



    /**
     * Set 移行元
     * 
     * @return ?int
     */
    public function setFreeIkomoto(?int $fIkomoto): self;

    /**
     * Get 移行元
     * 
     * @param ?string $fIkomoto
     * @return ?int
     */
    public function getFreeIkomoto(): ?int;

    /**
     * Set 代表者姓
     * 
     * @return ?string
     */
    public function getFreeDaihyouShasei(): ?string;

    /**
     * Set 代表者姓
     * 
     * @param ?string $fDaihyouShasei
     * @return ?string
     */
    public function setFreeDaihyouShasei(?string $fDaihyouShasei): self;

    /**
     * Get 代表者名
     *
     * @return ?string
     */
    public function getFreeDaihyoShamei(): ?string;

    /**
     * Set 代表者名
     *
     * @param ?string $fDaihyoShamei
     * @return self
     */
    public function setFreeDaihyoShamei(?string $fDaihyoShamei): self;

    /**
     * Get 代表者姓カナ
     *
     * @return ?string
     */
    public function getFreeDaihyoShaseiFuri(): ?string;

    /**
     * Set 代表者姓カナ
     *
     * @param ?string $fDaihyoShaseiFuri
     * @return self
     */
    public function setFreeDaihyoShaseiFuri(?string $fDaihyoShaseiFuri): self;

    /**
     * Get 代表者名カナ
     *
     * @return ?string
     */
    public function getFreeDaihyoShameiFuri(): ?string;




    /**
     * Set 代表者名カナ
     *
     * @param ?string $fDaihyoShameiFuri
     * @return self
     */
    public function setFreeDaihyoShameiFuri(?string $fDaihyoShameiFuri): self;

    /**
     * Get 代表者郵便番号
     *
     * @return ?string
     */
    public function getFreeYubinBango(): ?string;

    /**
     * Set 代表者郵便番号
     *
     * @param ?string $fYubinBango
     * @return self
     */
    public function setFreeYubinBango(?string $fYubinBango): self;

    /**
     * Get 代表者都道府県
     *
     * @return ?string
     */
    public function getFreeToDoFuken(): ?string;

    /**
     * Set 代表者都道府県
     *
     * @param ?string $fToDoFuken
     * @return self
     */
    public function setFreeToDoFuken(?string $fToDoFuken): self;




    /**
     * Get 代表者市区町村
     *
     * @return ?string
     */
    public function getFreeShikuchouso(): ?string;

    /**
     * Set 代表者市区町村
     *
     * @param ?string $fShikuchouso
     * @return self
     */
    public function setFreeShikuchouso(?string $fShikuchouso): self;

    /**
     * Get 代表者町名番地
     *
     * @return ?string
     */
    public function getFreeChomeibanchi(): ?string;

    /**
     * Set 代表者町名番地
     *
     * @param ?string $fChomeibanchi
     * @return self
     */
    public function setFreeChomeibanchi(?string $fChomeibanchi): self;

    /**
     * Get 代表者建物名
     *
     * @return ?string
     */
    public function getFreeTatemonomei(): ?string;

    /**
     * Set 代表者建物名
     *
     * @param ?string $fTatemonomei
     * @return self
     */
    public function setFreeTatemonomei(?string $fTatemonomei): self;




    /**
     * Get 代表者会社名
     *
     * @return ?string
     */
    public function getFreeKaishamei(): ?string;

    /**
     * Set 代表者会社名
     *
     * @param ?string $fKaishamei
     * @return self
     */
    public function setFreeKaishamei(?string $fKaishamei): self;

    /**
     * Get 代表者お届先名称
     *
     * @return ?string
     */
    public function getFreeTodokesaki(): ?string;

    /**
     * Set 代表者お届先名称
     *
     * @param ?string $fTodokesaki
     * @return self
     */
    public function setFreeTodokesaki(?string $fTodokesaki): self;

    /**
     * Get FAX
     *
     * @return ?string
     */
    public function getFreeFax(): ?string;

    /**
     * Set FAX
     *
     * @param ?string $fFax
     * @return self
     */
    public function setFreeFax(?string $fFax): self;

    /**
     * 
     * 
     * 
     * Get 定休日
     *
     * @return ?string
     */
    public function getFreeTeikyubi(): ?string;

    /**
     * Set 定休日
     *
     * @param ?string $fTeikyubi
     * @return self
     */
    public function setFreeTeikyubi(?string $fTeikyubi): self;

    /**
     * Get DM送付後説明
     *
     * @return ?int
     */
    public function getFreeDmsOfukbn(): ?int;

    /**
     * Set DM送付後説明
     *
     * @param ?int $fDmsOfukbn
     * @return self
     */
    public function setFreeDmsOfukbn(?int $fDmsOfukbn): self;

    /**
     * Get ｴﾝﾄﾞﾕｰｻﾞｰ店舗案内
     *
     * @return ?int
     */
    public function getFreeEndUserKbn(): ?int;

    /**
     * Set ｴﾝﾄﾞﾕｰｻﾞｰ店舗案内
     *
     * @param ?int $fEndUserKbn
     * @return self
     */
    public function setFreeEndUserKbn(?int $fEndUserKbn): self;

    /**
     * Get 反社チェック
     *
     * @return ?int
     */
    public function getFree        $this->freedenwabango1 = $freedenwabango1;
        return $this;Hanshakbn(
        
    ): ?i
    {}t;

    /**
     * Set 反社チェック
     *
     * @param ?int $fHanshakbn
     * @return self
     */
    public function setFreeHanshakbn(?int $fHanshakbn): self;

    /**
     * Get 取引区分  
     *
     * @return ?int
     */
    public function getThflg(): ?int;

    /**
     * Set 取引区分  
     *
     * @param ?int $thflg
     * @return self
     */
    public function setThflg(?int $thflg): self;

    /**
     * Get 代表者電話番号1
     *
     * @return ?string
     */
    public function setFreedenwabango1(?string $freedenwabango1): self;

    /**
     * Set 代表者電話番号1
     *
     * @param ?string $freedenwabango1
     * @return ?string
     */
    public function getFreedenwabango1(): ?string;

    /**
     * Get 代表者電話番号2
     *
     * @return ?string
     */
    public function getFreedenwabango2(): ?string;

    /**
     * Set 代表者電話番号2
     *
     * @param ?string $freedenwabango2
     * @return self
     */
    public function setFreedenwabango2(?string $freedenwabango2): self;

    /**
     * Get 代表者電話番号3
     *
     * @return ?string
     */
    public function getFreedenwabango3(): ?string;

    /**
     * Set 代表者電話番号3
     *
     * @param ?string $freedenwabango3
     * @return self
     */
    public function setFreedenwabango3(?string $freedenwabango3): self;


}