<?php



function functieGenerica($method, $url, $payload = '')
{
    $req = curl_init($url);

    $headers = array(
        'Content-Type:application/json',
        'Accept: application/json'
    );

    curl_setopt($req, CURLOPT_CUSTOMREQUEST, $method);
    // curl_setopt($req, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($req, CURLOPT_POSTFIELDS, json_encode($payload));
    curl_setopt($req, CURLOPT_RETURNTRANSFER, 1);

    $responseBody = curl_exec($req);
    $responseCode = curl_getinfo($req)['http_code'];
    $obj = (object)[
        "body" => $responseBody,
        "code" => $responseCode
    ];
    curl_close($req);
    return $obj;
}

$responseBody = json_decode($responseBody);
if ($_SERVER['REQUEST_METHOD'] == "GET" and isset($_POST['latlong'])) {
    $obj = functieGenerica('POST', 'http://iampava.com/got_api/episodes');
    $bodyGet = json_decode($obj->body);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $url = "./add/" . $_POST['ID'] . '/coord/' . $_POST['lat'] . '/' . $_POST['lng'];
    $payload = (object)[
        "id" => $_POST['ID'],
        "lat" => $_POST['lat'],
        "lng" => $_POST['lng']
    ];
    functieGenerica("PUT", $url, $payload);
}
if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['x'])) {
    $url = "http://iampava.com/got_api/season/" . $_POST['season'] . '/episode/' . $_POST['episode'];
    functieGenerica("DELETE", $url);
    include_once "./index.php";
}
