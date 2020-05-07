<?php
include './vendor/autoload.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

/*
 include('../../inc.php');
 include('inc_tab.php');
*/


http_response_code(200);

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
    {
        $rawdata = file_get_contents("php://input");
        $post = json_decode($rawdata, true);
         DB::getInstance()
            ->insert('car123', $post);
        break;
    }
    case 'GET':
    {
       $query = <<<SQL
SELECT car123.id      as id,
       car123.name    as name,
       car123.logo    as logo,
       brand123.id   as brandId,
       brand123.logo as brandLogo,
       brand123.name as brandName
from car123
         left join brand123 ON brand_id = brand123.id;
SQL;

		
        $result = DB::getInstance()
            ->query($query);
        print_r($result->toJSON());
        break;
	/*
		 $db = mysqli_connect($server, $user, $pwd, $dbase);
		
		 if ( $result = mysqli_query($db,"SELECT * FROM `car123`", MYSQLI_USE_RESULT) ) {
		 echo "<h2>Запис успішно внесений.</h2>";
		 echo "<br><b>Ви можете додати інші Новини до БД;</b>";
		  print_r($result);
		} else {
			echo("Error : " . mysqli_error($db));
		 }
       */
    }
    case 'DELETE':{
        $rawdata = file_get_contents("php://input");
        $post = json_decode($rawdata, true);
        DB::getInstance()
            ->delete('car123', $post['id']);
        break;
    }
}