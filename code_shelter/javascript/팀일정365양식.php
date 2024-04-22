<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
       table {
        border : 1px solid gray;
        border-collapse : collapse;
        font-size : 12px;
     }
    
     td {
        border : 1px solid gray;
     }
    </style>
    
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous">
</script> 

    <title>365일용 양식</title>
</head>
<body>
    <a href="../../sales_php/세일즈실적관리.php">실적창 이동</a>
    <div>
        <select>
            <option value="01">1월</option>
            <option value="02">2월</option>
            <option value="03">3월</option>
            <option value="04">4월</option>
            <option value="05">5월</option>
            <option value="06">6월</option>
            <option value="07">7월</option>
            <option value="08">8월</option>
            <option value="09">9월</option>
            <option value="10">10월</option>
            <option value="11">11월</option>
            <option value="12">12월</option>
        </select>
    </div>
    <div>
     <table>
        <thead class="thead"><td>순서</td><td>날짜</td><td>연차</td><td>연차</td><td>연차</td></thead>
        <tbody>

        </tbody>

     </table>
    </div>
    <script>
         var $table = "";
         
       // var $year =  date.setFullYear(2024)
       // var $mon = date.setMonth(0)+1
        //var $date = date.setDate(1)
       //  console.log(date.getFullYear());
       //  console.log(date.getDate())
       
       

        for ( var i =1 ; i<=366 ; i++){
            var date = new Date(2024,0,i);
            var $mon = date.getMonth()+1;
            var $day = date.getDate();
             if($mon.toString().length<2){
                $('tbody').append(`<tr class="${0}${$mon} tr"><td>${0}${$mon}월/${$day}일</td><td>111111111</td><td>1</td><td>1</td><td>1</td></tr>`);
             }else{
                $('tbody').append(`<tr class="${$mon} tr"><td>${$mon}월/${$day}일</td><td>1</td><td>1</td><td>1</td><td>1</td></tr>`);
             }  
         } // 테이블 생성 코드 
           
          
           var date1 = new Date();
            if ((date1.getMonth()+1).toString().length<2 ){
               var mon1 = "0"+(date1.getMonth()+1).toString();
            } else {
               var mon1 =  date1.getMonth()+1;
            }
            

            $('select').val(mon1.toString()).prop('selected',true);

            $('.tr').not('.'+mon1.toString()).hide();
            
           $('select').change(function(){
            $thisval = $(this).val();
            $('.tr').not('.'+$thisval).hide()
            $('.'+$thisval).show();
            
           
           
         }) 
        
    </script>
</body>
</html>
