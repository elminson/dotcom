<?php
require __DIR__ . '/vendor/autoload.php';

use DotCom\Models\Item;
use DotCom\Models\Order;
use DotCom\Models\Payment;

$order = new Order();
$order->addItem(new Item(200.10));
$order->addPayment(new Payment(250.10));


if ($order->isPaidInFull()) {
    if ($order->isOverPaid()) {
        echo 'Order is paid in full, with a overpaid of ' . $order->getAmountOverPaid()."\r\n";
    } else {
        echo "Order is paid in full!\r\n";
    }
} else {
    echo "Order is not paid in full!\r\n";
}


$order = new Order();
$order->addItem(new Item(200));
$order->addItem(new Item(200));
$order->addPayment(new Payment(200));
$order->addPayment(new Payment(100));

if ($order->isPaidInFull()) {
    if ($order->isOverPaid()) {
        echo "Order is paid in full, with a overpaid of " . $order->getAmountOverPaid()."\r\n";
    } else {
        echo "Order is paid in full!\r\n";
    }
} else {
    echo "Order is not paid in full!\r\n";
}

$order = new Order();
$order->addItem(new Item(30));
$order->addItem(new Item(20));
$order->addPayment(new Payment(50));

if ($order->isPaidInFull()) {
    if ($order->isOverPaid()) {
        echo "Order is paid in full, with a overpaid of " . $order->getAmountOverPaid()."\r\n";
    } else {
        echo "Order is paid in full!\r\n";
    }
} else {
    echo "Order is not paid in full!\r\n";
}

$order = new Order();
$order->addItem(new Item(30));
$order->addPayment(new Payment(10));
$order->addPayment(new Payment(10));
$order->addPayment(new Payment(10));

if ($order->isPaidInFull()) {
    if ($order->isOverPaid()) {
        echo "Order is paid in full, with a overpaid of " . $order->getAmountOverPaid()."\r\n";
    } else {
        echo "Order is paid in full!\r\n";
    }
} else {
    echo "Order is not paid in full!\r\n";
}