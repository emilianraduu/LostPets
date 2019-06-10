	
<?php

$endpoint = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$requestHeaders = getallheaders();
$requestBodyAsString = file_get_contents('php://input');
$requestBodyAsString = json_decode($requestBodyAsString);

preg_match('/^\/api\/add\/(.+)\/episode\/(.+)$/', $endpoint, $matches);
header('Content-type: application/json');

foreach (getallheaders() as $name => $value) {
    if ($name === "Bearer")
        $sent_key = $value;
}


if ($method === "POST") {
    $details = (object)[
        'title' =>  $requestBodyAsString->title,
        'lenght' => $requestBodyAsString->duration
    ];
    $obj = (object)[
        'season' => $matches[1],
        'episode' => $matches[2],
        'details' => $details
    ];
    array_push($tvshow, $obj);
    file_put_contents($list, json_encode($tvshow));
}

?>