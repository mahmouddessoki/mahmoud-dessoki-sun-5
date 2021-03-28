<html>
    <!--getting product name-->
    <form action="product-quantity-orderded.php" method="get">

        <label for="product">product_Name</label>
        <input type="text" name="productName" id="product">
        <input type="submit" value="submit" name="submit">
    </form>

    


</html>

<?php
    require("db.php");
     //handle submitted product name
    if((isset($_GET['submit']) && $_GET['productName'] != null)) {
        $product_name =$_GET['productName'];
       
        $query = "select sum(quantityOrdered) as total_number_of_pieces
                    from orderdetails
                    where productCode = (
                    select productCode from products
                    where productName = '$product_name' )";
                    
        $quantity = getDbData($query);
        if($quantity[0][0]) {
            echo "<br> total_number_of_pieces = {$quantity[0][0]} piece";
        } else {
            echo "can not found such product";
        }
    }
    


?>

