
<html>
    <!--getting number of products-->
    <form action="latest-orders.php" method="get">

        <label for="orders">number_of_orders</label>
        <input type="number" name="numOfOrders" id="orders">
        <input type="submit" value="submit" name="submit">
    </form>

    


</html>

<?php
    $orders = [];
    require("db.php");
     //handle submitted number
    if((isset($_GET['submit']) )){
        $number_of_orders = ($_GET['numOfOrders'] != null && 
                        $_GET['numOfOrders'] > 0?
                        $_GET['numOfOrders'] : 0);
        $query = "select * from orders
                order by orderDate DESC
                limit $number_of_orders";
        $orders = getDbData($query);
        displayOrders($orders);
        
    }
    
    


?>

<?php function displayOrders($orders) { 
    $attributes = ["index","orderNumber","orderDate","requiredDate",
    "shippedDate","status","comments","customerNumber"];?>
    <html>
            <!--display n latest orders-->
            <style>
                table,th,td {
                    border : 1px solid black;
                    text-align:center;
                }
            </style>
            <?php if (count($orders) > 0) { ?>
                <table>
                    <thead>
                        <?php foreach ($attributes as $attr) { ?>
                            <th><?=$attr?></th>
                        <?php } ?>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $key => $order) { ?>
                            <tr>
                            <td><?=$key+1?></td>
                            <?php foreach ($order as $k => $val) { ?>              
                                <td><?=$orders[$key][$k] ?? "null";?></td>
                            
                            <?php } ?>
                            </tr>
                        <?php } ?> 
                    </tbody>

                </table>
            <?php } else { ?>
                <p>no results found</p>
            <?php } ?>  

    </html>
<?php } ?>



