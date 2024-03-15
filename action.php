<?php
include "functions.php";
#$conn = db_conn();

if(isset($_POST['submit'])) {
    $phone = $_POST['phone'];
    $amount = $_POST['amount'];
    $invoice = date('YmdHis');
    $status = "unpaid";

    #call mpesa stkpush function_exists
    $response =  mpesa($phone, $amount, $invoice);


    if($response == 0) {
        //insert transaction to the invoice table
        header("location: index.php?error= Please enter your mpesa pin to complete");
}

else{
    header("location:index.php?error = an error has occured");
}
}


