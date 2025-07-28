<?php

namespace Plugin\AceClient43\Bridge\Helper;

use Eccube\Entity\Customer;
use Plugin\AceClient43\AceServices\AceMethod\Member\CheckMailAdressMethod;
use Plugin\AceClient43\AceServices\AceMethod\Member\GetMemberMcodeMethod;
use Plugin\AceClient43\AceServices\AceMethod\Member\GetMemberMethod;
use Plugin\AceClient43\AceServices\Model\Request\Member\CheckMailAdress\CheckMailAdressRequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Request\Member\GetMember as GetMemberRequest;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMember;
use Plugin\AceClient43\AceServices\Model\Response\Member\CheckMailAdress\CheckMailAdressResponseModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetMember as GetMemberResponse;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetMemberMcode as GetMemberMcodeResponse;
use Plugin\AceClient43\Bridge\CreateRequestModelTrait;
use Plugin\AceClient43\Bridge\DataConverter\CustomerDataConverterInterface;

/**
 * CustomerBridgeHelper - 顧客連携ブリッジの複雑なロジックをカプセル化するヘルパークラス
 */
class CustomerBridgeHelper
{
    use CreateRequestModelTrait;

    protected GetMemberMethod $getMemberMethod;

    protected GetMemberMcodeMethod $getMemberMcodeMethod;

    protected CheckMailAdressMethod $checkMailAdressMethod;

    protected CustomerDataConverterInterface $customerDataConverter;

    public function __construct(
        GetMemberMethod $getMemberMethod,
        GetMemberMcodeMethod $getMemberMcodeMethod,
        CheckMailAdressMethod $checkMailAdressMethod,
        CustomerDataConverterInterface $customerDataConverter,
    ) {
        $this->getMemberMethod = $getMemberMethod;
        $this->getMemberMcodeMethod = $getMemberMcodeMethod;
        $this->checkMailAdressMethod = $checkMailAdressMethod;
        $this->customerDataConverter = $customerDataConverter;
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
    public function getByAceCustomerId(string $aceCustomerId, string $syid, array $options = [], ?Customer $customer = null): ?GetMemberMcodeResponse\LoginMemberModelInterface
    {
        $request = $this->customerDataConverter->convertCustomerToGetMemberMcodeRequest($aceCustomerId, $syid, $options, $customer);

        if (isset($options['return_alladr']) && $options['return_alladr']) {
            $request->getIdPrm()->getOptions()->setReturnAllAdr(true);
        }

        try {
            $response = $this->getMemberMcodeMethod
                ->withRequest($request)
                ->send();

            if (!$response->isOk()) {
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
}
