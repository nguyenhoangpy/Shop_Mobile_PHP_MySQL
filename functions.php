<?php
 require_once("./DB/DBControler.php");
 require_once("./DB/Product.php");
 $db = new DBControler();
 $product = new Product($db);
//  $product-> getData();
 
 
