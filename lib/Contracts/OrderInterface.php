<?php

namespace DotCom\Contracts;

/**
 * Created by edeoleo@gmail.com.
 * User: Elminson De Oleo Baez
 * Date: 6/15/2018
 * Time: 7:28 PM
 */

interface OrderInterface
{
    /**
     * @param ItemInterface $item
     * @return mixed
     */
    public function addItem(ItemInterface $item);

    /**
     * @param PaymentInterface $payment
     * @return mixed
     */
    public function addPayment(PaymentInterface $payment);

    /**
     * @return mixed
     */
    public function getAmount();

    /**
     * @return mixed
     */
    public function getPayments();

    /**
     * @return mixed
     */
    public function isPaidInFull();

}
