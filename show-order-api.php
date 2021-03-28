<html>
    <!--getting number of products-->
    <form action="show-order-api.php" method="get">

        <label for="order">order_number</label>
        <input type="number" name="orderNumber" id="order">
        <input type="submit" value="submit" name="submit">
    </form>

    


</html>

<?php
     //handle submitted product name
    if((isset($_GET['submit']) && $_GET['orderNumber'] != null)) {
        $order_number = $_GET['orderNumber'];
        $conn = mysqli_connect("localhost","root","","test")
            or die("cant connect to this database".mysqli_connect_error());
        $query = "select orderDate, requiredDate, shippedDate, status,
                     comments,customerNumber
                     from orders
                     where orderNumber = '$order_number'";
                    
        $result = mysqli_query($conn,$query);
        $orderData = mysqli_fetch_assoc($result);
        if ($orderData == []) {
            echo "no result found";
            
        } else {
            echo " order data are :- <br> ==>".json_encode($orderData); 
        }
        mysqli_close($conn);

        
    }
    


?>