<?php
class BankAccount {
    private $balance; // cannot access directly

    public function __construct($amount) {
        $this->balance = $amount;
    }

    public function deposit($amount) {
        $this->balance += $amount;
    }

    public function withdraw($amount) {
        if($amount <= $this->balance) {
            $this->balance -= $amount;
        } else {
            echo "Insufficient balance!<br>";
        }
    }

    public function getBalance() {
        return $this->balance;
    }
}

$account = new BankAccount(1000);
$account->deposit(500);
$account->withdraw(300);
echo $account->getBalance(); 

?>