<?php
ini_set("error_reporting", E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

require_once "lib/autoload.php";

$css = array( "style.css");
$VS->BasicHead($css);

$cities = $Container->getCityLoader()->Load();
$template = $VS->LoadTemplate("steden");

$MS->ShowMessages();

//WEATHER API

//curl in ViewService
//print $VS->renderTemp($city->getName);
//print $VS->renderTemp("Paris");
//print_r($VS->renderWeather("London"));


//curl
//$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, "http://api.openweathermap.org/data/2.5/weather?q=London,uk&APPID=624aded532fa0e6e9b62b7ab0cf510ed");
//curl_setopt($ch, CURLOPT_POST, 1);
////curl_setopt($ch, CURLOPT_POSTFIELDS, data);
//$result = curl_exec($ch);
//$res = json_decode($result);
//$ans = file_get_contents($res);
//
////print_r($result['main']['temp']);
//var_dump($ans['main']['temp']);
//var_dump($ans['temp']);
//curl_close($ch);

//other way

//$url = "http://api.openweathermap.org/data/2.5/weather?q=London,uk&APPID=624aded532fa0e6e9b62b7ab0cf510ed";
//
//$contents = file_get_contents($url);
//$result = json_decode($contents, true);
//
//foreach($result['list'] as $data) {
//    var_dump($data['main']['temp_min']);



?>
<!--<script>-->
<!--    $(document).ready(function() {-->
<!--        var weatherAPI = 'http://api.openweathermap.org/data/2.5/weather?q=London,uk&APPID=624aded532fa0e6e9b62b7ab0cf510ed';-->
<!--        var data = {-->
<!--            q: "London"-->
<!--            units : "metric"-->
<!--        };-->
<!--    console.log(data);-->
<!--    });-->
<!---->
<!--</script>-->



<body>

<div class="jumbotron text-center">
    <h1>Leuke plekken in Europa</h1>
    <p>Tips voor citytrips voor vrolijke vakantiegangers!</p>
</div>

<?php $VS->PrintNavBar( $Container->getDBM() ); ?>

<div class="container">
    <div class="row">

        <?php
        print $VS->ReplaceCities( $cities, $template);
        ?>

    </div>
</div>

</body>
</html>