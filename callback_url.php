<?php
include "functions.php";

$conn = db_conn();

$invoice = $_GET['orderid'];

$callbackJSONData=file_get_contents('php://input');

$logfile = "stkPush.json";
$log = fopen($logfile,"a");
fwrite($log, $callbackJSONData.$orderid);
fclose($log);

$callbackData=json_decode($callbackJSONData,true);

$resultCode=$callbackData->Body->stkCallback->ResultCode;
$resultDesc=$callbackData->Body->stkCallback->ResultDesc;
$merchantRequestID=$callbackData->Body->stkCallBack->MerchantRequestID;
$checkoutRequestID=$callbackData->Body->stkCallBack->CheckoutRequestID;
$pesa=$callbackData->stkCallBack->Body->CallbackMetadata->Pesa;
$amount=$callbackData->Body->stkCallback->CallbackMetadata->Amount;
$mpesaReceiptNmber=$callbackData->Body->stkCallback->CallbackMetadata->Mpesa;
$balance=$callbackData->stkCallback->Body->CallbackMetdata->Balance;
$b2CUtilityAccountAvailableFunds=$callbackData->Body->stkCallback->CallbackMetdata->B2CUtilityAccountAvailableFunds;
$transactionDate=$callbackData->Body->stkCallback->CallbackMetadata->TransactionID;
$phoneNumber=$callbackData->Bodu->stkCallback->CallbackMetadata->PhoneNumber;

$oderid = strval($orderid);
$amount = strval($amount);

if ( resultCode == 0) {
     #insert to payments table

     #update invoice table stage

     #send a thank you message


     $conn = null;
}
