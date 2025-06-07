jQuery(function(){

  class Teaminfo {
    constructor(_comnum,_kosid,_firstday,_name,_gisu,_birth,_cellphone,_ktalkid,_inline,_ip){
        this.comnum = _comnum,
        this.kosid = _kosid,
        this.firstday = _firstday,
        this.name = _name,
        this.gisu = _gisu,
        this.birth= _birth,
        this.cellphone = _cellphone,
        this.ktalkid = _ktalkid                
        this.inline = _inline
        this.ip =_ip
}}
let team =
  
[ //new Teaminfo("39138","118183150","2011.05.11","최아람","(11-5.2)","880112","010-6763-6647","82009303","56159","172.19.152.32"),
 new Teaminfo("33921","91387929","2010.05.25","이진우","(10-5.3)","830214","010-9932-0450","??","56001","172.19.153.33"),
 new Teaminfo("31368","200964233","2009.08.12","김지훈","(09-8.1)","860514","010-9886-7573","82016533","56154","172.19.152.32"),
  new Teaminfo("113632","91356963","2024.03.28","박주영","(24-3.2)","830901","010-4870-8149","82284780","56153","172.19.152.31"),
  new Teaminfo("34115","118175636","2010.06.08","박정범","(10-6.1)","840523","010-5581-5947","82009540","56219","172.19.153.162"),
  new Teaminfo("35064","118176867","2010.08.09","김정훈77","(10-8.1)","771120","010-2209-6279","82010195","56011","172.19.154.156"),
  new Teaminfo("51658","91037307","2013.09.16","최민지","(13-9.1)","960213","010-4331-8979","82046713","56144","172.19.153.103"),
 new Teaminfo("53292","91044016","2013.12.19","이한기","(13-12.2)","821007","010-2661-4384	","82057826","56217","172.19.153.105"),
 new Teaminfo("80020","91307022","2018.10.05","이윤복","(18-10.1)","820117","010-8886-5570","82197538","56158","172.19.152.153"),
 new Teaminfo("34424","118176229","2010.06.29","백금옥","(10-6.3)","701110","010-9277-8670","82010528","56287","172.19.152.160"),
   ]


   for ( i=0 ; i<team.length; i++)
    { jQuery('#tr').after(`<tr><td>${team[i].comnum}</td>
     <td>${team[i].kosid}</td>
     <td>${team[i].firstday}</td>
     <td>${team[i].name}</td>
     <td>${team[i].gisu}</td>
     <td>${team[i].birth}</td>
     <td>${team[i].cellphone}</td>
     <td>${team[i].ktalkid}</td>
     <td>${team[i].inline}</td>
     <td>${team[i].ip}</td>
     </tr>`)
    } 
     var $tdarray = [];
     
     
     //배열에 클릭할때 마다 td안에 텍스트 값을 넣기 
     $('td').on({
      click : function(){
      var $td= $(this).text().trim();
      if($tdarray.includes($td)==false){
        $tdarray.push($td);
      $(this).css('background-color','yellow');
      }
       },

      dblclick : function(){
       var $td1= $(this).text(); 
      var $tdidx = $tdarray.indexOf($td1);
      console.log( $tdidx );
      $tdarray.splice($tdidx,1);
      $(this).css('background-color','transparent');
      console.log($tdarray );
      }      
     
    })
    

    //#tabs-3
      $("body").mouseleave(function(){
        $tdarray.forEach((val)=>{
          $('#copy_val').append(`<td>${val}</td>`)
        })
        $tdarray.length =0;
        var $copyval = document.querySelector('#copy_val').innerText;
        $lib.copyall($copyval);
        
        $('#copy_val > *').remove();
        $('td').css('background-color','transparent')
      })
    
  
      $('#password').keyup(function(){
        const $passval = $(this).val();
        if($passval ==="6279"){
          $('#tabs-4 table').show();
        }
      })



  }) //마지막 스코프 





