<?php
include('connection.php');

$sql = "select title,text from news";
$result = $mysqli->query($sql);

$news = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $news[] = $row;
    }
}

echo json_encode($news);
?>
