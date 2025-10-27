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

namespace Plugin\AceClient43\Bridge\Helper;

use Eccube\Entity\Customer;
use Plugin\AceClient43\AceServices\AceMethod\Member\CheckMailAdressMethod;
use Plugin\AceClient43\AceServices\AceMethod\Member\GetDurationOrderTotalMethod;
use Plugin\AceClient43\AceServices\AceMethod\Member\GetMemberMcodeMethod;
use Plugin\AceClient43\AceServices\AceMethod\Member\GetMemberMethod;
use Plugin\AceClient43\AceServices\AceMethod\Member\GetPointRirekiMethod;
use Plugin\AceClient43\AceServices\AceMethod\Member\GetRirekiDetailMethod;
use Plugin\AceClient43\AceServices\AceMethod\Member\GetRirekiMethod;
use Plugin\AceClient43\AceServices\AceMethod\Member\UpdatePasswordMethod;
use Plugin\AceClient43\AceServices\AceMethod\WebApi\Member\V1\CheckCodeAndMailMethod;
use Plugin\AceClient43\AceServices\AceMethod\WebApi\Order\V1GetOrderListMethod;
use Plugin\AceClient43\AceServices\AceMethod\WebApi\Order\V2GetOrderListV2Method;
use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelExtend1Interface;
use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Member\CheckMailAdress\CheckMailAdressRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Member\GetDurationOrderTotal\GetDurationOrderTotalRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Member\GetMember as GetMemberRequest;
use Plugin\AceClient43\AceServices\Model\Request\Member\GetMemberMcode as GetMemberMcodeRequest;
use Plugin\AceClient43\AceServices\Model\Request\Member\GetPointRireki\GetPointRirekiRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMember;
use Plugin\AceClient43\AceServices\Model\Request\WebApi\Member\V1\CheckCodeAndMail\CheckCodeAndMailRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\Member\CheckMailAdress\CheckMailAdressResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetDurationOrderTotal\GetDurationOrderTotalResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetMember as GetMemberResponse;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetMemberMcode as GetMemberMcodeResponse;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetPointRireki\GetPointRirekiResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetRireki as GetRirekiResponse;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetRirekiDetail as GetRirekiDetailResponse;
use Plugin\AceClient43\AceServices\Model\Response\WebApi\Member\V1\CheckCodeAndMail\CheckCodeAndMailResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\WebApi\Order\V1\GetOrderList\V1GetOrderListResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\WebApi\Order\V2\GetOrderListV2\V2GetOrderListV2ResponseModelInterface;
use Plugin\AceClient43\Bridge\CreateRequestModelTrait;
use Plugin\AceClient43\Converter\CustomerDataConverterInterface;
use Plugin\AceClient43\Cache\ResponseCachePool;
use Psr\Log\LoggerInterface;

/**
 * CustomerBridgeHelper - 顧客連携ブリッジの複雑なロジックをカプセル化するヘルパークラス
 *
 * @deprecated CustomerBridgeHelperは今後廃止予定です。代わりにCustomerBridgeを使用してください。
 */
class CustomerBridgeHelper
{
    use CreateRequestModelTrait;

    protected GetMemberMethod $getMemberMethod;

    protected GetMemberMcodeMethod $getMemberMcodeMethod;

    protected CheckMailAdressMethod $checkMailAdressMethod;

    protected CustomerDataConverterInterface $customerDataConverter;

    protected GetRirekiMethod $getRirekiMethod;

    protected GetRirekiDetailMethod $getRirekiDetailMethod;

    protected V1GetOrderListMethod $getOrderListMethod;

    protected V2GetOrderListV2Method $getOrderListV2Method;

    protected CheckCodeAndMailMethod $checkCodeAndMailMethod;

    protected GetPointRirekiMethod $getPointRirekiMethod;

    protected GetDurationOrderTotalMethod $getDurationOrderTotalMethod;

    protected UpdatePasswordMethod $updatePasswordMethod;

    protected LoggerInterface $logger;

    protected ResponseCachePool $responseCachePool;

    public function __construct(
        GetMemberMethod $getMemberMethod,
        GetMemberMcodeMethod $getMemberMcodeMethod,
        CheckMailAdressMethod $checkMailAdressMethod,
        CustomerDataConverterInterface $customerDataConverter,
        GetRirekiMethod $getRirekiMethod,
        GetRirekiDetailMethod $getRirekiDetailMethod,
        V1GetOrderListMethod $getOrderListMethod,
        V2GetOrderListV2Method $getOrderListV2Method,
        CheckCodeAndMailMethod $checkCodeAndMailMethod,
        GetPointRirekiMethod $getPointRirekiMethod,
        GetDurationOrderTotalMethod $getDurationOrderTotalMethod,
        UpdatePasswordMethod $updatePasswordMethod,
        LoggerInterface $logger,
        ResponseCachePool $responseCachePool,
    ) {
        $this->getMemberMethod = $getMemberMethod;
        $this->getMemberMcodeMethod = $getMemberMcodeMethod;
        $this->checkMailAdressMethod = $checkMailAdressMethod;
        $this->customerDataConverter = $customerDataConverter;
        $this->getRirekiMethod = $getRirekiMethod;
        $this->getRirekiDetailMethod = $getRirekiDetailMethod;
        $this->getOrderListMethod = $getOrderListMethod;
        $this->getOrderListV2Method = $getOrderListV2Method;
        $this->checkCodeAndMailMethod = $checkCodeAndMailMethod;
        $this->getPointRirekiMethod = $getPointRirekiMethod;
        $this->getDurationOrderTotalMethod = $getDurationOrderTotalMethod;
        $this->updatePasswordMethod = $updatePasswordMethod;
        $this->logger = $logger;
        $this->responseCachePool = $responseCachePool;
    }

    /**
     * 顧客データをRegMemberモデルにバインドする
     */
    public function bindCustomerToRegMember(Customer $customer, string $syid, array $options = []): RegMember\RegMemberRequestModelInterface
    {
        return $this->customerDataConverter->convertCustomerToRegMemberRequest($customer, $syid, $options);
    }

    /**
     * メールアドレスとパスワードによる顧客情報の取得
     */
    public function getByEmailAndPassword(string $email, string $password, string $syid, array $options = []): ?GetMemberResponse\LoginMemberModelInterface
    {
        /** @var GetMemberRequest\GetMemberRequestModelInterface $requestModel */
        $requestModel = $this->createRequestModel(GetMemberRequest\GetMemberRequestModelInterface::class);

        if (isset($options['return_alladr']) && $options['return_alladr']) {
            $requestModel->getIdPrm()->getOptions()->setReturnAllAdr(true);
        }

        $request = $requestModel
            ->setId($syid)
            ->setUserid($email)
            ->setPasswd($password);

        try {
            $response = $this->getMemberMethod
                ->withRequest($request)
                ->send();

            if (!$response->isOk()) {
                return null;
            }

            if ($this->hasErrorMessage($response->getResponse()->getLoginMember())) {
                return null;
            }

            /** @var GetMemberResponse\GetMemberResponseModelInterface $responseModel */
            $responseModel = $response->getResponse();

            return $responseModel->getLoginMember()->getMessage()->getResult() === 'OK'
                ? $responseModel->getLoginMember()
                : null;
        } catch (\Throwable $e) {
            throw new \RuntimeException('メールアドレスとパスワードによる顧客情報の取得に失敗しました。', 0, $e);
        }
    }

    /**
     * 会員IDによる顧客情報の取得
     */
    public function getByAceCustomerId(string $aceCustomerId, string $syid, array $options = [], ?Customer $customer = null, bool $force = false): ?GetMemberMcodeResponse\LoginMemberModelInterface
    {
        $cacheKey = 'get_by_ace_customer_id_'.$aceCustomerId.'_'.md5(serialize($options));

        if ($force) {
            $this->responseCachePool->remove($cacheKey);
        }

        return $this->responseCachePool->get($cacheKey, function () use ($aceCustomerId, $syid, $options, $customer) {
            $request = $this->customerDataConverter->convertCustomerToGetMemberMcodeRequest($aceCustomerId, $syid, $options, $customer);

            if (isset($options['return_alladr']) && $options['return_alladr']) {
                $optionsModel = $request->getIdPrm()->getOptions() ?? $this->createSubModel(GetMemberMcodeRequest\OptionsModel::class);
                $optionsModel->setReturnAllAdr(true);
                $request->getIdPrm()->setOptions($optionsModel);
            }

            try {
                $response = $this->getMemberMcodeMethod
                    ->withRequest($request)
                    ->send();

                if (!$response->isOk()) {
                    return null;
                }

                if ($this->hasErrorMessage($response->getResponse()->getLoginMember())) {
                    return null;
                }

                /** @var GetMemberMcodeResponse\GetMemberMcodeResponseModelInterface $responseModel */
                $responseModel = $response->getResponse();

                return $responseModel->getLoginMember()->getMember()->getCode()
                    ? $responseModel->getLoginMember()
                    : null;
            } catch (\Throwable $e) {
                throw new \RuntimeException('会員IDによる顧客情報の取得に失敗しました。', 0, $e);
            }
        });
    }

    /**
     * ログインメンバーモデルから顧客エンティティを更新する
     */
    public function updateCustomerFromLoginMember(
        Customer $customer,
        $loginMemberModel,
        array $options = [],
    ): Customer {
        if (null === $loginMemberModel) {
            return $customer;
        }

        // Use data converter based on the type of login member model
        if ($loginMemberModel instanceof GetMemberResponse\LoginMemberModelInterface) {
            return $this->customerDataConverter->convertGetMemberToCustomer($loginMemberModel, $customer, $options);
        } elseif ($loginMemberModel instanceof GetMemberMcodeResponse\LoginMemberModelInterface) {
            return $this->customerDataConverter->convertGetMemberMcodeToCustomer($loginMemberModel, $customer, $options);
        }

        return $customer;
    }

    /**
     * メールアドレスからACE顧客IDを取得し、顧客情報を作成する処理
     */
    public function getAceCustomerIdByEmail(string $email, string $syid): ?string
    {
        $responseObject = $this->checkMailAddressInAce($email, $syid);
        if ($responseObject !== null && 'NG' === $responseObject->getMember()->getMessage()->getResult()) {
            return $responseObject->getMember()->getMessage()->getCode();
        }

        return null;
    }

    /**
     * 通販Aceシステムに対してメールアドレスの存在確認を行う
     */
    public function checkMailAddressInAce(string $email, string $syid): ?CheckMailAdressResponseModelInterface
    {
        /** @var CheckMailAdressRequestModelInterface $requestModel */
        $requestModel = $this->createRequestModel(CheckMailAdressRequestModelInterface::class);

        $request = $requestModel
            ->setId($syid)
            ->setMailadress($email);

        try {
            $response = $this->checkMailAdressMethod
                ->withRequest($request)
                ->send();

            if (!$response->isOk()) {
                return null;
            }

            return $response->getResponse();
        } catch (\Throwable $e) {
            throw new \RuntimeException('メールアドレスの存在確認に失敗しました。', 0, $e);
        }
    }

    /**
     * レスポンスがエラーかどうかを判定
     *
     * @param HasMessageModelInterface|HasMessageModelExtend1Interface $response
     *
     * @return bool
     */
    protected function hasErrorMessage($response): bool
    {
        if (method_exists($response->getMessage(), 'getResult')) {
            $isResultOk = 'OK' === $response->getMessage()->getResult();

            if (!$isResultOk) {
                $this->logger->error('通販Ace側の処理でエラーが発生しました', [
                    'result' => $response->getMessage()->getResult(),
                    'message1' => $response->getMessage()->getMessage1() ?? 'N/A',
                    'message2' => $response->getMessage()->getMessage2() ?? 'N/A',
                ]);
            }

            return !$isResultOk;
        }
        $hasMessage1 = $response->getMessage()->getMessage1();
        $hasMessage2 = $response->getMessage()->getMessage2();
        if ($hasMessage1 || $hasMessage2) {
            $this->logger->error('通販Ace側の処理でエラーが発生しました', [
                'message1' => $hasMessage1,
                'message2' => $hasMessage2,
            ]);

            return true;
        }

        return false;
    }

    public function getCustomerOrderHistory(string $aceCustomerId, string $syid): ?GetRirekiResponse\GetRirekiResponseModelInterface
    {
        $request = $this->customerDataConverter->convertCustomerToGetRirekiRequest($aceCustomerId, $syid);
        $response = $this->getRirekiMethod->withRequest($request)->send();

        if (!$response->isOk()) {
            throw new \RuntimeException('通販Ace側の処理でエラーが発生しました');
        }

        return $response->getResponse();
    }

    public function getCustomerOrderHistoryDetail(string $aceCustomerId, string $orderId, string $syid): ?GetRirekiDetailResponse\GetRirekiDetailResponseModelInterface
    {
        $request = $this->customerDataConverter->convertCustomerToGetRirekiDetailRequest($aceCustomerId, $orderId, $syid);

        $response = $this->getRirekiDetailMethod->withRequest($request)->send();

        if (!$response->isOk()) {
            throw new \RuntimeException('通販Ace側の処理でエラーが発生しました');
        }

        return $response->getResponse();
    }

    public function getOrderList(string $aceCustomerId, string $syid, int $page = 1, int $limit = 10, ?int $denno = null, int $sort = 0): ?V1GetOrderListResponseModelInterface
    {
        $request = $this->customerDataConverter->convertCustomerToGetOrderListRequest($aceCustomerId, $syid, $page, $limit, $denno, $sort);
        $response = $this->getOrderListMethod->withRequest($request)->send();

        return $response->getResponse();
    }

    public function getOrderListV2(string $aceCustomerId, string $syid, int $page = 1, int $limit = 10, ?int $denno = null, int $sort = 0, ?string $dayFrom = null, ?string $dayTo = null, array $options = []): ?V2GetOrderListV2ResponseModelInterface
    {
        $request = $this->customerDataConverter->convertCustomerToGetOrderListV2Request($aceCustomerId, $syid, $page, $limit, $denno, $sort, $dayFrom, $dayTo, $options);
        $response = $this->getOrderListV2Method->withRequest($request)->send();

        return $response->getResponse();
    }

    /**
     * 通販Aceシステムに対してポイント履歴を取得する
     */
    public function getPointHistory(string $aceCustomerId, string $syid): ?GetPointRirekiResponseModelInterface
    {
        /** @var GetPointRirekiRequestModelInterface $requestModel */
        $requestModel = $this->createRequestModel(GetPointRirekiRequestModelInterface::class);

        $request = $requestModel
            ->setSyid($syid)
            ->setJmemid($aceCustomerId);

        try {
            $response = $this->getPointRirekiMethod
                ->withRequest($request)
                ->send();

            if (!$response->isOk()) {
                throw new \RuntimeException('通販Ace側の処理でエラーが発生しました');
            }

            return $response->getResponse();
        } catch (\Throwable $e) {
            throw new \RuntimeException('ポイント履歴の取得に失敗しました。', 0, $e);
        }
    }

    /**
     * 通販Aceシステムに対して期間内の注文合計を取得する
     *
     * @param string $aceCustomerId ACE顧客ID
     * @param string $syid システムID
     * @param \DateTimeInterface $dayfrom 開始日 (YYYYMMDD format)
     * @param \DateTimeInterface $dayto 終了日 (YYYYMMDD format)
     *
     * @return GetDurationOrderTotalResponseModelInterface|null
     *
     * @throws \RuntimeException
     */
    public function getDurationOrderTotal(
        string $aceCustomerId,
        string $syid,
        \DateTimeInterface $dayfrom,
        \DateTimeInterface $dayto,
    ): ?GetDurationOrderTotalResponseModelInterface {
        /** @var GetDurationOrderTotalRequestModelInterface $requestModel */
        $requestModel = $this->createRequestModel(
            GetDurationOrderTotalRequestModelInterface::class
        );

        // 日付をACE形式に変換: YYYYMMDD
        $dayfromInt = (int) $dayfrom->format('Ymd');
        $daytoInt = (int) $dayto->format('Ymd');

        $request = $requestModel
            ->setSyid($syid)
            ->setMbid($aceCustomerId)
            ->setDayfrom($dayfromInt)
            ->setDayto($daytoInt);

        try {
            $response = $this->getDurationOrderTotalMethod
                ->withRequest($request)
                ->send();

            if (!$response->isOk()) {
                throw new \RuntimeException('通販Ace側の処理でエラーが発生しました');
            }

            return $response->getResponse();
        } catch (\Throwable $e) {
            throw new \RuntimeException('期間内注文合計の取得に失敗しました。', 0, $e);
        }
    }

    /**
     * 通販Aceシステムに対して顧客のパスワードを更新する
     */
    public function updatePasswordInAce(Customer $customer, string $syid, array $options = []): void
    {
        $request = $this->customerDataConverter->convertCustomerToUpdatePasswordRequest($customer, $syid, $options);

        try {
            $response = $this->updatePasswordMethod
                ->withRequest($request)
                ->send();

            if (!$response->isOk()) {
                throw new \RuntimeException('通販Ace側のパスワード更新でエラーが発生しました');
            }
        } catch (\Throwable $e) {
            throw new \RuntimeException('パスワードの更新に失敗しました。', 0, $e);
        }
    }

    public function checkMemberCodeAndMailInAce(string $syid, array $mcode, array $mail, int $status = 0): ?CheckCodeAndMailResponseModelInterface
    {
        /** @var CheckCodeAndMailRequestModelInterface $requestModel */
        $requestModel = $this->createRequestModel(CheckCodeAndMailRequestModelInterface::class);

        $request = $requestModel
            ->setSyid($syid)
            ->setMcode($mcode)
            ->setMail($mail)
            ->setStatus($status);

        try {
            $response = $this->checkCodeAndMailMethod
                ->withRequest($request)
                ->send();

            if (!$response->isOk()) {
                throw new \RuntimeException('通販Ace側の処理でエラーが発生しました');
            }

            return $response->getResponse();
        } catch (\Throwable $e) {
            throw new \RuntimeException('メールおよびコードの存在を確認に失敗しました。', 0, $e);
        }
    }
}
