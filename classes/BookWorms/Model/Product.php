<?php
namespace BookWorms\Model;

use Exception;
use PDO;

class Product {
    public $id;
    public $brand;
    public $model;
    public $price;
    public $description;
    public $image_id;
    public $category;

    function __construct() {
        $this->id = null;
    }

    public function save() {
        try {
            $db = new DB();
            $db->open();
            $conn = $db->get_connection();

            $params = [
                ":brand" => $this->brand,
                ":model" => $this->model,
                ":price" => $this->price,
                ":description" => $this->description,
                ":image_id" => $this->image_id,
                ":category" => $this->category
            ];
            if ($this->id === null) {
                $sql = "INSERT INTO products (brand, model, price, description, image_id, category) VALUES (:brand, :model, :price, :description, :image_id, :category)";
            }
            else {
                $sql = "UPDATE products SET brand = :brand, model = :model, price = :price, description = :description, image_id = :image_id, category = :category WHERE id = :id" ;
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
                throw new Exception("Failed to save product.");
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

                $sql = "DELETE FROM products WHERE id = :id" ;
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
                    throw new Exception("Failed to delete product.");
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
        $products = array();

        try {
            $db = new DB();
            $db->open();
            $conn = $db->get_connection();

            $select_sql = "SELECT * FROM products";
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
                    $product = new Product();
                    $product->id = $row['id'];
                    $product->brand = $row['brand'];
                    $product->model = $row['model'];
                    $product->price = $row['price'];
                    $product->description = $row['description'];
                    $product->image_id = $row['image_id'];
                    $product->category = $row['category'];
                    $products[] = $product;

                    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        }
        finally {
            if ($db !== null && $db->is_open()) {
                $db->close();
            }
        }

        return $products;
    }

    public static function findById($id) {
        $product = null;

        try {
            $db = new DB();
            $db->open();
            $conn = $db->get_connection();

            $select_sql = "SELECT * FROM products WHERE id = :id";
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
                $product = new Product();
                $product->id = $row['id'];
                $product->brand = $row['brand'];
                $product->model = $row['model'];
                $product->price = $row['price'];
                $product->description = $row['description'];
                $product->image_id = $row['image_id'];
                $product->category = $row['category'];
            }
        }
        finally {
            if ($db !== null && $db->is_open()) {
                $db->close();
            }
        }

        return $product;
    }

    public static function findByBrand($brand) {
        $product = null;

        try {
            $db = new DB();
            $db->open();
            $conn = $db->get_connection();

            $select_sql = "SELECT * FROM products WHERE brand = :brand";
            $select_params = [
                ":brand" => $brand
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
                $product = new Product();
                $product->id = $row['id'];
                $product->brand = $row['brand'];
                $product->model = $row['model'];
                $product->price = $row['price'];
                $product->description = $row['description'];
                $product->image_id = $row['image_id'];
                $product->category = $row['category'];
            }
        }
        finally {
            if ($db !== null && $db->is_open()) {
                $db->close();
            }
        }

        return $product;
    }

    public static function findByModel($model) {
        $product = null;

        try {
            $db = new DB();
            $db->open();
            $conn = $db->get_connection();

            $select_sql = "SELECT * FROM products WHERE model = :model";
            $select_params = [
                ":model" => $model
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
                $product = new Product();
                $product->id = $row['id'];
                $product->brand = $row['brand'];
                $product->model = $row['model'];
                $product->price = $row['price'];
                $product->description = $row['description'];
                $product->image_id = $row['image_id'];
                $product->category = $row['category'];
            }
        }
        finally {
            if ($db !== null && $db->is_open()) {
                $db->close();
            }
        }

        return $product;
    }

    public static function findByCategory($category) {
        $product = null;

        try {
            $db = new DB();
            $db->open();
            $conn = $db->get_connection();

            $select_sql = "SELECT * FROM products WHERE category = :category";
            $select_params = [
                ":model" => $model
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
                $product = new Product();
                $product->id = $row['id'];
                $product->brand = $row['brand'];
                $product->model = $row['model'];
                $product->price = $row['price'];
                $product->description = $row['description'];
                $product->image_id = $row['image_id'];
                $product->category = $row['category'];
            }
        }
        finally {
            if ($db !== null && $db->is_open()) {
                $db->close();
            }
        }

        return $product;
    }
}
