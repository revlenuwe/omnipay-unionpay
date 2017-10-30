<?php

namespace Omnipay\UnionPay\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\UnionPay\Common\DecryptHelper;

/**
 * Class WtzDeleteTokenResponse
 * @package Omnipay\UnionPay\Message
 */
class WtzDeleteTokenResponse extends AbstractResponse
{
    /**
     * @var WtzUpdateTokenRequest
     */
    protected $request;


    public function isSuccessful()
    {
        return $this->data['respCode'] == '00' && $this->data['verify_success'];
    }


    public function getCustomerInfo()
    {
        $cert = $this->request->getCertPath();
        $pass = $this->request->getCertPassword();

        return DecryptHelper::decryptCustomerInfo($this->data['customerInfo'], $cert, $pass);
    }
}
