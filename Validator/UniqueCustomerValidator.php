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

namespace Plugin\AceClient43\Validator;

use Eccube\Repository\CustomerRepository;
use Plugin\AceClient43\Bridge\CustomerBridge;
use Plugin\AceClient43\Exception\CouldNotCheckCustomerExistingException;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * 顧客のメールアドレスがユニークであることを検証するバリデータ
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class UniqueCustomerValidator extends ConstraintValidator
{
    private CustomerBridge $customerBridge;

    private TranslatorInterface $translator;

    private CustomerRepository $customerRepository;

    public function __construct(CustomerBridge $customerBridge, TranslatorInterface $translator, CustomerRepository $customerRepository)
    {
        $this->customerBridge = $customerBridge;
        $this->translator = $translator;
        $this->customerRepository = $customerRepository;
    }

    /**
     * @param string $value
     * @param Constraint $constraint
     *
     * @return void
     *
     * @throws CouldNotCheckCustomerExistingException
     */
    public function validate($value, Constraint $constraint)
    {
        if (empty($value)) {
            return;
        }

        $customer = $this->customerRepository->findBy(['email' => $value]);
        if ($customer) {
            return;
        }

        if (!$constraint instanceof UniqueCustomer) {
            throw new \InvalidArgumentException(sprintf('Expected argument of type "%s", "%s" given', UniqueCustomer::class, get_class($constraint)));
        }

        if (!$this->customerBridge->has($value)) {
            return;
        }

        $transDomain = $constraint->translationDomain;
        $this->context->buildViolation($this->translator->trans($transDomain))
            ->setParameter('{{ email }}', $value)
            ->addViolation();
    }
}
