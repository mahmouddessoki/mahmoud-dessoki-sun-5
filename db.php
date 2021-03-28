<?php

    function getDbData($query) {
        $conn = mysqli_connect("localhost","root","","test")
            or die("cant connect to this database".mysqli_connect_error());
        
                    
        $result = mysqli_query($conn,$query);
        $data = mysqli_fetch_all($result);
        mysqli_close($conn);
        return $data;
    }


?>