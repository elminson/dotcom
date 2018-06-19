<?php

namespace DotCom\Models;

/**
 * Created by edeoleo@gmail.com.
 * User: Elminson De Oleo Baez
 * Date: 6/15/2018
 * Time: 7:28 PM
 */

use DotCom\Contracts\ItemInterface;
use DotCom\Utils\Logger;

class Item implements ItemInterface
{

    protected $amount = 0;
    protected $logger;

    /**
     * Item constructor.
     * @param $amount
     * @throws \Exception
     */
    public function __construct($amount = 0)
    {
        $this->logger = new Logger();

        if (!is_numeric($amount)) {
            $message = "Item price must be numeric";
            $this->logger->log_message($message);
            throw new \Exception($message);
        }
        if ($amount < 0) {
            $message = "Item price must be positive";
            $this->logger->log_message($message);
            throw new \Exception($message);
        }
        $this->amount = $amount;
    }

    /**
     * @return int The price of the individual item
     */
    public function getAmount()
    {
        return $this->amount;
    }
}
