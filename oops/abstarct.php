<?php
abstract class PaymentGateway {
    abstract public function pay($amount);

    public function paymentSuccess() {
        echo "Payment successful<br>";
    }
}

class PayPal extends PaymentGateway {
    public function pay($amount) {
        echo "Paid $amount via PayPal<br>";
    }
}

class CreditCard extends PaymentGateway {
    public function pay($amount) {
        echo "Paid $amount via Credit Card<br>";
    }
}

$payments = [new PayPal(), new CreditCard()];
foreach ($payments as $p) {
    $p->pay(500);
    $p->paymentSuccess();
}


?>