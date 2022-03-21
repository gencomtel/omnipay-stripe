<?php

/**
 * Stripe Mandate Response.
 */
namespace Omnipay\Stripe\Message\Mandates;

use Omnipay\Stripe\Message\Response as BaseResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * Stripe Mandate Response.
 *
 * This is the response class for all Mandate related responses.
 *
 * @see \Omnipay\Stripe\MandateGateway
 */
class Response extends BaseResponse implements RedirectResponseInterface
{
    /**
     * Get the status of a Mandate response.
     *
     * @return string|null
     */
    public function getStatus()
    {
        if (isset($this->data['object']) && 'mandate' === $this->data['object']) {
            return $this->data['status'];
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function paymentMethod()
    {

        if (isset($this->data['object']) && 'mandate' === $this->data['object']) {
            if (!empty($this->data['payment_method'])) {
                return $this->data['payment_method'];
            }
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function isSuccessful()
    {
        if (isset($this->data['object']) && 'mandate' === $this->data['object']) {
            return in_array($this->getStatus(), ['active']);
        }

        return parent::isSuccessful();
    }

    /**
     * @inheritdoc
     */
    public function isCancelled()
    {
        if (isset($this->data['object']) && 'mandate' === $this->data['object']) {
            return $this->getStatus() === 'canceled';
        }

        return parent::isCancelled();
    }

    /**
     * Get the Mandate reference.
     *
     * @return string|null
     */
    public function getMandateReference()
    {
        if (isset($this->data['object']) && 'mandate' === $this->data['object']) {
            return $this->data['id'];
        }

        return null;
    }
}
