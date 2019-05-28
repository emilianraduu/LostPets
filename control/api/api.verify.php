	
<?php

$endpoint = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$requestHeaders = getallheaders();
$requestBodyAsString = file_get_contents('php://input');
$requestBodyAsString = json_decode($requestBodyAsString);

preg_match('/^\/api\/season\/(.+)\/episode\/(.+)$/', $endpoint, $matches);
header('Content-type: application/json');

$file = './json/key.json';
$list = './json/list.json';
$access = false;

if (file_exists($file)) {
    $data = json_decode(file_get_contents($file));
}
foreach (getallheaders() as $name => $value) {
    if ($name === "Bearer")
        $sent_key = $value;
}
foreach ($data as $obj) {
    if ($sent_key === $obj->key) {
        if ($obj->uses > 0) {
            $obj->uses = $obj->uses - 1;
            file_put_contents($file, json_encode($data));
            $access = true;
            http_response_code(200);
            // echo "<h2> Your key is available ", $obj->uses, " more times </h2>";
        } else {
            // http_response_code(403);
            // echo "<h2> Your key is no longer available. Please generate a new key. </h2>";
            unset($obj->key);
            unset($obj->uses);
            file_put_contents($file, json_encode($data));
        }
    } else {
        // http_response_code(404);
    }
}
if (file_exists($list)) {
    $tvshow = json_decode(file_get_contents($list));
}
if ($access) {
    if ($method === "PUT") {
        
        if($matches[1] && $matches[2])
            {
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
    }
}
function checkSeason($s){
   echo $s;
}
?>