<?php
// توکن ربات تلگرام خود را جایگزین کنید
$botToken = "7597274110:AAHalHn4bwUQYVtzbD5wbd88MMB5vCl1v6M";
$website = "https://api.telegram.org/bot" . $botToken;

// دریافت داده‌های ورودی از تلگرام
$update = file_get_contents("php://input");
$updateArray = json_decode($update, true);

if (isset($updateArray["message"])) {
    $chatId = $updateArray["message"]["chat"]["id"];
    $message = $updateArray["message"]["text"];

    if ($message == "/start") {
        // ارسال پیام خوش آمدگویی
        sendMessage($chatId, "به ربات خوش آمدید! در حال ارسال درخواست...");

        // ارسال درخواست
        sendRequest();
    }
}

function sendMessage($chatId, $message) {
    global $website;

    $url = $website . "/sendMessage?chat_id=" . $chatId . "&text=" . urlencode($message);
    file_get_contents($url);
}

function sendRequest() {
    $url = "https://example.com/api"; // آدرس URL درخواست خود را جایگزین کنید
    $data = array("key" => "value"); // داده‌های درخواست را جایگزین کنید

    $options = array(
        'http' => array(
            'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        // مدیریت خطا
    }

    var_dump($result);
}
?>
