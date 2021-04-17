
<?php
class Account{
    public $db = null;
    public function __construct(DBControler $db){
        if(!isset($db->connection)) return null;
        $this->db = $db;
    }
    
    

}
