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

namespace Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient43\AceServices\Model\Request\Prm\PrmModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;
use Symfony\Component\Serializer\Annotation\SerializedName;

class OrderPrmModel extends PrmModelAbstract implements OrderPrmModelInterface
{
    public const PRM_NODE_NAME = 'order';

    /**
     * @var ?MemberOrderModelInterface
     */
    private ?MemberOrderModelInterface $member = null;

    /**
     * @var ?JyudenModelInterface
     */
    private ?JyudenModelInterface $jyuden = null;

    /**
     * @var ?DetailModelInterface
     */
    private ?DetailModelInterface $detail = null;

    /**
     * @var ?MailJyudenModel
     */
    private ?MailJyudenModel $mailjyuden = null;

    /**
     * @var ?JyudenFreeModelInterface[]
     *
     * @SerializedName("jyudenfree")
     */
    private ?array $jyudenFree = null;

    /**
     * @var ?array
     */
    private ?array $options = null;

    /**
     * {@inheritDoc}
     */
    public function setMember(?MemberOrderModelInterface $member): self
    {
        $this->member = $member;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMember(): ?MemberOrderModelInterface
    {
        return $this->member;
    }

    /**
     * {@inheritDoc}
     */
    public function setJyuden(?JyudenModelInterface $jyuden): self
    {
        $this->jyuden = $jyuden;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getJyuden(): ?JyudenModelInterface
    {
        return $this->jyuden;
    }

    /**
     * {@inheritDoc}
     */
    public function getJyudenFree(): ?array
    {
        return $this->jyudenFree;
    }

    /**
     * {@inheritDoc}
     */
    public function setJyudenFree(?array $jyudenFree): self
    {
        if ($jyudenFree === null) {
            $this->jyudenFree = null;

            return $this;
        }

        // 型チェック
        foreach ($jyudenFree as $idx => $model) {
            if (!$model instanceof JyudenFreeModelInterface) {
                throw new \InvalidArgumentException(sprintf('jyudenFree[%s] must be instance of %s, %s given.', (string) $idx, JyudenFreeModelInterface::class, is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        // null / 空文字（トリム後）を除外
        $filtered = array_values(array_filter($jyudenFree, function (JyudenFreeModelInterface $m): bool {
            $v = $m->getFree();

            return $v !== null && trim((string) $v) !== '';
        }));

        $this->jyudenFree = empty($filtered) ? null : $filtered;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setDetail(?DetailModelInterface $detail): self
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDetail(): ?DetailModelInterface
    {
        return $this->detail;
    }

    /**
     * {@inheritDoc}
     */
    public function setMailjyuden(?MailJyudenModel $mailjyuden): self
    {
        $this->mailjyuden = $mailjyuden;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMailjyuden(): ?MailJyudenModel
    {
        return $this->mailjyuden;
    }

    /**
     * {@inheritDoc}
     */
    public function getOptions(): array
    {
        return $this->options ?? [];
    }

    /**
     * {@inheritDoc}
     */
    public function setOptions(array $options): self
    {
        $this->options = $options;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function addOption(string $key, $value): self
    {
        if (null === $this->options) {
            $this->options = [];
        }

        $this->options[$key] = $value;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (empty($this->detail)) {
            throw new MissingRequestParameterException($this->compilePropertyName('detail'));
        }

        if (empty($this->detail->getJyumei())) {
            throw new MissingRequestParameterException($this->compilePropertyName('detail.jyumei'));
        }

        for ($i = 0; $i < count($this->detail->getJyumei()); $i++) {
            $jyumei = $this->detail->getJyumei()[$i];
            if (empty($jyumei->getGcode())) {
                throw new MissingRequestParameterException($this->compilePropertyName(sprintf('detail.jyumei[%d].gcode', $i)));
            }

            if (null === $jyumei->getSuu()) {
                throw new MissingRequestParameterException($this->compilePropertyName(sprintf('detail.jyumei[%d].suu', $i)));
            }

            if (null === $jyumei->getTanka()) {
                throw new MissingRequestParameterException($this->compilePropertyName(sprintf('detail.jyumei[%d].tanka', $i)));
            }
        }
    }

    /**
     * {@inheritDoc}
     */
    public function fetchPrmNodeName(): string
    {
        return self::PRM_NODE_NAME;
    }
}
