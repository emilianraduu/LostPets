	
<?php

$endpoint = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$requestHeaders = getallheaders();
$requestBodyAsString = file_get_contents('php://input');

preg_match('/^\/api\/season\/(.+)\/episode\/(.+)$/', $endpoint, $matches);

header('Content-type: text/html');

$file = './json/key.json';
$list = './json/list.json';
$access = false;

if (file_exists($file)) {
    $data = json_decode(file_get_contents($file));
}
echo $_SERVER['REQUEST_METHOD'];
foreach (getallheaders() as $name => $value) {
    if ($name === "Bearer")
        $sent_key = $value;
}
foreach ($data as $obj) {
    if ($sent_key === $obj->key) {
        if ($obj->uses > 0) {
            $obj->uses = $obj->uses - 1;
            file_put_contents($file, json_encode($data));
            http_response_code(200);
            echo "<h2> Your key is available ", $obj->uses, " more times </h2>";
            $access = true;
        } else {
            http_response_code(403);
            echo "<h2> Your key is no longer available. Please generate a new key.";
            $access = false;
            file_put_contents($file, json_encode($data));
        }
    } else {
        http_response_code(404);
        echo "<h2> Key not found </h2>";
        $access = false;
    }
}
if (file_exists($list)) {
    $tvshow = json_decode(file_get_contents($list));
}
echo json_encode($tvshow);
if ($access === true) {
    if ($method === "PUT") {
        echo json_encode($matches[1]);
        foreach (getallheaders() as $name => $value) {
            if ($name === "Title")
                echo json_encode($value);
        }
        foreach ($tvshow as $season) {
            // if ($season === $matches[1]) {
                echo "OK";
            // } else {
            //    echo "NOTOK";
            // }
        }
    }
}
?>