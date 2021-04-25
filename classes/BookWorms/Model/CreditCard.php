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
    public $customer_id;

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
                ":exp_year" => $this->exp_year,
                ":customer_id" =>$this->customer_id
            ];
            if ($this->id === null) {
                $sql = "INSERT INTO credit_card (type, name, card_number, cvc, exp_month, exp_year, customer_id) VALUES (:type, :name, :card_number, :cvc, :exp_month, :exp_year, :customer_id)";
            }
            else {
                $sql = "UPDATE credit_card SET type = :type, name = :name, card_number = :card_number, cvc = :cvc, exp_month = :exp_month, exp_year = :exp_year, customer_id = :customer_id WHERE id = :id";
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

    public static function findAll() {
        $credit_cards = array();

        try {
            $db = new DB();
            $db->open();
            $conn = $db->get_connection();

            $select_sql = "SELECT * FROM credit_card";
            $select_stmt = $conn->prepare($select_sql);
            $select_status = $select_stmt->execute();

            if (!$select_status) {
                $error_info = $select_stmt->errorInfo();
                $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
                throw new Exception("Database error executing database query: " . $message);
            }

            if ($select_stmt->rowCount() !== 0) {
                $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
                while ($row !== FALSE) {
                $credit_card = new CreditCard();
                $credit_card->id = $row['id'];
                $credit_card->type = $row['type'];
                $credit_card->name = $row['name'];
                $credit_card->card_number = $row['card_number'];
                $credit_card->exp_month = $row['exp_month'];
                $credit_card->exp_year = $row['exp_year'];
                $credit_cards[] = $credit_card;

                    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        }
        finally {
            if ($db !== null && $db->is_open()) {
                $db->close();
            }
        }

        return $credit_cards;
    }

    public static function findByCustomerId($customer_id) {
        $credit_cards = array();

        try {
            $db = new DB();
            $db->open();
            $conn = $db->get_connection();

            $select_sql = "SELECT * FROM credit_card WHERE customer_id = :customer_id";
            $select_params = [
                ":customer_id" => $customer_id
            ];
            $select_stmt = $conn->prepare($select_sql);
            $select_status = $select_stmt->execute($select_params);

            if (!$select_status) {
                $error_info = $select_stmt->errorInfo();
                $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
                throw new Exception("Database error executing database query: " . $message);
            }

            if ($select_stmt->rowCount() !== 0) {
                $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
                while ($row !== FALSE) {
                $credit_card = new CreditCard();
                $credit_card->id = $row['id'];
                $credit_card->type = $row['type'];
                $credit_card->name = $row['name'];
                $credit_card->card_number = $row['card_number'];
                $credit_card->exp_month = $row['exp_month'];
                $credit_card->exp_year = $row['exp_year'];
                $credit_cards[] = $credit_card;

                    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        }
        finally {
            if ($db !== null && $db->is_open()) {
                $db->close();
            }
        }

        return $credit_cards;
    }


    public static function findByCardNumber($card_number) {
        $credit_card = null;

        try {
            $db = new DB();
            $db->open();
            $conn = $db->get_connection();

            $select_sql = "SELECT * FROM credit_card WHERE card_number = :card_number";
            $select_params = [
                ":card_number" => $card_number
            ];
            $select_stmt = $conn->prepare($select_sql);
            $select_status = $select_stmt->execute($select_params);

            if (!$select_status) {
                $error_info = $select_stmt->errorInfo();
                $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
                throw new Exception("Database error executing database query: " . $message);
            }

            if ($select_stmt->rowCount() !== 0) {
                $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
                $credit_card = new CreditCard();
                $credit_card->id = $row['id'];
                $credit_card->type = $row['type'];
                $credit_card->name = $row['name'];
                $credit_card->card_number = $row['card_number'];
                $credit_card->exp_month = $row['exp_month'];
                $credit_card->exp_year = $row['exp_year'];
            
            }
        }
        finally {
            if ($db !== null && $db->is_open()) {
                $db->close();
            }
        }

        return $credit_card;
    }

    public static function findById($id) {
        $credit_card = null;

        try {
            $db = new DB();
            $db->open();
            $conn = $db->get_connection();

            $select_sql = "SELECT * FROM credit_card WHERE id = :id";
            $select_params = [
                ":id" => $id
            ];
            $select_stmt = $conn->prepare($select_sql);
            $select_status = $select_stmt->execute($select_params);

            if (!$select_status) {
                $error_info = $select_stmt->errorInfo();
                $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
                throw new Exception("Database error executing database query: " . $message);
            }

            if ($select_stmt->rowCount() !== 0) {
                $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
                $credit_card = new CreditCard();
                $credit_card->id = $row['id'];
                $credit_card->type = $row['type'];
                $credit_card->name = $row['name'];
                $credit_card->card_number = $row['card_number'];
                $credit_card->exp_month = $row['exp_month'];
                $credit_card->exp_year = $row['exp_year'];
            
            }
        }
        finally {
            if ($db !== null && $db->is_open()) {
                $db->close();
            }
        }

        return $credit_card;
    }
   
}
