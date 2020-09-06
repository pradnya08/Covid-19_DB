<?php
    $con=mysqli_connect('localhost','root','','covid19_db');
    $query = "SELECT * FROM medicine";
    $result=mysqli_query($con,$query);
    echo "<html>
            <h1>List of Medicines</h1>";
    while($row=mysqli_fetch_array($result))
        echo "Medicine Number:   ".$row['0'] . "<br> Name:   ". $row['1']. "<br>  Quantity:   ". $row['2']."<br>
                Price:    ".$row['3']."<br> Concentration:     ".$row['4']."<br> Expiry Date:    ".$row['5']."<br><br>";    
    echo "</html>";
?>