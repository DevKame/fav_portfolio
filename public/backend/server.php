<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$res = [];
$res["success"] = true;
//################################################# GENERAL HEADERS:
header("Content-Type: application/json");
//################################################# PREFLIGHT HEADERS:
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

//################################################# HANDLES PREFLIGHT REQUESTS:
if($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
    exit();
}
//################################################# HANDLES POST REQUESTS
if($_SERVER["REQUEST_METHOD"] === "POST")
{
    $req = json_decode(file_get_contents("php://input"));
    //################################################# DEPENDANT ON ITS TASK VALUE:
    switch($req->task)
    {
        case "validate-data":
            if(strlen($req->firstname) > 15 || strlen($req->lastname) > 15 || strlen($req->email) > 30)
            {
                $res["reason"] = "too-long";
                $res["success"] = false;
            }
            if(!filter_var($req->email, FILTER_VALIDATE_EMAIL)) {
                $res["reason"] = "invalid-email";
                $res["success"] = false;
            }
            if(trim($req->firstname) === "" || trim($req->lastname) === "" || trim($req->email) === "") {
                $res["reason"] = "invalid-entries";
                $res["success"] = false;
            }
            break;
    }
}


$res = json_encode($res);
echo $res;