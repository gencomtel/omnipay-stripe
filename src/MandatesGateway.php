<?php

/**
 * Stripe Mandate Gateway.
 */

namespace Omnipay\Stripe;

/**
 * Stripe Mandate Gateway.
 *
 * @see \Omnipay\Stripe\AbstractGateway
 * @see \Omnipay\Stripe\Message\AbstractRequest
 *
 * @link https://stripe.com/docs/api
 *
 */
class MandatesGateway extends AbstractGateway
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Stripe Mandates';
    }

    /**
     * @inheritdoc
     *
     * @return \Omnipay\Stripe\Message\Mandates\AuthorizeRequest
     */
    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\Mandates\AuthorizeRequest', $parameters);
    }

    /**
     * @inheritdoc
     *
     * In reality, we're confirming the Mandate.
     * This method exists as an alias to in line with how Omnipay interfaces define things.
     *
     * @return \Omnipay\Stripe\Message\Mandates\ConfirmMandatesRequest
     */
    public function completeAuthorize(array $options = [])
    {
        return $this->confirm($options);
    }

    /**
     * @inheritdoc
     *
     * @return \Omnipay\Stripe\Message\Mandates\CaptureRequest
     */
    public function capture(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\Mandates\CaptureRequest', $parameters);
    }

    /**
     * Confirm a Mandate. Use this to confirm a Mandate created by a Purchase or Authorize request.
     *
     * @param array $parameters
     * @return \Omnipay\Stripe\Message\Mandates\ConfirmMandatesRequest
     */
    public function confirm(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\Mandates\ConfirmMandatesRequest', $parameters);
    }

    /**
     * Cancel a Mandate.
     *
     * @param array $parameters
     * @return \Omnipay\Stripe\Message\Mandates\CancelMandatesRequest
     */
    public function cancel(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\Mandates\CancelMandatesRequest', $parameters);
    }

    /**
     * @inheritdoc
     *
     * @return \Omnipay\Stripe\Message\Mandates\PurchaseRequest
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\Mandates\PurchaseRequest', $parameters);
    }

    /**
     * @inheritdoc
     *
     * In reality, we're confirming the Mandate.
     * This method exists as an alias to in line with how Omnipay interfaces define things.
     *
     * @return \Omnipay\Stripe\Message\Mandates\ConfirmMandatesRequest
     */
    public function completePurchase(array $options = [])
    {
        return $this->confirm($options);
    }

    /**
     * Fetch a mandate. Use this to check the status of it.
     *
     * @return \Omnipay\Stripe\Message\Mandates\FetchMandateRequest
     */
    public function fetchMandateRequest(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Stripe\Message\Mandates\FetchMandateRequest', $parameters);
    }

}
