<?php
class Product{
    public $db = null;
    public function __construct(DBControler $db){
        if(!isset($db->connection)) return null;
        $this->db = $db;
    }
    public function getData($table='product'){
        $result = $this->db->connection->query("SELECT * FROM {$table}");
        $resultArray = array();
        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function getData_sale($table='product_sale'){
        $result = $this->db->connection->query("SELECT * FROM {$table}");
        $resultArray = array();
        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function getData_special($table='product_special'){
        $result = $this->db->connection->query("SELECT * FROM {$table}");
        $resultArray = array();
        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }
}
?>