<?php 
include "menu.html";

$file_name = $_FILES['photo']['name'];
$arr  = explode('.',$file_name);
$ext = end($arr); // 확장자를 갖고 오는 것 

if($ext == 'jpg' or $ext == 'png' or $ext == 'JPG' or $ext =='jpeg'){
    copy($_FILES['photo']['tmp_name'],"./upload/".$file_name);
    echo"<script>
     alert('정상적으로 업로드가 완료됐습니다.');
     self.location.href='./gallery_list.php';
    </script>
    ";
    
} else {
    echo "이미지 포맷이 잘못됐습니다.";
}
?>