<?php
$filename= 'data.json';
$name = !empty($_POST['userName']) ? $_POST['userName'] : 'no name';
$computedString = "Hi, ". $name;
$array = [
    'userName' => $name,
    'computedString' => $computedString
];
if(is_readable($filename)){

    $data = json_decode(mb_convert_encoding(file_get_contents($filename), 'UTF-8',  'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN'), true);
    
    if($data['computedString'] == $computedString) {
        echo json_encode($data);
    } else {
        if (is_writeable($filename)) {
            $data['userName'] = $name;
            $data['computedString'] = $computedString;

            $handle = fopen($filename, "w");
            $filesize = filesize($filename);
            fwrite($handle, json_encode($data));
            fclose($handle);
            
            echo json_encode($data);
        } else {
            echo json_encode("not writeable.");
        }
    }
}
