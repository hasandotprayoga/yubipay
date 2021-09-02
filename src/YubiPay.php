<?php

namespace Yukbisnis\YubiPay;

class YubiPay extends Singleton
{

    public static function getChannel()
    {
        $data = (new Channel)->get();

        return $data->getResponse();
    }

    public static function createTransaction($attr = [])
    {
        $data = (new Transaction)->create($attr);

        return $data->getResponse();
    }
}
