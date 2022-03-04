<?php 

namespace Confs\Database;

use PDO;
use PDOException;
use Confs\Database\MySQL;

class OrderItemTable
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }

    public function insert($id,$order_id,$qty){
        try{
            $query = "INSERT INTO order_items (book_id,order_id,qty) VALUES ($id,$order_id,$qty)";
            $statement = $this->db->prepare($query);
            $statement->execute();

            return $this->db->lastInsertId();

        }catch(PDOException $e)
        {
            return $e->getMessage();
        }
    }

    public function findByid($id)
    {
        $query = "SELECT order_items.* , books.title FROM order_items LEFT JOIN books ON order_items.book_id = books.id WHERE order_items.order_id = :order_id";
        $statement = $this->db->prepare($query);
        $statement->execute([
            ':order_id' => $id
        ]);
        return $statement->fetchAll();
    }
}