<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous">
</script> 

    <style type="text/css">
         h3 { padding-left: 21rem;  }
        .tg  {border-collapse:collapse;border-spacing:0;}
        .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
          overflow:hidden;padding:10px 5px;word-break:normal;}
        .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
          font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
        .tg .tg-w747{background-color:#dae8fc;text-align:left;vertical-align:top}
        .tg .tg-cxgh{background-color:#ffcb2f;text-align:left;vertical-align:top}
        .tg .tg-potj{background-color:#333333;border-color:inherit;color:#ffffff;text-align:center;vertical-align:middle}
        .tg .tg-0lax{text-align:left;vertical-align:top}
        .tg .tg-8j67{background-color:#999903;text-align:left;vertical-align:top}
        .tg .tg-emdq{background-color:#cd9934;text-align:left;vertical-align:top}
        </style>
    <title>효율관리부</title>
</head>
<body>
    <h3>일별 효율 관리부</h3>
  
    <table class="tg"><thead>
        <form id="cunsulchoice" method="post" action="siljukIn.php">
            <tr>
                <td class="tg-potj" rowspan="3">구분</td>
                <td class="tg-0lax" colspan="9"></td>
                <td class="tg-0lax">
                    <select id="teamName">
                        
                    </select>
                </td>
                <td class="tg-0lax">
                    <select id="consultantName" name="consultantName">
                        <option value=''>컨설턴트 선택</option>
                    </select>
                </td>
                <td class="tg-0lax"></td>
                <td class="tg-0lax"><input type="submit" value="확인"></td>
              </tr>
        </form>
       
        <tr>
          <td class="tg-w747">생산성</td>
          <td class="tg-w747">(평일 : ) </td>
          <td class="tg-w747" colspan="2">   (레드 : )</td>
          <td class="tg-8j67">IT 가입기회발굴 </td>
          <td class="tg-8j67">(이관 : ) </td>
          <td class="tg-8j67" colspan="2">  (시도율 : )</td>
          <td class="tg-emdq">M가입기회발굴</td>
          <td class="tg-emdq">(이관: )</td>
          <td class="tg-emdq" colspan="2">(시도율 : )</td>
          <td class="tg-cxgh">자가분석</td>
        </tr>
        <tr>
          <td class="tg-0lax">CPD</td>
          <td class="tg-0lax">ATT</td>
          <td class="tg-0lax">ACW</td>
          <td class="tg-0lax">작업시간</td>
          <td class="tg-0lax">시도건</td>
          <td class="tg-0lax">시도율</td>
          <td class="tg-0lax">이관건</td>
          <td class="tg-0lax">가설</td>
          <td class="tg-0lax">시도건</td>
          <td class="tg-0lax">시도율</td>
          <td class="tg-0lax">이관건</td>
          <td class="tg-0lax">가설</td>
          <td class="tg-0lax"></td>
        </tr></thead></table>
    <script>
        const teamName ={무1:'무선1팀',무2:'무선2팀',무3:'무선3팀',무4:'무선4팀',무5:'무선5팀',통품:'통화품질'};

        for ( key in teamName){
            $('#teamName').append(`<option value="${key}">${teamName[key]}</option>`)
        }
    //  
        $('#teamName').change(function(){
        let team = $(this).val();
        $.ajax({
        url: "getConsultant.php",
        type: "POST",
        data: { team: team },
        success: function(response){
            $('#consultantName').html(response);
        }
    });

});
    </script>    
</body>
</html>