<?php
    $ipFromApi = file_get_contents('https://api.ipify.org?format=json');
    $ip = json_decode($ipFromApi)->ip;
    $apiKey = "985f3eb3fa714ebbacf9465bf395bf1b";
    $location = get_geolocation($apiKey, $ip);
    $decodedLocation = json_decode($location, true);
    
     echo 'region: '. $decodedLocation['continent_name'].', country:'.$decodedLocation['country_name'].', phone code:'.$decodedLocation['calling_code'];
      

    function get_geolocation($apiKey, $ip, $lang = "en", $fields = "*", $excludes = "") {
        $url = "https://api.ipgeolocation.io/ipgeo?apiKey=".$apiKey."&ip=".$ip."&lang=".$lang."&fields=".$fields."&excludes=".$excludes;
        $cURL = curl_init();

        curl_setopt($cURL, CURLOPT_URL, $url);
        curl_setopt($cURL, CURLOPT_HTTPGET, true);
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json'
        ));
        return curl_exec($cURL);
    }
    
   
?>