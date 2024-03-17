<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['title'], $_POST['text'])) {
        $title = $_POST['title'];
        $text = $_POST['text'];

        $insert_statement = $mysqli->prepare('insert into news (title, text) VALUES (?, ?)');
        $insert_statement->bind_param('ss', $title, $text);

        if ($insert_statement->execute()) {
            $response= array("success"=> true, "message"=>"News added successfully");
            echo json_encode($response);
        } else {
            $response=array("success"=>false,"message"=>"error: ".$insert_statement->error);
            echo json_encode($response);
        }
    } else {
        $response=array("success"=>false,"message"=>"incomplete form");
        echo json_encode($response);
    }
} else {
    $response=array("success"=>false,"message"=>"error occured");
    echo json_encode($response);
}
?>