	
<?php

$key = md5(microtime().rand());

header('Content-type: application/json');


$obj = (object)[
    'key' => $key,
    'uses' => 5
];

$file = './json/key.json';

if (file_exists($file)) {
    $data = json_decode(file_get_contents($file));
    array_push($data, $obj);
    http_response_code(200);
    echo "Your key is ", $key, " and it's available for 5 uses.";
    file_put_contents($file, json_encode($data));
}
else {
    http_response_code(404);
}

?>