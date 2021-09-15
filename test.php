<?php
$filename= 'data.json';
$name = !empty(file_get_contents('php://input'))? file_get_contents('php://input'): 'no name';
$computedString = "Hi, ". $name;

if (is_writeable($filename)) {
    $data['userName'] = $name;
    $data['computedString'] = $computedString;
    file_put_contents($filename, json_encode($data, JSON_UNESCAPED_UNICODE));

    echo json_encode($data);
}
