<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

/**
 * Interface Additional Mem Free Interface
 * 
 * @Target : Plugin\AceClient\AceServices\Model\Dependency\Person
 */
interface AdditionalMemFreeInterface 
{
    /**
     * Get 注文確認ﾒｰﾙｱﾄﾞﾚｽ1
     * 
     * @return string
     */
    public function getFreeOrderMail1(): string;

    /**
     * Set 注文確認ﾒｰﾙｱﾄﾞﾚｽ1
     * 
     * @param string $fOrderMail1
     * @return self
     */
    public function setFreeOrderMail1(?string $fOrderMail1): self;

    /**
     * Get 注文確認ﾒｰﾙｱﾄﾞﾚｽ2
     * 
     * @return string
     */
    public function getFreeOrderMail2(): string;

    /**
     * Set 注文確認ﾒｰﾙｱﾄﾞﾚｽ2
     * 
     * @param string|null $fOrderMail2
     * @return self
     */
    public function setFreeOrderMail2(?string $fOrderMail2): self;

    /**
     * Get 注文確認ﾒｰﾙｱﾄﾞﾚｽ3
     * 
     * @return string
     */
    public function getFreeOrderMail3(): string;

    /**
     * Set 注文確認ﾒｰﾙｱﾄﾞﾚｽ3
     * 
     * @param string|null $fOrderMail3
     * @return self
     */
    public function setFreeOrderMail3(?string $fOrderMail3): self;

    /**
     * Get 注文確認ﾒｰﾙｱﾄﾞﾚｽ4
     * 
     * @return string
     */
    public function getFreeOrderMail4(): string;

    /**
     * Set 注文確認ﾒｰﾙｱﾄﾞﾚｽ4
     * 
     * @param string|null $fOrderMail4
     * @return self
     */
    public function setFreeOrderMail4(?string $fOrderMail4): self;

    /**
     * Get 注文確認ﾒｰﾙｱﾄﾞﾚｽ5
     * 
     * @return string
     */
    public function getFreeOrderMail5(): string;

    /**
     * Set 注文確認ﾒｰﾙｱﾄﾞﾚｽ5
     * 
     * @param string|null $fOrderMail5
     * @return self
     */
    public function setFreeOrderMail5(?string $fOrderMail5): self;

     /**
     * Get 出荷報告ﾒｰﾙｱﾄﾞﾚｽ1
     * 
     * @return string
     */
    public function getFreeShukaMail1(): string;

    /**
     * Set 出荷報告ﾒｰﾙｱﾄﾞﾚｽ1
     * 
     * @param string $fShukaMail1
     * @return self
     */
    public function setFreeSyukaMail1(?string $fShukaMail1): self;

    /**
     * Get 出荷報告ﾒｰﾙｱﾄﾞﾚｽ2
     * 
     * @return string
     */
    public function getFreeShukaMail2(): string;

    /**
     * Set 出荷報告ﾒｰﾙｱﾄﾞﾚｽ2
     * 
     * @param string $fShukaMail2
     * @return self
     */
    public function setFreeSyukaMail2(?string $fShukaMail2): self;

    /**
     * Get 出荷報告ﾒｰﾙｱﾄﾞﾚｽ3
     * 
     * @return string
     */
    public function getFreeShukaMail3(): string;

    /**
     * Set 出荷報告ﾒｰﾙｱﾄﾞﾚｽ3
     * 
     * @param string $fShukaMail3
     * @return self
     */
    public function setFreeSyukaMail3(?string $fShukaMail3): self;

    /**
     * Get 出荷報告ﾒｰﾙｱﾄﾞﾚｽ4
     * 
     * @return string
     */
    public function getFreeShukaMail4(): string;

    /**
     * Set 出荷報告ﾒｰﾙｱﾄﾞﾚｽ4
     * 
     * @param string $fShukaMail4
     * @return self
     */
    public function setFreeSyukaMail4(?string $fShukaMail4): self;

    /**
     * Get 出荷報告ﾒｰﾙｱﾄﾞﾚｽ5
     * 
     * @return string
     */
    public function getFreeShukaMail5(): string;

    /**
     * Set 出荷報告ﾒｰﾙｱﾄﾞﾚｽ5
     * 
     * @param string $fShukaMail5
     * @return self
     */
    public function setFreeSyukaMail5(?string $fShukaMail5): self;

    /**
     * Get 請求明細ﾒｰﾙｱﾄﾞﾚｽ1
     * 
     * @return ?string
     */
    public function getFreeSeikyuMail1(): ?string;

    /**
     * Set 請求明細ﾒｰﾙｱﾄﾞﾚｽ1
     * 
     * @param ?string $fSeikyuMail1
     */
    public function setFreeSeikyuMail1(?string $fSeikyuMail1): self;

    /**
     * Get 請求明細ﾒｰﾙｱﾄﾞﾚｽ2
     * 
     * @return ?string
     */
    public function getFreeSeikyuMail2(): ?string;

    /**
     * Set 請求明細ﾒｰﾙｱﾄﾞﾚｽ2
     * 
     * @param ?string $fSeikyuMail2
     */
    public function setFreeSeikyuMail2(?string $fSeikyuMail2): self;

    /**
     * Get 請求明細ﾒｰﾙｱﾄﾞﾚｽ3
     * 
     * @return ?string
     */
    public function getFreeSeikyuMail3(): ?string;

    /**
     * Set 請求明細ﾒｰﾙｱﾄﾞﾚｽ3
     * 
     * @param ?string $fSeikyuMail3
     */
    public function setFreeSeikyuMail3(?string $fSeikyuMail3): self;

    /**
     * Get 請求明細ﾒｰﾙｱﾄﾞﾚｽ4
     * 
     * @return ?string
     */
    public function getFreeSeikyuMail4(): ?string;

    /**
     * Set 請求明細ﾒｰﾙｱﾄﾞﾚｽ4
     * 
     * @param ?string $fSeikyuMail4
     */
    public function setFreeSeikyuMail4(?string $fSeikyuMail4): self;

    /**
     * Get 請求明細ﾒｰﾙｱﾄﾞﾚｽ5
     * 
     * @return ?string
     */
    public function getFreeSeikyuMail5(): ?string;

    /**
     * Set 請求明細ﾒｰﾙｱﾄﾞﾚｽ5
     * 
     * @param ?string $fSeikyuMail5
     * @return self
     */
    public function setFreeSeikyuMail5(?string $fSeikyuMail5): self;

     /**
     * Get 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ1
     * 
     * @return ?string
     */
    public function getFreeShouHinMail1(): ?string;

    /**
     * Set 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ1
     * 
     * @param ?string $fShouHinMail1
     * @return self
     */
    public function setFreeShouHinMail1(?string $fShouHinMail1): self;

    /**
     * Get 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ2
     * 
     * @return ?string
     */
    public function getFreeShouHinMail2(): ?string;

    /**
     * Set 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ2
     * 
     * @param ?string $fShouHinMail2
     * @return self
     */
    public function setFreeShouHinMail2(?string $fShouHinMail2): self;

    /**
     * Get 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ3
     * 
     * @return ?string
     */
    public function getFreeShouHinMail3(): ?string;

    /**
     * Set 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ3
     * 
     * @param ?string $fShouHinMail3
     * @return self
     */
    public function setFreeShouHinMail3(?string $fShouHinMail3): self;

    /**
     * Get 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ4
     * 
     * @return ?string
     */
    public function getFreeShouHinMail4(): ?string;

    /**
     * Set 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ4
     * 
     * @param ?string $fShouHinMail4
     * @return self
     */
    public function setFreeShouHinMail4(?string $fShouHinMail4): self;

    /**
     * Get 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ5
     * 
     * @return ?string
     */
    public function getFreeShouHinMail5(): ?string;

    /**
     * Set 商品在庫案内ﾒｰﾙｱﾄﾞﾚｽ5
     * 
     * @param ?string $fShouHinMail5
     * @return self
     */
    public function setFreeShouHinMail5(?string $fShouHinMail5): self;
    
    /**
     * Get 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ1
     * 
     * @return ?string
     */
    public function getDenshiMail1(): ?string;

    /**
     * Set 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ1
     * 
     * @param ?string $denshiMail1
     * @return self
     */
    public function setDenshiMail1(?string $denshiMail1): self;

    /**
     * Get 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ2
     * 
     * @return ?string
     */
    public function getDenshiMail2(): ?string;

    /**
     * Set 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ2
     * 
     * @param ?string $denshiMail2
     * @return self
     */
    public function setDenshiMail2(?string $denshiMail2): self;

    /**
     * Get 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ3
     * 
     * @return ?string
     */
    public function getDenshiMail3(): ?string;

    /**
     * Set 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ3
     * 
     * @param ?string $denshiMail3
     * @return self
     */
    public function setDenshiMail3(?string $denshiMail3): self;

    /**
     * Get 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ4
     * 
     * @return ?string
     */
    public function getDenshiMail4(): ?string;

    /**
     * Set 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ4
     * 
     * @param ?string $denshiMail4
     * @return self
     */
    public function setDenshiMail4(?string $denshiMail4): self;

    /**
     * Get 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ5
     * 
     * @return ?string
     */
    public function getDenshiMail5(): ?string;

    /**
     * Set 電子契約送付ﾒｰﾙｱﾄﾞﾚｽ5
     * 
     * @param ?string $denshiMail5
     * @return self
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
    public function getFreeHanshakbn(): ?int;

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