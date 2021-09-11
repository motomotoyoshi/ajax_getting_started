<?php
$filename= 'data.json';
$name = !empty($_POST['userName']) ? $_POST['userName'] : 'no name';
$computedString = "Hi, ". $name;

if (is_writeable($filename)) {
    $data['userName'] = $name;
    $data['computedString'] = $computedString;

    $handle = fopen($filename, "w");
    $filesize = filesize($filename);
    fwrite($handle, json_encode($data));
    fclose($handle);

    echo json_encode($data);
}
