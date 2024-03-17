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
            if(isRecentEntry($req->email)) {
                $res["reason"] = "too-soon";
                $res["success"] = false;
            }
            break;
        case "validate-message":
            if(strlen($req->message) > 512 || trim($req->message) === "") {
                $res["reason"] = "invalid-message";
                $res["success"] = false;
            }
            break;
        case "safe-request":
            if($req->userdata->reason === "website")
            {
                if($req->userdata->hasdomain === "" || $req->userdata->haswebspace === "")
                {
                    $res["reason"] = "radios-empty";
                    $res["success"] = false;
                }
                else {
                    safeRequest($req->userdata);
                }
            }
            else {
                safeRequest($req->userdata);
            }
            break;
    }
}

function connect() {
    $host =     "localhost";
    $user =     "Kamedin";
    $pw =       "12345";
    $db =       "kame-utilities";
    return mysqli_connect($host, $user, $pw, $db);
}
function safeRequest($data) {
    $con = connect();
    $privacy = $data->privacy === true ?
    1 : 0;
    $timestamp = (string)time();
    $query =
    "INSERT INTO requests_to_me
    (firstname, lastname, email, privacy, message, hasdomain, haswebspace, timestamp)
    VALUES (?,?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "sssissss", $data->firstname, $data->lastname, $data->email, $privacy, $data->message, $data->hasdomain, $data->haswebspace, $timestamp);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
function isRecentEntry($email) {
    $con = connect();
    $twelveHoursAgo = time() - (12 * 60 * 60);
    $query = "SELECT timestamp FROM requests_to_me WHERE email = ? ORDER BY timestamp DESC LIMIT 1";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $latestTimestamp);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    return ($latestTimestamp && $latestTimestamp > $twelveHoursAgo);
}

$res = json_encode($res);
echo $res;