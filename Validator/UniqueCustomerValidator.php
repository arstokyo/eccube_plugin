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
use Plugin\AceClient43\Repository\ConfigRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Contracts\Translation\TranslatorInterface;

class UniqueCustomerValidator extends ConstraintValidator
{
    private CustomerBridge $customerBridge;

    private ConfigRepository $configRepository;

    private TranslatorInterface $translator;

    private CustomerRepository $customerRepository;

    public function __construct(CustomerBridge $customerBridge, ConfigRepository $configRepository, TranslatorInterface $translator, CustomerRepository $customerRepository)
    {
        $this->customerBridge = $customerBridge;
        $this->configRepository = $configRepository;
        $this->translator = $translator;
        $this->customerRepository = $customerRepository;
    }

    /**
     * @param string $value
     * @param Constraint|UniqueCustomer $constraint
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

        if (!$this->customerBridge->has($value)) {
            return;
        }

        $this->context->buildViolation($this->translator->trans('ace_client.customer_existing'))
            ->setParameter('{{ email }}', $value)
            ->addViolation();
    }
}
