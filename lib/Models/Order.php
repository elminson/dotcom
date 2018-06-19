<?php

namespace DotCom\Models;

use DotCom\Contracts\ItemInterface;
use DotCom\Contracts\OrderInterface;
use DotCom\Contracts\PaymentInterface;
use DotCom\Utils\Logger;

/**
 * Created by edeoleo@gmail.com.
 * User: Elminson De Oleo Baez
 * Date: 6/15/2018
 * Time: 7:30 PM
 * @property  logger
 */
class Order implements OrderInterface
{

    protected $payments;
    protected $items;
    protected $logger;

    public function __construct()
    {
        $this->payments = [];
        $this->items = [];
        $this->logger = new Logger();
    }

    /**
     * @param ItemInterface $item An item that is part of the order
     * @throws \Exception
     */
    public function addItem(ItemInterface $item = null)
    {
        try {
            if ($item instanceof ItemInterface) {
                $this->items[] = $item;
            }
            if (is_null($item)) {
                $message = 'Item can\'t be null';
                $this->logger->log_message($message);
                throw new \Exception(sprintf($message));
            }

        } catch (\TypeError $e) {
            $this->logger->Log($e);
            throw new \Exception('Item must be a instance of ItemInterface');
        } catch (\Exception $e) {
            $this->logger->Log($e);
            throw new \Exception($e);
        } catch (\Throwable $e) {
            $this->logger->Log($e);
            throw new \Exception($e);
        }


    }

    /**
     * @param PaymentInterface $payment A payment that has been applied to the order
     * @throws \Exception
     */
    public function addPayment(PaymentInterface $payment = null)
    {
        try {
            if ($payment instanceof PaymentInterface) {
                $this->payments[] = $payment;
                //@TODO Ben, Do we want this Exception for Overpaid or just a message + log?
//                if ($this->isOverPaid()) {
//                    $message = 'Overpayment received => ' . $this->getAmountOverPaid();
//                    $this->logger->log_message($message);
//                    throw new \Exception(sprintf($message));
//                }
            } else {
                $message = 'Payment need to be instance of PaymentInterface';
                $this->logger->log_message($message);
                throw new \TypeError(sprintf($message));
            }
            if (is_null($payment)) {
                $message = 'Payment can\'t be null';
                $this->logger->log_message($message);
                throw new \Exception(sprintf($message));
            }

        } catch (\Exception $e) {
            $this->logger->Log($e);
            throw new \Exception($e);
        } catch (\TypeError $e) {
            $this->logger->log_message($e->getMessage());
            throw new \TypeError($e);
        } catch (\Throwable $e) {
            $this->logger->Log($e);
            throw new \Exception($e);
        }
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        $amount = 0;
        foreach ($this->items as $item) {
            $amount += $item->getAmount();
        }
        return number_format($amount, 2, '.', ',');
    }

    /**
     * @return int
     */
    public function getPayments()
    {
        $payment_total = 0;
        foreach ($this->payments as $payment) {
            $payment_total += $payment->getAmount();
        }
        return number_format($payment_total, 2, '.', ',');
    }


    /**
     * @return bool true if the order has been paid in full, false if not.
     */
    public function isPaidInFull()
    {
        if ($this->getPayments() >= $this->getAmount()) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function isOverPaid()
    {
        if ($this->getPayments() > $this->getAmount()) {
            return true;
        }
        return false;

    }

    /**
     * @return string
     */
    public function getAmountOverPaid()
    {
        return number_format(($this->getPayments() - $this->getAmount()), 2, '.', ',');
    }
}