<?php
// $host = 'localhost';
// $username = 'root';
// $password = '';
// $database = '24hstore';
// $connection = mysqli_connect($host, $username, $password, $database);
// if(!$connection){
//     die("Failed".mysqli_connect_error());
// }
// //echo "Connect success";

class DBControler
{
    protected $host = 'localhost';
    protected $username = 'root';
    protected $password = '';
    protected $database = '24hstore';
    public $connection = null;
    public function __construct()
    {
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if ($this->connection->connect_error) {
            echo "Fail" . $this->connec_error;
        }
        // echo "connect success";
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    protected function closeConnection()
    {
        if ($this->connection != null) {
            $this->connection->close();
            $this->connection = null;
        }
    }
    
}
