<?php

namespace Yukbisnis\YubiPay;

class Transaction extends Request
{

    protected $endpoint = '/v1/transaction';

    public function create($attr = [])
    {
        $this->setEndpoint('POST', $this->endpoint);
        $this->setBody($this->formatAttr($attr));
        $this->withAuth();

        $this->hit();

        if ($this->status == true) {
            $data = json_decode(json_encode($this->responseData));

            $this->data = $data->response->results;
        }

        return $this;
    }

    protected function formatAttr($value)
    {

        $data = [
            'externalId' => '',
            'email' => '',
            'phone' => '',
            'name' => '',
            'channelCode' => '',
            'channelDetailCode' => '',
            'amount' => '',
            'expirationDate' => '',
            'successRedirectUrl' => '',
            'failurRedirectUrl' => ''
        ];

        foreach ($data as $k => $v) {
            if (array_key_exists($k, $value)) {
                $data[$k] = $value[$k];
            }
        }

        return $data;
    }
}
