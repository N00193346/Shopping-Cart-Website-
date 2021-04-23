<?php
namespace BookWorms\Model;

use Exception;
use PDO;

    class Order {
        public $id;
        public $customer_id;
        public $date;
        public $total;
  
    
        function __construct() {
            $this->id = null;
        }
    
        public function save() {
            try {
                $db = new DB();
                $db->open();
                $conn = $db->get_connection();
    
                $params = [
                    ":customer_id" => $this->customer_id,
                    ":date" => $this->date,
                    ":total" => $this->total
                 
                ];
                if ($this->id === null) {
                    $sql = "INSERT INTO orders (customer_id, date, total) VALUES (:customer_id, :date, :total)";
                }
                else {
                    $sql = "UPDATE orders SET customer_id = :customer_id, date = :date, total = :total WHERE id = :id" ;
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
                    throw new Exception("Failed to save order.");
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

        public static function findAll() {
            $orders = array();
    
            try {
                $db = new DB();
                $db->open();
                $conn = $db->get_connection();
    
                $select_sql = "SELECT * FROM orders";
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
                        $order = new Order();
                        $order->id = $row['id'];
                        $order->customer_id = $row['customer_id'];
                        $order->date = $row['date'];
                        $order->total = $row['total'];
                        $orders[] = $order;
    
                        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
                    }
                }
            }
            finally {
                if ($db !== null && $db->is_open()) {
                    $db->close();
                }
            }
    
            return $orders;
        }

        public static function findByCustomerId($customer_id) {
            $orders = null;
    
            try {
                $db = new DB();
                $db->open();
                $conn = $db->get_connection();
    
                $select_sql = "SELECT * FROM orders WHERE customer_id = :customer_id";
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
                        $order = new Order();
                        $order->id = $row['id'];
                        $order->customer_id = $row['customer_id'];
                        $order->date = $row['date'];
                        $order->total = $row['total'];
                        $orders[] = $order;
    
                        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
                    }
                }
            }
            finally {
                if ($db !== null && $db->is_open()) {
                    $db->close();
                }
            }
    
            return $orders;
        }
}
