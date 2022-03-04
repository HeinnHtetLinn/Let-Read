<?php 

namespace Confs\Database;

use Confs\Database\MySQL;
use PDO;
use PDOException;

class CategoryTable
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }

    public function insert($data)
    {
        try{
            $query = "INSERT INTO categories (name,remark,createdDate,modifiedDate) VALUES (:name, :remark, NOW(),NOW())";
            $statement = $this->db->prepare($query);
            $statement->execute($data);

            return $this->db->lastInsertId();

        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function getAll()
    {
        try{
            $query = "SELECT * FROM categories";
            $statement = $this->db->query($query);
            return $statement->fetchAll();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
    public function delete($id)
    {
        $statement = $this->db->prepare("DELETE FROM categories WHERE id = :id");
        $statement->execute([':id' => $id]);

    }
    public function findById($id)
    {
        $statement = $this->db->prepare("SELECT * FROM categories WHERE id = :id");
        $statement->execute([':id'=>$id]);
        $row = $statement->fetch();
        return $row ?? false;
    }
    public function update($data)
    {
        $statement =$this->db->prepare("UPDATE categories SET name=:name , remark=:remark WHERE id=:id ");
        $statement->execute($data);
        return $statement->rowCount();
    }
}