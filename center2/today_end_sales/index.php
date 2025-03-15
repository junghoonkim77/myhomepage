<?php 
include ('phpgate.php');


$teams = ['무1', '무2', '무3', '무4', '무5', '통품'];
$teamData = [];

foreach ($teams as $team) {
    $teamData[$team] = [];
    $sql = "SELECT it_tend , m_end , tri_end , success_end , todaytime FROM c2sales_end WHERE teamname = '$team'";
    $re = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($re)) {
        $teamData[$team][] = ['인티' => $row['it_tend'], '모바일' => $row['m_end'], '통리' => $row['tri_end'], '가설' => $row['success_end'] ,'시간' => $row['todaytime']];
    }
}


$mu1 = [$teamData['무1'][0]['인티'], $teamData['무1'][0]['모바일'], $teamData['무1'][0]['통리'], $teamData['무1'][0]['가설'],$teamData['무1'][0]['시간']];
$mu2 = [$teamData['무2'][0]['인티'], $teamData['무2'][0]['모바일'], $teamData['무2'][0]['통리'], $teamData['무2'][0]['가설'],$teamData['무2'][0]['시간']];
$mu3 = [$teamData['무3'][0]['인티'], $teamData['무3'][0]['모바일'], $teamData['무3'][0]['통리'], $teamData['무3'][0]['가설'],$teamData['무3'][0]['시간']];
$mu4 = [$teamData['무4'][0]['인티'], $teamData['무4'][0]['모바일'], $teamData['무4'][0]['통리'], $teamData['무4'][0]['가설'],$teamData['무4'][0]['시간']];
$mu5 = [$teamData['무5'][0]['인티'], $teamData['무5'][0]['모바일'], $teamData['무5'][0]['통리'], $teamData['무5'][0]['가설'],$teamData['무5'][0]['시간']];
$tong = [$teamData['통품'][0]['인티'], $teamData['통품'][0]['모바일'], $teamData['통품'][0]['통리'], $teamData['통품'][0]['가설'],$teamData['통품'][0]['시간']];


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
            display :flex;
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

        .tabcopy {
            background-color: powderblue;
            cursor: pointer;
        }

        #timebox{
            padding-left: 20px;
            
        }
    </style>

    <title>일실적</title>

</head>

<body>
    <div class="container">
    <div id="tablecopy">
   <table >
    <h3><?php echo date("Y").'-'.date("m").'-'.date("d"); ?></h3>
        <thead><td></td><td>인티</td><td>모바일</td><td>통리</td><td>가설</td></thead>

        <tbody>

            <tr><td class="team1">무선1</td>
            <td class="it"><?php echo $mu1[0] ?></td>
            <td class="mobile"><?php echo $mu1[1] ?></td>
            <td class="trigger"><?php echo $mu1[2] ?></td>
            <td class="succeed"><?php echo $mu1[3] ?></td></tr>
            

            <tr><td class="team1">무선2</td>
            <td class="it"><?php echo $mu2[0] ?></td>
            <td class="mobile"><?php echo $mu2[1] ?></td>
            <td class="trigger"><?php echo $mu2[2] ?></td>
            <td class="succeed"><?php echo $mu2[3] ?></td></tr>

            <tr><td class="team1">무선3</td>
            <td class="it"><?php echo $mu3[0] ?></td>
            <td class="mobile"><?php echo $mu3[1] ?></td>
            <td class="trigger"><?php echo $mu3[2] ?></td>
            <td class="succeed"><?php echo $mu3[3] ?></td></tr>

            <tr><td class="team1">무선4</td>
            <td class="it"><?php echo $mu4[0] ?></td>
            <td class="mobile"><?php echo $mu4[1] ?></td>
            <td class="trigger"><?php echo $mu4[2] ?></td>
            <td class="succeed"><?php echo $mu4[3] ?></td></tr>

            <tr><td class="team1">무선5</td>
            <td class="it"><?php echo $mu5[0] ?></td>
            <td class="mobile"><?php echo $mu5[1] ?></td>
            <td class="trigger"><?php echo $mu5[2] ?></td>
            <td class="succeed"><?php echo $mu5[3] ?></td></tr>
            
            <tr><td class="team1">통화품질</td>
            <td class="it"><?php echo $tong[0] ?></td>
            <td class="mobile"><?php echo $tong[1] ?></td>
            <td class="trigger"><?php echo $tong[2] ?></td>
            <td class="succeed"><?php echo $tong[3] ?></td></tr>

        </tbody>

        <tfoot>

            <td>합계</td>

            <td id="it_t"></td>

            <td id="mobile_t"></td>

            <td id="trigger_t"></td>

            <td id="succeed_t"></td>

        </tfoot>


    </table>
    
   </div>
    
    <div id="timebox">
    <button class="tabcopy">표복사</button>
    <p>무선1팀 입력시간:<span><?php echo $mu1[4] ?></span></p>
    <p>무선2팀 입력시간:<span><?php echo $mu2[4] ?></span></p>
    <p>무선3팀 입력시간:<span><?php echo $mu3[4] ?></span></p>
    <p>무선4팀 입력시간:<span><?php echo $mu4[4] ?></span></p>
    <p>무선5팀 입력시간:<span><?php echo $mu5[4] ?></span></p>
    <p>통화품질팀 입력시간:<span><?php echo $tong[4] ?></span></p>

    </div>
    
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
                  <label for="itnet">인티:</label>  
                  <input id="itnet" class="inputnum" placeholder="인티" type="number" autocomplete="off" max =200 min=0 value=0 name="it">
                  <label for="mobile">모바일:</label>  
                  <input id="mobile" class="inputnum" placeholder="모바일" type="number" autocomplete="off" max =200 min=0 value=0 name="mobile">
                  <label for="trigger">통리:</label>  
                  <input id="trigger" class="inputnum"  placeholder="통리" type="number" autocomplete="off" max =200 min=0 value=0 name="trigger">
                  <label for="success">가설:</label>  
                  <input id="success" class="inputnum"  placeholder="가설성공" type="number" autocomplete="off" max =200 min=0 value=0 name="success">
                  <input id="nowtime" type="hidden" value=<?php echo date('d일H:i:s');?> name="nowtime">
                  
                <button class="button1" >실적전송</button> 
             </fieldset> 
              
           </form>    

    <script>
        function sum($class){
         var sumend = [];
         $('.'+$class).each(function(idx,ele){
          var $thisnum =  Number(ele.textContent );  
           sumend.push($thisnum); 
        });
        var sumresul = sumend.reduce((acc,curval)=>{
            return  acc+curval ;
           },0)
         $('#'+$class+'_t').text(sumresul);     
        } //sum사용자 정의 함수 마지막 죽

        sum('it');  sum('mobile');   sum('trigger');   sum('succeed');

        $('.tabcopy').click(function(){
            $lib.rangecopy('#tablecopy');
        })
        
        
            


        $('.button1').click(function(e){
          if($('#select').val() !== ""){
            $('#endinsert.php').submit();
          }else{
            alert('팀명을 선택하세요~!')
            e.preventDefault();
          }
        })

    </script>

</body>

</html>