<?php

namespace App;

class MomoProcessor
{

    public $amount;
    public $number;

    protected $momoEmail = "tncedric@yahoo.com";

    protected $url;

    protected $reponse;

    function __construct($amount,  $number)
    {
        $this->amount = $amount;
        $this->number = $number;

        $this->prepareURL();
        $this->pay();
    }

    public function prepareURL()
    {
        $url  = "https://developer.mtn.cm/OnlineMomoWeb/faces/transaction/transactionRequest.xhtml"."?idbouton=2&typebouton=PAIE&_amount=" . $this->amount . "&_tel=" . $this->number ."&_clP=tncedric"."&_email=" . $this->momoEmail . "&submit.x=104&submit.y=70";

        $this->url = $url;
    }

    public function pay()
    {
        $response = file_get_contents($this->url);
        $this->response = $response;
    }

    public function getResponse()
    {
        return $this->response;
    }
}

 ?>
