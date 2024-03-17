<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['title'], $_POST['text'])) {
        $title = $_POST['title'];
        $text = $_POST['text'];

        $insert_statement = $mysqli->prepare('insert into news (title, text) VALUES (?, ?)');
        $insert_statement->bind_param('ss', $title, $text);

        if ($insert_statement->execute()) {
            echo "News added successfully";
        } else {
            echo "Error: " . $insert_statement->error;
        }
    } else {
        echo "Incomplete form data";
    }
} else {
    echo "Form submission error";
}
?>