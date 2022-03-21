<?php

/**
 * Stripe Fetch Mandate Request.
 */
namespace Omnipay\Stripe\Message\Mandates;

/**
 * Stripe Fetch Mandate Request.
 *
 * <code>
 *   $mandate = $gateway->fetchMandateRequest(array(
 *       'mandate' => $mandate,
 *   ));
 *
 *   $response = $mandate->send();
 *
 *   if ($response->isSuccessful()) {
 *     // All done
 *   }
 * </code>
 *
 * @link https://stripe.com/docs/api/mandates/retrieve
 */
class FetchMandateRequest extends AbstractRequest
{
    /**
     * @inheritdoc
     */
    public function getData()
    {
        $this->validate('mandateReference');

        return [];
    }

    /**
     * @inheritdoc
     */
    public function getHttpMethod()
    {
        return 'GET';
    }

    /**
     * @inheritdoc
     */
    public function getEndpoint()
    {
        return $this->endpoint . '/mandates/' . $this->getMandateReference();
    }

    /**
     * @inheritdoc
     */
    protected function createResponse($data, $headers = [])
    {
        return $this->response = new Response($this, $data, $headers);
    }
}
