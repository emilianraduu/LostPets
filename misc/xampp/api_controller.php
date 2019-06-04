<?php 
    


    function functieGenerica($method, $url, $payload = ''){
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
        return $obj;
        curl_close($req);
    }
    $responseBody = json_decode($responseBody);
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit']))
    {
        $obj=functieGenerica('GET','http://iampava.com/got_api/episodes');
        $bodyGet = json_decode($obj->body);
        include_once "./index.php";
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['season']))
    {
        $url = "http://iampava.com/got_api/season/".$_POST['season'].'/episode/'.$_POST['episode'];
        $payload = (object)[
            "title" => $_POST['title'],
            "duration" => (int)$_POST['duration']
        ];
        functieGenerica("PUT", $url,$payload);
        include_once "./index.php";
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['x']))
    {
        $url = "http://iampava.com/got_api/season/".$_POST['season'].'/episode/'.$_POST['episode'];
        functieGenerica("DELETE", $url);
        include_once "./index.php";
    }
?>
