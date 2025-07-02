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

namespace Plugin\AceClient43\Bridge;

use Eccube\Entity\Customer;
use Plugin\AceClient43\AceServices\Model\Request\Contact\RegContact as RequestRegContact;
use Plugin\AceClient43\AceServices\Model\Response\Contact\RegContact as ResponseRegContact;
use Plugin\AceClient43\AceServices\Service\ContactService;
use Plugin\AceClient43\Events\Events;
use Plugin\AceClient43\Events\PreAddContactEvent;
use Plugin\AceClient43\Exception\CouldNotAddContactException;

class ContactBridge extends BaseBridge
{
    private ContactService $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    /**
     * コンタクトを追加
     *
     * @param Customer $customer
     * @param string $content
     * @param array $options
     *
     * @return void
     *
     * @throws CouldNotAddContactException
     */
    public function add(Customer $customer, string $content, array $options): void
    {
        $request = (new RequestRegContact\RegContactRequestModel())
            ->setId($this->getSyid())
            ->setPrm(
                (new RequestRegContact\InquiryPrmModel())
                    ->setContact(
                        (new RequestRegContact\ContactModel())
                            ->setStatus(0)
                            ->setKind(0)
                            ->setMsyid($this->getSyid())
                            ->setEtcid($customer->getAceCustomerId())
                    )
                    ->setContactmei(
                        (new RequestRegContact\ContactmeiModel())
                            ->setStatus(0)
                            ->setNote1($content)
                    )
            );
        $this->eventDispatcher->dispatch(
            new PreAddContactEvent($request, $customer, $content, $options),
            Events::PRE_ADD_CONTACT
        );
        try {
            $response = $this->contactService->makeRegContactMethod()
                                             ->withRequest($request)
                                             ->send();

            if (!$response->isOk()) {
                throw new CouldNotAddContactException(sprintf('通販Aceのコンタクト追加処理に失敗しました: %s', $response->getStatusCode()));
            }

            /** @var ResponseRegContact\RegContactResponseModelInterface $responseObject */
            $responseObject = $response->getResponse();
            if ($this->hasErrorMessage($responseObject->getInquiry())) {
                throw new CouldNotAddContactException('通販Aceのコンタクト追加に失敗しました。');
            }
        } catch (\Throwable $e) {
            $this->logger->error('通販Aceのコンタクト追加に失敗しました。', ['exception' => $e]);
            throw new CouldNotAddContactException('通販Aceのコンタクト追加に失敗しました。', $e);
        }
    }
}
