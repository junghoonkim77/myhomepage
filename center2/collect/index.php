<?php 
include ('phpgate.php');


$teams = ['무1', '무2', '무3', '무4', '무5', '통품'];
$teamData = [];

foreach ($teams as $team) {
    $teamData[$team] = [];
    $sql = "SELECT simplevoc , badvoc , badofbad , vocmemo , todaytime FROM cs2collect WHERE teamname = '$team'";
    $re = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($re)) {
        $teamData[$team][] = ['단순' => $row['simplevoc'], '불만' => $row['badvoc'], '고만이관' => $row['badofbad'], '문의불만' => $row['vocmemo'], '시간' => $row['todaytime']];
    }
}


$mu1 = [$teamData['무1'][0]['단순'], $teamData['무1'][0]['불만'], $teamData['무1'][0]['고만이관'], $teamData['무1'][0]['문의불만'],$teamData['무1'][0]['시간']];
$mu2 = [$teamData['무2'][0]['단순'], $teamData['무2'][0]['불만'], $teamData['무2'][0]['고만이관'], $teamData['무2'][0]['문의불만'],$teamData['무2'][0]['시간']];
$mu3 = [$teamData['무3'][0]['단순'], $teamData['무3'][0]['불만'], $teamData['무3'][0]['고만이관'], $teamData['무3'][0]['문의불만'],$teamData['무3'][0]['시간']];
$mu4 = [$teamData['무4'][0]['단순'], $teamData['무4'][0]['불만'], $teamData['무4'][0]['고만이관'], $teamData['무4'][0]['문의불만'],$teamData['무4'][0]['시간']];
$mu5 = [$teamData['무5'][0]['단순'], $teamData['무5'][0]['불만'], $teamData['무5'][0]['고만이관'], $teamData['무5'][0]['문의불만'],$teamData['무5'][0]['시간']];
$tong = [$teamData['통품'][0]['단순'], $teamData['통품'][0]['불만'], $teamData['통품'][0]['고만이관'], $teamData['통품'][0]['문의불만'],$teamData['통품'][0]['시간']];


$weekday = date('l'); // full 요일 (예: Monday)

// 한글 요일로 변환
$days = [
    "Monday" => "월",
    "Tuesday" => "화",
    "Wednesday" => "수",
    "Thursday" => "목",
    "Friday" => "금",
    "Saturday" => "토",
    "Sunday" => "일"
];

$simplesum = $mu1[0] + $mu2[0]+ $mu3[0]+ $mu4[0]+ $mu5[0] + $tong[0];
$badsum = $mu1[1] + $mu2[1]+ $mu3[1]+ $mu4[1]+ $mu5[1] + $tong[1];
$badofbad = $mu1[2] + $mu2[2]+ $mu3[2]+ $mu4[2]+ $mu5[2] + $tong[2];
$vocmemo = [$mu1[3] , $mu2[3] , $mu3[3] , $mu4[3] , $mu5[3] , $tong[3]];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script> 
    <script src="../../java/library.js"></script> 

    <style>

       .container {
            
            display: flex;
            
            flex-direction: row;
        }

        table {

            border : 1px solid gray;
            border-collapse: collapse;
            text-align: center;
            
             
        }

        td {

            border : 1px solid black;
            text-align: center;
            padding : 10px;

        }

        thead {
            background-color: rgb(207, 203, 203);
        }

        tfoot {
            background-color: rgb(207, 203, 203);
        }

        .team1 {
            background-color: rgb(207, 203, 203);
        }
        .tabcopy {
            background-color: powderblue;
            cursor: pointer;
        }

        #timebox{
            padding-left: 20px;
            white-space: pre-wrap;
            font-size: 13px;
        }
        #middlemenu{
            position : relative;
            
        }
        #coltitle{
            width : 22rem;
        }
    </style>

    <title>CS2센터 WFMS취합</title>

</head>

<body>
    <div class="container">
    <div id="tablecopy">
   <table >
    <h4><?php echo date("m").'/'.date("d").'('.$days[$weekday].') CS2센터 WFMS 취합 사이트'; ?></h4>
        <thead><td></td><td>단순</td><td>불만</td><td>고만이관</td><td>문의내용</td><td>업로드시간</td></thead>

        <tbody>

            <td class="team1">무선1</td>
            <td class="it"><?php echo $mu1[0] ?></td>
            <td class="mobile"><?php echo $mu1[1] ?></td>
            <td class="trigger"><?php echo $mu1[2] ?></td>
            <td class="succeed"><?php echo $mu1[3] ?></td>
            <td class="succeed"><?php echo $mu1[4] ?></td></tr>
            

            <td class="team1">무선2</td>
            <td class="it"><?php echo $mu2[0] ?></td>
            <td class="mobile"><?php echo $mu2[1] ?></td>
            <td class="trigger"><?php echo $mu2[2] ?></td>
            <td class="succeed"><?php echo $mu2[3] ?></td>
            <td class="succeed"><?php echo $mu2[4] ?></td></tr>

            <td class="team1">무선3</td>
            <td class="it"><?php echo $mu3[0] ?></td>
            <td class="mobile"><?php echo $mu3[1] ?></td>
            <td class="trigger"><?php echo $mu3[2] ?></td>
            <td class="succeed"><?php echo $mu3[3] ?></td>
            <td class="succeed"><?php echo $mu3[4] ?></td></tr>

            <td class="team1">무선4</td>
            <td class="it"><?php echo $mu4[0] ?></td>
            <td class="mobile"><?php echo $mu4[1] ?></td>
            <td class="trigger"><?php echo $mu4[2] ?></td>
            <td class="succeed"><?php echo $mu4[3] ?></td>
            <td class="succeed"><?php echo $mu4[4] ?></td></tr>

            <td class="team1">무선5</td>
            <td class="it"><?php echo $mu5[0] ?></td>
            <td class="mobile"><?php echo $mu5[1] ?></td>
            <td class="trigger"><?php echo $mu5[2] ?></td>
            <td class="succeed"><?php echo $mu5[3] ?></td>
            <td class="succeed"><?php echo $mu5[4] ?></td></tr>
            
            <td class="team1">통화품질</td>
            <td class="it"><?php echo $tong[0] ?></td>
            <td class="mobile"><?php echo $tong[1] ?></td>
            <td class="trigger"><?php echo $tong[2] ?></td>
            <td class="succeed"><?php echo $tong[3] ?></td>
            <td class="succeed"><?php echo $tong[4] ?></td></tr>

        </tbody>
   
    </table>
    
   </div>
    
    <div id="timebox">
<h4>[서울]SKT유심정보 유출관련 문의현황 (ver.16:30)</h4>
ㅇ단순 :<?php echo $simplesum ?> 건
ㅇ불만 :<?php echo $badsum ?> 건 (中, 고만이관 <?php echo $badofbad ?> 건)
ㅇ고객문의 /불만 내용
<?php foreach ($vocmemo as $key => $value) {
    if ($value == '') {
        continue;
    } else
    echo "-".$value."\n";
} ?>


     
    </div>
 </div>   

  <div id="middlemenu">
  <a href="../index.html">CS2센터 메인페이지 이동</a>
  <button class="tabcopy">wfms제출본 복사</button>
  </div> 
    

   
    
    
  
    

    <form id="endinsert.php" action="endinsert.php" method="post">
             <fieldset>
                <select name="teamname" id="select">
                    <option value="">본인팀선택 必</option>
                    <option value="무1">무선1팀(전영선)</option>
                    <option value="무2">무선2팀(박세민)</option>
                    <option value="무3">무선3팀(윤미연)</option>
                    <option value="무4">무선4팀(도창수)</option>
                    <option value="무5">무선5팀(최세희)</option>
                    <option value="통품">통화품질팀(김정훈)</option>
                   
                  </select> <br>
                  <label for="itnet">단순:</label>  
                  <input id="itnet" class="inputnum" placeholder="단순문의" type="number" autocomplete="off" max =200 min=0 value=0 name="simplevoc">
                  <label for="mobile">불만:</label>  
                  <input id="mobile" class="inputnum" placeholder="불만문의" type="number" autocomplete="off" max =200 min=0 value=0 name="badvoc">
                  <label for="trigger">고만이관:</label>  
                  <input id="trigger" class="inputnum"  placeholder="고만이관" type="number" autocomplete="off" max =200 min=0 value=0 name="badofbad">
                  <label for="success">고객문의:</label>  
                  <input id="success" class="inputnum"  placeholder="'-' 없이 고객문의/불만 입력 / 없으면 패스" type="text" autocomplete="off"  name="vocmemo">
                  <input id="nowtime" type="hidden" value=<?php echo date('d일H:i:s').$days[$weekday];?> name="nowtime">
                  
                <button class="button1" >WFMS 취합건 전송</button> 
             </fieldset> 
              
           </form>
    <form class="coltitle" action="endinsert.php" method="post">
     <label for="coltitle">취합 제목</label>
     <input id="coltitle" type="text" autocomplete="off" name="coltitle">
     <button>최종취합자만 변경시 입력후 클릭</button>
    </form>

    <script>
               
           

        $('.tabcopy').click(function(){
            $lib.rangecopy('#timebox');
        })
        
        
        $('.button1').click(function(e){
          if($('#select').val() !== ""){
            $('#endinsert.php').submit();
          }else{
            alert('팀명을 선택하세요~!')
            e.preventDefault();
          }
        })

         
        $('#middlemenu').css('left',$('table').outerWidth(true)) ;

    </script>

</body>

</html>