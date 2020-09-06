<?php
    $con=mysqli_connect('localhost','root','','covid19_db');
    $query = "SELECT * FROM medical_repository";
    $result=mysqli_query($con,$query);
    echo "<html>
            <h1>List of Medicines</h1>";
    while($row=mysqli_fetch_array($result))
        echo "Item Number:   ".$row['0'] . "<br> Name:   ". $row['1']. "<br>  Quantity:   ". $row['2']."<br>
                Hospital ID:    ".$row['3']."<br><br>";    
    echo "</html>";
?>