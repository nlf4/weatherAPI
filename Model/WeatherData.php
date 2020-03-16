<?php


class WeatherData
{


    public function callAPI($method, $url, $data){
        $curl = curl_init();
        switch ($method){
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }
        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'APIKEY: 624aded532fa0e6e9b62b7ab0cf510ed',
            'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // EXECUTE:
        $result = curl_exec($curl);
        if(!$result){die("Connection Failure");}
        curl_close($curl);
        return $result;
    }

    public function renderTemp($city){
        $get_data = $this->callAPI('GET', 'api.openweathermap.org/data/2.5/weather?q='.$city.'&APPID=624aded532fa0e6e9b62b7ab0cf510ed', false);
        $response = json_decode($get_data, true);
        $temp = ($response['main']['temp']) -273.15;
        return round($temp)."°C<br>";
    }

    public function renderWeather($city){
        $get_data = $this->callAPI('GET', 'http://api.openweathermap.org/data/2.5/weather?q='.$city.'&APPID=624aded532fa0e6e9b62b7ab0cf510ed&lang=nl', false);
        $response = json_decode($get_data, true);
        $weather = ($response['weather'][0]['description']);
        return $weather;
    }

}