<?php

class Category{
    //db stuff
    private $conn;
    private $table = "categories";

    //category properties
    public $id;
    public $name;
    public $create_at;

    //constructor with db connection
    public function __construct($db){
        $this->conn = $db;
    }

    //getting category from our database
    public function read(){

        $query = 'SELECT *
        FROM
        '.$this->table;

        //prepare statement
        $stmt = $this->conn->prepare($query);
        //excute query
        $stmt->execute();
        return $stmt;
    }

}
   
?>

