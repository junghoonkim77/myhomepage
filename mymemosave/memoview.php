<?php 
include('phpgate.php');

class Memosave{
    public $order;
    public $memocon;
    
    public function __construct($order,$memocon){
        $this->order = $order;
        $this->memocon = $memocon;
    }};

function sortByoredr($a,$b){
    return $a->order - $b->order;
}; // 사용자 정의 함수



$sql = "SELECT * FROM mymemosave";
$result = mysqli_query($conn,$sql);
$li =array();
while($row=mysqli_fetch_array($result)){
    array_push($li,new Memosave($row['id'],$row['memocon']));
};

usort($li,'sortByoredr'); // 사용자 정의 함수

$memo_delnum = $_GET['delmemo']??"";
echo $memo_delnum;

if(!empty($memo_delnum)){
    $sqlDEL = "DELETE FROM mymemosave WHERE id = $memo_delnum"; 
    mysqli_query($conn,$sqlDEL);
    echo '['.$memo_delnum.']번이 삭제됐습니다.' ;
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
     ul >* {
        font-size : 10px;
     }
     ul li {
        white-space: pre-wrap;
        cursor : pointer;
        margin-bottom : 8px;
     }

     ul li:hover {
        background-color: yellowgreen;
     }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous">
</script> 
    <script src="../java/library.js"></script>
    <title>서버메모저장</title>
</head>
<body>
    <div class="memoViewBody">
    <button>메모 최하단 이동</button>    
    <ul>
        <?php 
        foreach ($li as $li_item) {
            echo'<a href=./memoview.php?delmemo='.$li_item->order.'>'.
            $li_item->order.'번 삭제:'.'</a>'."<li>".$li_item->memocon."</li>";
        }
        ?>
    </ul>
    </div>
   
<script>
    $('ul li').on('click',function(){
      const $thislicon =  $(this).text();
        if(navigator.clipboard){
        $lib.clipcopy($thislicon);
      } else{
        $lib.clipcopy2($thislicon);
      }
    })
    $('button').on('click',function(){
        const $memoViewBody = $('.memoViewBody');
        const offsetTop = $memoViewBody.offset().top; // 요소의 절대 위치
    console.log(offsetTop);
    $('html, body').stop().animate({scrollTop: offsetTop}, 500); // 부드러운 스크롤
    })
    
    
    </script>
</body>
</html>