<?php
namespace App;

class MomoResponseParser
{

    protected $response;

    public $receiverNumber;
    public $statusCode;
    public $amount;
    public $transactionID;
    public $processingNumber;

    public $success;
    public $message; // will contain the message for the result

    function __construct($response)
    {
        $this->response = $response;
    }

    private function parse()
    {
        //parse the response
        $
    }
}

 ?>
