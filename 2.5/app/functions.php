<?php 
function view($name,$model){
    
    require("view/layout.view.php");
};

function get_data(){
   $fname = CONFIG['data_file'];
   if(!file_exists($fname)){
    $handle = fopen("$fname","w+");
   }
};
?>