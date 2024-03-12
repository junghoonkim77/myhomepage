<?php 
    require ('app/app.php');
    $title = 'hello world2';
    
 $data = get_data();
   view('index',$data);

?>