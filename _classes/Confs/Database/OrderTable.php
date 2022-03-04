<?php 

namespace Confs\Database;

use Confs\Database\MySQL;
use PDO;
use PDOException;

class OrderTable
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }

    public function insert($data)
    {
        try{
            $query = "INSERT INTO orders (name,email,phone,address,status,createdDate,modifiedDate) VALUES (:name , :email, :phone , :address , 0 ,NOW(),NOW()) ";
            $statement = $this->db->prepare($query);
            $statement->execute($data);

            return $this->db->lastInsertId();

        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
    public function getAll()
    {
        $query = "SELECT * FROM orders";
        $statement = $this->db->query($query);
        return $statement->fetchAll();
    }
    public function update($data)
    {
        $query = "UPDATE orders SET status=:status, modifiedDate = NOW() WHERE id=:id";
        $statement = $this->db->prepare($query);
        $statement->execute($data);
        return $statement->rowCount();
    }
}