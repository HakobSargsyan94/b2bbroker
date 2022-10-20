<?php

namespace src\api\v1;

class Accounts
{
    private $accountsdata;

    public function __construct () {
        $this->accountsdata = [
            ['id' => 1, 'name' => 'Jackob', 'phone' => '+37477050095'],
            ['id' => 2, 'name' => 'Sam', 'phone' => '+37477060095'],
            ['id' => 3, 'name' => 'Dave', 'phone' => '+37477070095'],
            ['id' => 4, 'name' => 'Simon', 'phone' => '+37477440095'],
            ['id' => 5, 'name' => 'Arthur', 'phone' => '+37477555095'],
            ['id' => 6, 'name' => 'Mary', 'phone' => '+37477050066'],
        ];

        if (isset($_GET['getAccounts']) && !empty($_GET['getAccounts']) && $_GET['getAccounts'] == 1) {
            $this->getAllAccounts();
        } else if (isset($_GET['getAccountById']) && !empty($_GET['getAccountById']) && $_GET['getAccountById'] == 1) {
            $this->getAccount($_GET['getAccountById']);
        } else {
            die('Set data');
        }
    }

    private function getAllAccounts (): string {
        if ($this->accountsdata) {
            die (json_encode($this->accountsdata));
        }

        die(json_encode(['status' => 404, 'error_message' => 'Have not data']));
    }

    private function getAccount (int $id): string {
        if ($this->accountsdata) {
            $accontInfo = [];
            foreach ($this->accountsdata as $account) {
                if ($account['id'] == $id) {
                    $accontInfo[] = $account;
                }
            }
            die (json_encode($accontInfo));
        }

        die(json_encode(['status' => 404, 'error_message' => 'Have not data']));
    }

}