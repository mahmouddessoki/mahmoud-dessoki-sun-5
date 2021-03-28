<html>
    <!--getting product name-->
    <form action="search-customers.php" method="get">

        <label for="search">search_keyword</label>
        <input type="text" name="search" id="search">
        <input type="submit" value="submit" name="submit">
    </form>
</html>

<?php
    require("db.php");
     //handle submitted product name
     $names = [];
    if((isset($_GET['submit']) and $_GET['search'] != null)) {
        $search_keyword =$_GET['search'];
        $query = "select customerName from customers
                    where customerName like '%$search_keyword%'";
                    
        $names = getDbData($query);
        displayOrders($names);
    }
?>

<?php function displayOrders($names) { ?>
        <html>
            <style>
                table,th,td {
                    border : 1px solid black;
                    text-align:center;
                }
            </style>
            <?php if (count($names) > 0) { ?>
                <table>
                    <thead>
                        <th>index</th>
                        <th>customerName</th>
                    </thead>
                    <tbody>
                        <?php foreach ($names as $key => $name) { ?>
                            <tr>
                                <td><?=$key+1?></td>
                                <td><?=$name[0]?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <p>no results found</p>
            <?php } ?>  

        </html>
<?php } ?>