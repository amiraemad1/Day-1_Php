<?php

session_start();
$fileContents = file_get_contents("log.txt");
$records = explode("\n", $fileContents);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
     content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>log history</title>
</head>
<style>
* {
    box-sizing: border-box;
}

.empty {
    text-align: center;
    margin-bottom: 20px;
}
.message {
    
    width: 400px;
    padding: 15px 25px;
    border-radius: 3px;
}
</style>
<body>

<?php
    if (count($records) === 0) {
        echo "<div class='empty'>History is Empty</div>";
    } else {
        foreach ($records as $record) {
            if (empty(trim($record))) {
                continue;
            }
            $vars = explode(",", $record);
            echo "<div class='message'>";
            echo "<p><span>Visit Date: </span><span>$vars[0], $vars[1]</span></p>";
            echo "<p><span>IP: </span><span>$vars[2]</span></p>";
            echo "<p><span>Name: </span><span>$vars[3]</span></p>";
            echo "<p><span>Email: </span><span>$vars[4]</span></p>";
            echo "</div>";
        }
    }
?>
</body>
</html>