<?php
    $con=mysqli_connect('localhost','root','','covid19_db');
    $query = "SELECT * FROM doctor";
    $result=mysqli_query($con,$query);
    echo "<html>
            <h1>List of Doctors</h1>";
    while($row=mysqli_fetch_array($result))
        echo "ID:".$row['0'] . "<br> Doctor Name:   ". $row['1']. "<br>  Phone Number:   ". $row['2']."<br>
                Shift:    ".$row['3']."<br> Fax Number:     ".$row['4']."<br> Specialisation:    ".$row['5']."<br><br>";    
    echo "</html>";
?>