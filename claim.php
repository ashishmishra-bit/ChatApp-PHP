<?php

//getting the value of post parameter.
$room = $_POST['room'];

//checking for string size
if (strlen($room)>20 or strlen($room)<2) {
    $message = "Please choose appropriate room name between 2 to 20 character";
    echo '<script language="javascript">';
    echo 'alert("'.$message.'");';
    echo 'window.location="http://localhost/chatroom";';
    echo '</script>';
}
//checking were thre roomname is alpha numeric or not.
else if (!ctype_alnum($room)) {
    $message = "Please choose an alphanumeric room name";
    echo '<script language="javascript">';
    echo 'alert("'.$message.'");';
    echo 'window.location="http://localhost/chatroom";';
    echo '</script>';
}
else {
    //connecting to database
    include 'db_connect.php';
}

// Check if the room exists or not ;

$sql = "SELECT * FROM `rooms` WHERE roomname = '$room'";
$result = mysqli_query($conn, $sql);
if ($result) {
    if (mysqli_num_rows($result)>0) {
         $message = "Please choose a different room; this room is taken";
        echo '<script language="javascript">';
        echo 'alert("'.$message.'");';
        echo 'window.location="http://localhost/chatroom";';
        echo '</script>';
    }

    else{
        $sql= "INSERT INTO `rooms` ( `roomname`, `stime`) VALUES ( '$room', current_timestamp); ";
        if (mysqli_query($conn , $sql)) {
            $message = "Your Room is ready";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/chatroom/rooms.php?roomname='.$room.'";';
            echo '</script>';
        }
    }
}

else {
    echo "Error: ".myslqi_error($conn);
}

?>