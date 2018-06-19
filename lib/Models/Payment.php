<?php

namespace DotCom\Models;

/**
 * Created by edeoleo@gmail.com.
 * User: Elminson De Oleo Baez
 * Date: 6/15/2018
 * Time: 7:28 PM
 */

use DotCom\Contracts\PaymentInterface;
use DotCom\Utils\Logger;
use Exception;

/**
 * Created by edeoleo@gmail.com.
 * User: Elminson De Oleo Baez
 * Date: 6/12/2018
 * Time: 11:20 PM
 */

class Payment implements PaymentInterface
{

    protected $amount = 0;
    protected $logger;

    /**
     * Payment constructor.
     * @param $amount
     * @throws Exception
     */
    public function __construct($amount)
    {
        $this->logger = new Logger();

        if (!is_numeric($amount)) {
            $message = "Payment must be numeric";
            $this->logger->log_message($message);
            throw new Exception($message);
        }

        if ($amount < 0) {
            $message = "Payment price must be positive";
            $this->logger->log_message($message);
            throw new \Exception($message);
        }
        $this->amount = $amount;
    }

    /**
     * @return int
     * @throws Exception
     */
    public function getAmount()
    {
        return $this->amount;

    }

}