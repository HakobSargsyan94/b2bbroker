<?php

namespace src\api\v1;

class Transactions
{
    public function __construct () {
        $this->accountsdata = [
            ['date' => '2022-01-01', 'user_id' => 1, 'transaction_id' => '21as23d1a32s1da32sd'],
            ['date' => '2022-01-03', 'user_id' => 2, 'transaction_id' => 'as4d56a4s5d4a64s564'],
            ['date' => '2022-01-03', 'user_id' => 3, 'transaction_id' => '89a7sd89a7s97d97a9s7'],
        ];

        if (isset($_GET['getTransaction']) && !empty($_GET['getTransaction']) && $_GET['getTransaction'] == 1) {
            $this->getTransactionSorted($_GET['getTransaction']);
        } else {
            die('Set data');
        }
    }

    private function getTransactionSorted (string $sort_type): string {
        if ($this->accountsdata) {
            if ($sort_type == "DESC") {
                die (json_encode(ksort($this->accountsdata)));
            }else {
                die (json_encode(krsort($this->accountsdata)));
            }
        }

        die(json_encode(['status' => 404, 'error_message' => 'Have not data']));
    }
}