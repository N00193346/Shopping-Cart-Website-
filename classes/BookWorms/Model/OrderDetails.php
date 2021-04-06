<?php
namespace BookWorms\Model;

use Exception;
use PDO;

    class OrderDetails {
        public $id;
        public $order_id;
        public $product_id;
        public $quantity;
  
    
        function __construct() {
            $this->id = null;
        }
    
        public function save() {
            try {
                $db = new DB();
                $db->open();
                $conn = $db->get_connection();
    
                $params = [
                    ":order_id" => $this->order_id,
                    ":product_id" => $this->product_id,
                    ":quantity" => $this->quantity
                 
                ];
                if ($this->id === null) {
                    $sql = "INSERT INTO order_details (order_id, product_id, quantity) VALUES (:order_id, :product_id, :quantity)";
                }
                else {
                    $sql = "UPDATE order_details SET order_id = :order_id, product_id = :product_id, quantity = :quantity WHERE id = :id" ;
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
                    throw new Exception("Failed to save order details.");
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
}
