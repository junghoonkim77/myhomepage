<?php 
function view($name,$model){
    
    require("view/layout.view.php");
};

function get_data(){
   $fname = CONFIG ['data_file'];
   $json ='';
   if(!file_exists($fname)){
    $handle = fopen("$fname","w+"); //w+는 있으면 읽고 없으면 만들라는 옵션
    fclose($handle); //읽고 나면 해당 파일은 꼭 닫아줘야 한다
   } else{
    $handle = fopen("$fname","r"); //읽기 위해서 단지 오픈만 한 코드임 
    $json = fread($handle,filesize($fname));
   }
   return $json;
};
?>