<?php
namespace BookWorms\Model;

use Exception;
use PDO;

class CreditCard {
    public $id;
    public $type;
    public $name;
    public $card_number;
    public $cvc;
    public $exp_month;
    public $exp_year;

    function __construct() {
        $this->id = null;
    }

    public function save() {
        try {
            $db = new DB();
            $db->open();
            $conn = $db->get_connection();

            $params = [
                ":type" => $this->type,
                ":name" => $this->name,
                ":card_number" => $this->card_number,
                ":cvc" => $this->cvc,
                ":exp_month" => $this->exp_month,
                ":exp_year" => $this->exp_year
            ];
            if ($this->id === null) {
                $sql = "INSERT INTO credit_card (type, name, card_number, cvc, exp_month, exp_year) VALUES (:type, :name, :card_number, :cvc, :exp_month, :exp_year)";
            }
            else {
                $sql = "UPDATE credit_card SET type = :type, name = :name, card_number = :card_number, cvc = :cvc, exp_month = :exp_month, exp_year = exp_year WHERE id = :id" ;
                $params[":id"] = $this->id;
            }
            $stmt = $conn->prepare($sql);
            $status = $stmt->execute($params);

            if (!$status) {
                $error_info = $stmt->errorInfo();
                $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
                throw new Exception("Database error executing database query: " . $message);
            }

            if ($stmt->rowCount() !== 1) {
                throw new Exception("Failed to save credit card.");
            }

            if ($this->id === null) {
                $this->id = $conn->lastInsertId();
            }
        }
        finally {
            if ($db !== null && $db->is_open()) {
                $db->close();
            }
        }
    }

    public function delete() {
        $db = null;
        try {
            if ($this->id !== null) {
                $db = new DB();
                $db->open();
                $conn = $db->get_connection();

                $sql = "DELETE FROM credit_card WHERE id = :id" ;
                $params = [
                    ":id" => $this->id
                ];
                $stmt = $conn->prepare($sql);
                $status = $stmt->execute($params);

                if (!$status) {
                    $error_info = $stmt->errorInfo();
                    $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
                    throw new Exception("Database error executing database query: " . $message);
                }

                if ($stmt->rowCount() !== 1) {
                    throw new Exception("Failed to delete credit card.");
                }
            }
        }
        finally {
            if ($db !== null && $db->is_open()) {
                $db->close();
            }
        }
    }

   
}
