<?php
namespace Confs\Database;
use PDO;
use PDOException;
use Confs\Database\MySQL;

class BookTable
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }
    public function insert($data)
    {
        try{
            $query = "INSERT INTO books (title,author,summary,price,category_id,cover,createdDate,modifiedDate) VALUES (:title,:author,:summary,:price,:category_id,:cover,NOW(),NOW())";
            $statement = $this->db->prepare($query);
            $statement->execute($data);
            return $this->db->lastInsertId();
        }catch(PDOException $e){
            return $e->getMessage();
        }
        
    }
    public function getAll()
    {
        $query = "SELECT books.*,categories.name FROM books LEFT JOIN categories ON books.category_id = categories.id ORDER BY books.createdDate DESC"; 
        $statement = $this->db->query($query);
        return $statement->fetchAll();
    }

    public function delete($id)
    {
        $query = "DELETE FROM books WHERE id=:id ";
        $statement = $this->db->prepare($query);
        $statement->execute([":id"=>$id]);

    }

    public function findById($id)
    {
        $query = "SELECT * FROM books WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->execute([":id"=>$id]);

        $row = $statement->fetch();
        return $row ?? false;


    }

    public function update($data)
    {
        $query = "UPDATE books SET title=:title,author=:author,summary=:summary,price=:price,category_id=:category_id,cover=:cover,modifiedDate=NOW() WHERE id=:id";
        $statement = $this->db->prepare($query);
        $statement->execute($data);
        return $statement->rowCount();
    }

    public function findByCatId($id)
    {
        $query = "SELECT * FROM books WHERE category_id = :id";
        $statement = $this->db->prepare($query);
        $statement->execute([':id'=>$id]);

        $row = $statement->fetchAll();
        return $row ;
    }
}


?>