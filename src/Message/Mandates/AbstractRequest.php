<?php

/**
 * Stripe Abstract Request.
 */

namespace Omnipay\Stripe\Message\Mandates;

/**
 * Stripe Mandate Abstract Request.
 *
 * This is the parent class for all Stripe Mandate requests.
 * It adds just a getter and setter.
 *
 * @see \Omnipay\Stripe\MandateGateway
 * @see \Omnipay\Stripe\Message\AbstractRequest
 * @link https://stripe.com/docs/api/mandates
 */
abstract class AbstractRequest extends \Omnipay\Stripe\Message\AbstractRequest
{
    /**
     * @param string $value
     *
     * @return AbstractRequest provides a fluent interface.
     */
    public function setMandateReference($value)
    {
        return $this->setParameter('mandateReference', $value);
    }

    /**
     * @return mixed
     */
    public function getMandateReference()
    {
        return $this->getParameter('mandateReference');
    }

}
