<?php
session_start();

function db_conn() {
    $db_username = 'root';
    $db_password = '';
    $conn = new PDO('mysql:host=localhost;dbname=code', $db_username, $db_password);
    if (!$conn) {
        die("Fatal Error: Connection Failed!");
    }
    return $conn;
}

function mpesa($phone, $amount, $ordernum) {
    define('CALLBACK_URL', 'https://mydomain.com/mpesa/stkpush/v1/processrequest');
    $consumerKey = 'Y7zGXHS0ZmXnFVmyx4X2U292wh9iz1QTHXYR32Hoa0dNKzmf'; // fill with your consumer key
    $consumerSecret = 'ii8n1sq1FUHFjeusc1J2mU4AMlvhpcaPCs1EIylzr0i1NWc6x7KaAvkRTbI7g43F'; // fill with your app secret
    $BusinessShortCode = '6791401'; // business short code
    $PassKey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919'; // live pass key

    $phone = preg_replace('/^0/', '254', str_replace("+", "", $phone));
    $PartA = $phone;
    $PartB = '4234488';
    $TransactionDesc = 'Invest';
    $Timestamp = date('YmdHis');
    $Password = base64_encode($BusinessShortCode . $PassKey . $Timestamp);
    $header = ['Content-Type: application/json; charset=utf8'];
    $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'; // fill with access token URL
    $initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest'; // fill with initiation URL

    $curl = curl_init($access_token_url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_USERPWD, $consumerKey . ':' . $consumerSecret);
    $result = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $result = json_decode($result);
    $success_token = $result->access_token;

    curl_close($curl);

    $stkheader = ['Content-Type: application/json', 'Authorization: Bearer ' . $success_token];

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $initiate_url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader);
    $curl_post_data = array(
        'BusinessShortCode' => $BusinessShortCode, // corrected variable name
        'Password' => $Password,
        'Timestamp' => $Timestamp,
        'TransactionType' => 'CustomerBuyGoodsOnline',
        'Amount' => $amount,
        'PartA' => $PartA,
        'PartB' => $PartB,
        'PhoneNumber' => $PartA,
        'CallBackURL' => CALLBACK_URL . $ordernum, // concatenate without quotes
        'AccountReference' => $ordernum,
        'TransactionDesc' => $TransactionDesc,
    );

    $data_string = json_encode($curl_post_data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    $curl_response = curl_exec($curl);

    $res = (array)(json_decode($curl_response));
    $ResponseCode = $res['ResponseCode'];
    return $ResponseCode;
}

function sendSms($phoneNumber, $message) {
    $apiKey = "YOUR API_KEY";
    $sendeName = "YOUR ASSIGNED SENDER NAME";

    $bodyRequest = array(
        "mobile" => $phoneNumber,
        "response_type" => "json",
        "sender_name" => $sendeName,
        "service_id" => 0,
        "message" => $message
    );

    $payload = json_encode($bodyRequest);
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://mydomain.com/mpesa/stkpush/v1/processrequest',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 15,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_HTTPHEADER => array(
            'h_api_Key:  ' . $apiKey,
            'Content-Type: application/json'
        ),
    ));
    $response = curl_exec($curl);
}


