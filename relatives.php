<?php
 $patientID=$_GET['patid']; 
if (isset($_GET['set'])) {
    if (isset($_POST['relatives'])) {
        echo "<html>";
        $con=mysqli_connect('localhost','root','','covid19_db');
        $patient=$_POST['patID'];
        for ($i = 1; $i < $_POST['num'] + 1; $i++) {
            $str = "name$i";
            $name = $_POST[$str];
            $str = "p_no$i";
            $p_no = $_POST[$str];
            $str = "address$i";
            $address = $_POST[$str];
            $str = "city$i";
            $city = $_POST[$str];
            $str = "pin$i";
            $pin = $_POST[$str];
            $query="INSERT into relatives(relative_name,Phone_no,house_address,city,pin,patient_id) 
    values('$name','$p_no','$address','$city','$pin','$patient')";
            mysqli_query($con,$query);
            echo "
                    Relative $i
                    <br>
                    <br>
                    Name: $name
                    <br>
                    Phone Number: $p_no
                    <br>
                    Address: $address
                    <br>
                    City: $city
                    <br>
                    Pin: $pin
                    <br>
                    <br>";
        }
        echo "</html>";
    }
} else
if (isset($_GET['num'])) {
    $num = $_GET['num'];
    echo "<html>
                <form action='relatives.php?set=1' method='POST'>
                List the details of all your relatives.
                <br>
                <br>
                ";
    ?>
    <?php
    for ($i = 1; $i < $num + 1; $i++) {
        echo "
            Relative: $i
            <br>
            <br>
            Name:    
            <input type='text' name='name$i' id='name$i' placeholder='Enter Name'>
            <br>
            Phone Number:
            <input type='text' name='p_no$i' id='p_no$i' placeholder='Enter Phone Number'>
            <br>
            House Address:  
            <input type='text' name='address$i' id='address$i' placeholder='Enter address'>
            <br>
            City:   
            <input type='text' name='city$i' id='city$i' placeholder='Enter City'>
            <br>
            Pin Code:   
            <input type='text' name='pin$i' id='pin$i' placeholder='Enter Pin'>
            <br>
            <input type='hidden' name='patID' id='patID' value ='$patientID' >
            <br>";
    }
    echo "      <input type='hidden' name='num' id='num' value='$num'>
                <button type='submit' name='relatives'>Submit</button>
                </form>
            </html>";
}
 else {
    echo "<html>
    <form action='relatives.php' method='POST'>
        How many relatives did you meet recently?
        <br>
        <br>
        <input type='text' name='num_relatives' id='num_relatives' placeholder='Enter Number'>
        <br>
        <br>
        <button type='submit' name='_relatives'>Submit</button>
    </form>
    </html>";
}
    if($_GET['set']==1)
    {
        echo 'hey';
        // $con=mysqli_connect('localhost','root','','covid19_db');
        header("location:home.php");
    }

?>