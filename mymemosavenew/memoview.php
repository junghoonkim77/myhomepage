<?php 
include('phpgate.php');

class Memosave{
    public $order;
    public $memocon;
    
    public function __construct($order,$memocon){
        $this->order = $order;
        $this->memocon = $memocon;
    }
};

function sortByoredr($a,$b){
    return $a->order - $b->order;
}; // 사용자 정의 함수

$sql = "SELECT * FROM mymemosavenew";
$result = mysqli_query($conn,$sql);
$li =array();
while($row=mysqli_fetch_array($result)){
    array_push($li,new Memosave($row['id'],$row['memocon']));
};

usort($li,'sortByoredr'); // 사용자 정의 함수

$memo_delnum = $_GET['delmemo']??"";
echo $memo_delnum;

if(!empty($memo_delnum)){
    $sqlDEL = "DELETE FROM mymemosavenew WHERE id = $memo_delnum"; 
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

     /* 새로 추가된 스타일: 검색창 및 하이라이트 */
     #searchInput {
        padding: 6px 10px;
        margin-left: 10px;
        font-size: 12px;
        width: 200px;
     }
     .highlight {
        background-color: yellow;
        font-weight: bold;
     }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script> 
    <script src="../java/library.js"></script>
    <title>서버메모저장</title>
</head>
<body>
    <div>
        <button id="btnScrollBottom">메모 최하단 이동</button>    
        <!-- 검색 입력창 추가 -->
        <input type="text" id="searchInput" placeholder="검색할 키워드를 입력하세요...">

        <ul class="memoViewBody">
            <?php 
            foreach ($li as $li_item) {
                echo'<a href=./memoview.php?delmemo='.$li_item->order.'>'.
                $li_item->order.'번 삭제:'.'</a>'."<li>".$li_item->memocon."</li>";
            }
            ?>
        </ul>
    </div>
   
<script>
    // 기존 기능: 클립보드 복사
    $('ul li').on('click',function(){
        // span 태그가 있어도 text() 메서드를 쓰면 순수 텍스트만 가져오므로 복사 기능에 문제없음
        const $thislicon = $(this).text();
        if(navigator.clipboard){
            $lib.clipcopy($thislicon);
        } else {
            $lib.clipcopy2($thislicon);
        }
    });

    // 기존 기능: 최하단 이동
    $('#btnScrollBottom').on('click',function(){
        const $memoViewBody = $('.memoViewBody').height();
        console.log($memoViewBody);
        $('html,body').animate({ scrollTop: $memoViewBody+'px' }, "slow");
    });

    // --- 새로 추가된 검색 및 하이라이트 기능 ---
    $(document).ready(function() {
        // 초기 로드 시 원본 텍스트를 메모리에 저장해둠 (태그 훼손 방지)
        $('ul.memoViewBody li').each(function() {
            $(this).data('original', $(this).text());
        });

        // keyup 이벤트 적용
        $('#searchInput').on('keyup', function() {
            let keyword = $(this).val().trim();
            
            // 정규식 특수문자 오류를 방지하기 위한 이스케이프 처리
            let safeKeyword = keyword.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'); 
            let regex = new RegExp(`(${safeKeyword})`, 'gi');

            $('ul.memoViewBody li').each(function() {
                let $li = $(this);
                let $a = $li.prev('a'); // 메모 삭제용 a태그 (li 바로 앞에 위치)
                let originalText = $li.data('original');

                // 검색어가 없을 때는 모두 보이기 및 원본 텍스트 복구
                if (keyword === '') {
                    $li.show();
                    $a.show();
                    $li.text(originalText);
                    return;
                }

                // 검색어가 포함되어 있는지 확인 (대소문자 구분 없이 검색하려면 toLowerCase 적용)
                if (originalText.toLowerCase().includes(keyword.toLowerCase())) {
                    // 일치 항목 보이기
                    $li.show();
                    $a.show();
                    
                    // 정규식을 사용해 검색어를 span으로 감싸 노란색 반전 처리
                    let highlightedText = originalText.replace(regex, '<span class="highlight">$1</span>');
                    $li.html(highlightedText);
                } else {
                    // 불일치 항목 숨기기(Hidden) - a태그와 li태그 모두 숨김
                    $li.hide();
                    $a.hide();
                }
            });
        });
    });
</script>
</body>
</html>
