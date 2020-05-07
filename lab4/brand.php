<?php
include './vendor/autoload.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// set response code - 200 OK
http_response_code(200);

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
    {
        $rawdata = file_get_contents("php://input");
        $post = json_decode($rawdata, true);

        DB::getInstance()
            ->insert('osn__brand', $post);
        break;
    }
    case 'GET':
    {
        $res = DB::getInstance()
            ->select('*')
            ->table('osn__brand')
            ->get();

        print_r($res->toJSON());
        break;
    }
}