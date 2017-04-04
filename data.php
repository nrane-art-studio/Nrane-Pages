<?php
// DB Connection
    require_once ('connection.php');


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty($_POST['first_name'])) {
        $nameErr = "Պարտադիր է";
    }  else {
        $fname = $_POST['first_name'];
        // check if name only contains letters and whitespace
        if (preg_match("/^[a-zA-Z ]*$/",$fname)) {
            echo $fname."<br>";
            echo strtolower($fname)."<br>";
            echo $fname."<br>";
            echo ucfirst($_POST['first_name'])."<br>";
            echo $fname."<br>";
        } else {
            $nameErr = "Թույլատրվում է միայն մեծատառ կամ փոքրատառ տառեր"; 
        }
    }
}


if(isset($_POST['intouch'])) {
    $intouch = $_POST['intouch'];
} else {
    $intouch = "no";
}

if (!empty($fname)) {
    $send = $con->prepare("INSERT INTO users (fname, intouch, date) VALUES ('$fname', '$intouch', now())");
    $send->execute();
} else {
    echo "Դատարկա";
}

if (isset($send)) {
    echo "Թամամա";
} else {
    echo "<hr>Error";
}
?>