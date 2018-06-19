<?php

namespace DotCom\Test;

/**
 * Created by edeoleo@gmail.com.
 * User: Elminson De Oleo Baez
 * Date: 6/15/2018
 * Time: 7:28 PM
 */

use DotCom\Models\Item;
use DotCom\Models\Order;
use DotCom\Models\Payment;
use PHPUnit\Framework\TestCase;

class OrderAndPaymentsTest extends TestCase
{

    public function setUp()
    {
    }

    public function tearDown()
    {
    }


    public function testAddItem()
    {
        $container = new Order();
        $container->addItem(new Item(100));
        $this->assertTrue($container !== false);
    }

    public function testAddPayment()
    {
        $container = new Order();
        $container->addPayment(new Payment(100));
        $this->assertTrue($container !== false);

    }

    public function testNullItem()
    {
        $this->expectException('Exception');
        $container = new Order();
        $container->addItem(null);
    }

    public function testNullPayment()
    {
        $this->expectException('TypeError');
        $container = new Order();
        $container->addPayment(null);
    }

    public function testNotValidItem()
    {
        $this->expectException('Exception');
        $container = new Order();
        $container->addItem(new Item(null));
    }

    public function testNotValidPayment()
    {
        $this->expectException('Exception');
        $container = new Order();
        $container->addPayment(new Payment(null));
    }

    public function testNotValidAmountPayment()
    {
        $this->expectException('Exception');
        $container = new Order();
        $container->addPayment(new Payment("asdf"));
    }

    public function testNotValidAmountItem()
    {
        $this->expectException('Exception');
        $container = new Order();
        $container->addItem(new Item("asdf"));
    }

    public function testNegativeAmountItem()
    {
        $this->expectException('Exception');
        $container = new Order();
        $container->addItem(new Item(-200));
    }

    public function testNegativeAmountPayment()
    {
        $this->expectException('Exception');
        $container = new Order();
        $container->addPayment(new Payment(-200));
    }

    //@TODO Ben, Do we want this TestCase for Overpaid or not?
//    public function testOverPayment()
//    {
//        $this->expectException('Exception');
//        $container = new Order();
//        $container->addItem(new Item(200));
//        $container->addPayment(new Payment(200));
//        $container->addPayment(new Payment(200));
//    }

}
