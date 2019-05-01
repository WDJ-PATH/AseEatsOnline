<?php
class Cart extends DB {
  function details () {
  // details() : get details of items in cart

    // Empty
    if (count($_SESSION['cart'])==0) {
      return false;
    }

    // Get products in cart
    $sql = "SELECT * FROM `products` WHERE `product_id` IN (";
    $sql .= str_repeat('?,', count($_SESSION['cart']) - 1) . '?';
    $sql .= ")";
    return $this->fetch($sql, array_keys($_SESSION['cart']), "product_id");
  }


  function checkout ($name, $email) {
  // checkout() : checkout, create new order
  // PARAM $name : customer's name
  //       $email : customer's email address

    // Init

    $roll=$_SESSION['roll'];
    $total=$_SESSION['total'];
    $token =  rand(1,200);
    $sql1="SELECT * FROM `token`";
    $result = $mysqli->query($sql1);
    while($row = $result->fetch_assosc()){
      if($token === $row['token']){
        $token= rand(1,200);
      }
      else{
        break;
      }
    }
    $this->start();

    // Create the order entry first
    $pass = $this->exec(
      "INSERT INTO `orders` (`token`, `roll`, `name`, `email`, `total_price`) VALUES (?, ?, ?, ?, ?);",
      [$token, $roll, $name, $email, $total]
    );

    // Insert the items
    if ($pass) {
      $sql = "INSERT INTO `orders_items` (`order_id`, `product_id`, `quantity`) VALUES ";
      $cond = [];
      foreach ($_SESSION['cart'] as $id=>$qty) {
        $sql .= "(?, ?, ?),";
        array_push($cond, $this->lastID, $id, $qty);
      }
      $sql = substr($sql, 0, -1) . ";";
      $pass = $this->exec($sql, $cond);
    }

    // Finalize
    $this->end($pass);
    return $pass;
  }

  function get ($id) {
  // get () : get order
  // PARAM $id : order ID

    $order = $this->fetch(
      "SELECT * FROM `orders` WHERE `order_id`=?", [$id]
    );
    $order['items'] = $this->fetch(
      "SELECT * FROM `orders_items` LEFT JOIN `products` USING (`product_id`) WHERE `orders_items`.`order_id`=?", 
      [$id], "`product_id`"
    );
    return $order;
  }
}
?>