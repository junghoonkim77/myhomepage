<?php 
function view($name,$model){
    global $title; //
    require("view/layout.view.php");
};

function get_data(){
   $fname = CONFIG ['data_file'];
   $json ='';
   if(!file_exists($fname)){
    file_put_contents($fname,''); //데이터 파일이 없다면 만들고 있다면 뒤집어 씌운다
    //아래 두줄을 위 한문장으로 대체할수 있다.
  //  $handle = fopen("$fname","w+"); //w+는 있으면 읽고 없으면 만들라는 옵션
  //  fclose($handle); //읽고 나면 해당 파일은 꼭 닫아줘야 한다
   } else{
   $json = file_get_contents($fname); // 파일안에 모든 내용을 읽고 문자열로 바꿔준다
    // $handle = fopen("$fname","r"); //읽기 위해서 단지 오픈만 한 코드임 
    // $json = fread($handle,filesize($fname));
   }
   return $json;
};
?>