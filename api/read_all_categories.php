<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//initializing our api
include_once('../core/initialize.php');

//instantiate post

$category = new Category($db);

$result = $category->read();

$num = $result->rowCount();

if($num > 0){
    $category_arr = array();
    $category_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        print_r($row);
        extract($row);
        $category_item = array(
            'id' => $id,
            'name' => $name,
            'create_at' => $create_at
        );

        array_push($category_arr['data'],$category_item);
     }

    // //convert to JSON and output
     echo json_encode($category_arr);
}else{
    echo json_encode(array('message' => 'No posts found.'));
}

?>