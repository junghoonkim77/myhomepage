jQuery(function(){
    // 월표시 
    class Schedule {
        constructor(mo,week,yun1,yun2,yun3,heal1,heal2,heal3,healtime,dang1,dang2,day2,week2,memo){
            this.mo = mo;
            this.week = week;
            this.yun1 = yun1;
            this.yun2 = yun2;
            this.yun3 = yun3;
            this.heal1 = heal1;
            this.heal2 = heal2;
            this.heal3 = heal3;
            this.healtime = healtime;
            this.dang1 = dang1;
            this.dang2 = dang2;
            this.day2 = day2 ;
            this.week2 = week2 ;
            this.memo = memo ;     }
           }
  
//1월

var schedule1 =[

    new Schedule("1일","휴일",".",".",".",".",".",".",".","(제)백금옥",".","1일","휴일","."),
    new Schedule("2일","화","김정훈(청)",".",".",".",".",".",".","이한기",".","2일","화","."),
    new Schedule("3일","수","김정훈(청)",".",".","박주영",".",".","10:30(유)","최민지",".","3일","수","."),
    new Schedule("4일","목","이진우","최아람(반)",".",".",".",".",".","백금옥",".","4일","목","."),
    new Schedule("5일","금","백금옥",".",".","이한기",".",".","10:30(남)","김정훈",".","5일","금","15:30 최민지 네일"),
    new Schedule("6일","토",".",".",".",".",".",".",".","(서)박정범",".","6일","토","."),
    new Schedule("7일","일",".",".",".",".",".",".",".",".",".","7일","일","."),
    new Schedule("8일","월","이윤복","최민지","최아람(반)",".",".",".",".","이한기",".","8일","월","."),
    new Schedule("9일","화","이윤복",".",".","최아람",".",".","14:00(남)","최민지",".","9일","화","."),
    new Schedule("10일","수","이윤복",".",".","백금옥",".",".","13:00(남)","박정범",".","10일","수","."),
    new Schedule("11일","목","이윤복",".",".","이진우",".",".","10:30(유)","최민지",".","11일","목","."),
    new Schedule("12일","금","이윤복","최아람",".",".",".",".",".","김정훈",".","12일","금","업무지식평가"),
    new Schedule("13일","토",".",".",".",".",".",".",".","(제)최민지",".","13일","토","."),
    new Schedule("14일","일",".",".",".",".",".",".",".","(서)김정훈","박정범","14일","일","."),
    new Schedule("15일","월",".",".",".",".",".",".",".","최민지",".","15일","월","."),
    new Schedule("16일","화","이진우",".",".",".",".",".",".","박정범",".","16일","화","."),
    new Schedule("17일","수","박주영","최아람",".","최민지",".",".","14:00(남)","이한기",".","17일","수","."),
    new Schedule("18일","목","박정범",".",".",".",".",".",".","백금옥",".","18일","목","13:00 세라잼 "),
    new Schedule("19일","금",".",".",".","김정훈",".",".","10:30(남)","김정훈",".","19일","금","통품정평일"),
    new Schedule("20일","토",".",".",".",".",".",".",".","(서)이한기",".","20일","토","."),
    new Schedule("21일","일",".",".",".",".",".",".",".",".",".","21일","일","."),
    new Schedule("22일","월",".",".",".",".",".",".",".","최민지",".","22일","월","."),
    new Schedule("23일","화",".",".",".",".",".",".",".","박정범",".","23일","화","."),
    new Schedule("24일","수",".",".",".","이윤복",".",".","13:00(남)","이한기",".","24일","수","."),
    new Schedule("25일","목","김정훈",".",".","박정범",".",".","10:30(유)","백금옥",".","25일","목","."),
    new Schedule("26일","금","이한기",".",".",".",".",".",".","김정훈",".","26일","금","."),
    new Schedule("27일","토",".",".",".",".",".",".",".","(제)최민지",".","27일","토","."),
    new Schedule("28일","일",".",".",".",".",".",".",".",".",".","28일","일","."),
    new Schedule("29일","월","최아람(반)",".",".",".",".",".",".","박정범",".","29일","월","."),
    new Schedule("30일","화",".",".",".",".",".",".",".","최민지",".","30일","화","."),
    new Schedule("31일","수",".",".",".",".",".",".",".","백금옥",".","31일","수",".")

]

//2월
var schedule2 =[
    new Schedule("1일","목",".",".",".",".",".",".",".","최민지",".","1일","목","."),
    new Schedule("2일","금",".",".",".","백금옥",".",".","1300(유)","김정훈",".","2일","금","정범교육(14~16)"),
    new Schedule("3일","토",".",".",".",".",".",".",".","(서)최민지",".","3일","토","."),
    new Schedule("4일","일",".",".",".",".",".",".",".","x",".","4일","일","."),
    new Schedule("5일","월",".",".",".",".",".",".",".","이한기",".","5일","월","."),
    new Schedule("6일","화",".",".",".","이진우",".",".","1030(유)","김정훈",".","6일","화","업무지식평가 ->취소"),
    new Schedule("7일","수","김정훈","최아람",".",".",".",".",".","백금옥",".","7일","수","."),
    new Schedule("8일","목",".",".",".","최아람",".",".","1030(옥)","최민지",".","8일","목","."),
    new Schedule("9일","휴일",".",".",".",".",".",".",".","(서)박정범",".","9일","휴일","."),
    new Schedule("10일","토",".",".",".",".",".",".",".",".",".","10일","토","."),
    new Schedule("11일","일",".",".",".",".",".",".",".",".",".","11일","일","."),
    new Schedule("12일","휴일",".",".",".",".",".",".",".","(제)이한기",".","12일","휴일","."),
    new Schedule("13일","화","최민지",".",".",".",".",".",".","박정범",".","13일","화","."),
    new Schedule("14일","수","이진우","김정훈(청)",".",".",".",".",".","이한기",".","14일","수","."),
    new Schedule("15일","목","백금옥",".",".",".",".",".",".","최민지",".","15일","목","."),
    new Schedule("16일","금",".",".",".","박주영",".",".","1030(남)","김정훈",".","16일","금","통신비,의료비 마감/민지 네일 15:30"),
    new Schedule("17일","토",".",".",".",".",".",".",".","(서)김정훈",".","17일","토","."),
    new Schedule("18일","일",".",".",".",".",".",".",".","x",".","18일","일","."),
    new Schedule("19일","월",".",".",".",".",".",".",".","백금옥",".","19일","월","."),
    new Schedule("20일","화",".",".",".",".",".",".",".","최민지",".","20일","화","."),
    new Schedule("21일","수","이한기",".",".","박정범",".",".","1300(유)","박정범",".","21일","수","나 교육( 16~18)"),
    new Schedule("22일","목","박주영",".",".","최민지",".",".","1300(옥)","이한기",".","22일","목","."),
    new Schedule("23일","금","최아람",".",".","이한기",".",".","1030(옥)","김정훈",".","23일","금","."),
    new Schedule("24일","토",".",".",".",".",".",".",".","(제)최민지",".","24일","토","."),
    new Schedule("25일","일",".",".",".",".",".",".",".","(제)김정훈","박정범","25일","일","."),
    new Schedule("26일","월",".",".",".",".",".",".",".","백금옥",".","26일","월","."),
    new Schedule("27일","화","박정범",".",".",".",".",".",".","이한기",".","27일","화","."),
    new Schedule("28일","수",".",".",".","이윤복",".",".","1030((옥)","최민지",".","28일","수","."),
    new Schedule("29일","목",".",".",".","김정훈",".",".","1300(옥)","박정범",".","29일","목",".")
    
] 

//3월
var schedule3 = [
new Schedule("1일","휴일",".",".",".",".",".",".",".","(제)박정범",".","1일","휴일","."),
new Schedule("2일","토",".",".",".",".",".",".",".","(서)백금옥",".","2일","토","."),
new Schedule("3일","일",".",".",".",".",".",".",".",".",".","3일","일","."),
new Schedule("4일","월",".",".",".",".",".",".",".","이한기",".","4일","월","."),
new Schedule("5일","화","이진우",".",".",".",".",".",".","백금옥",".","5일","화","업무지식평가 /생일의 날"),
new Schedule("6일","수","이진우",".",".",".",".",".",".","박정범",".","6일","수","리스크예방데이"),
new Schedule("7일","목","이진우",".",".","백금옥",".",".","1300(남)","최민지",".","7일","목","오스타시상식"),
new Schedule("8일","금",".",".",".","이한기",".",".","1300(유)","김정훈",".","8일","금","."),
new Schedule("9일","토",".",".",".",".",".",".",".","(제)최민지",".","9일","토","."),
new Schedule("10일","일",".",".",".",".",".",".",".","(서)이진우","(서)이한기","10일","일","."),
new Schedule("11일","월",".",".",".",".",".",".",".","최민지",".","11일","월","의료,경조비마감"),
new Schedule("12일","화",".",".",".",".",".",".",".","이한기",".","12일","화","통화품질정기평가"),
new Schedule("13일","수","백금옥","이진우",".","박정범",".",".","1130(남)","최민지",".","13일","수","10~12정범교육"),
new Schedule("14일","목","백금옥",".",".","최민지",".",".","1300(남)","박정범",".","14일","목","."),
new Schedule("15일","금","백금옥",".",".","최아람",".",".","1030(유)","김정훈",".","15일","금","."),
new Schedule("16일","토",".",".",".",".",".",".",".","(서)최민지",".","16일","토","."),
new Schedule("17일","일",".",".",".",".",".",".",".",".",".","17일","일","."),
new Schedule("18일","월",".",".",".",".",".",".",".","백금옥",".","18일","월","."),
new Schedule("19일","화",".",".",".",".",".",".",".","이한기",".","19일","화","."),
new Schedule("20일","수","김정훈",".",".",".",".",".",".","박정범",".","20일","수","통신비취합"),
new Schedule("21일","목","이한기",".",".",".",".",".",".","최민지",".","21일","목","."),
new Schedule("22일","금","박정범","이윤복",".","이진우",".",".","1030(남)","김정훈",".","22일","금","민지nail15:30"),
new Schedule("23일","토",".",".",".",".",".",".",".","(제)박정범",".","23일","토","."),
new Schedule("24일","일",".",".",".",".",".",".",".","(제)김정훈","(제)이한기","24일","일","."),
new Schedule("25일","월",".",".",".",".",".",".",".","박정범",".","25일","월","."),
new Schedule("26일","화",".",".",".",".",".",".",".","최민지",".","26일","화","."),
new Schedule("27일","수","최민지",".",".","최아람",".",".","1030(남)","이한기",".","27일","수","."),
new Schedule("28일","목","최민지","최아람",".","이윤복",".",".","1300(유)","백금옥",".","28일","목","나교육16~18"),
new Schedule("29일","금","최민지",".",".",".",".",".",".","김정훈",".","29일","금","."),
new Schedule("30일","토",".",".",".",".",".",".",".","(서)김정훈",".","30일","토","."),
new Schedule("31일","일",".",".",".",".",".",".",".",".",".","31일","일",".")]
    
    
//4월
var schedule4 = [
    new Schedule("1일","월",".",".",".",".",".",".",".","이한기",".","1일","월","."),
    new Schedule("2일","화","최민지",".",".",".",".",".",".","박정범",".","2일","화","."),
    new Schedule("3일","수","백금옥","최아람",".",".",".",".",".","최민지",".","3일","수","업지패스?? /생일의날"),
    new Schedule("4일","목","김정훈",".",".",".",".",".",".","백금옥",".","4일","목","."),
    new Schedule("5일","금","김정훈",".",".","백금옥",".",".","1400(남)","이한기",".","5일","금","고만춘계"),
    new Schedule("6일","토",".",".",".",".",".",".",".","(제)박정범",".","6일","토","."),
    new Schedule("7일","일",".",".",".",".",".",".",".",".",".","7일","일","."),
    new Schedule("8일","월",".",".",".",".",".",".",".","최민지",".","8일","월","."),
    new Schedule("9일","화","이진우",".",".",".",".",".",".","백금옥",".","9일","화","오스타시상식/Risk데이"),
    new Schedule("10일","휴일",".",".",".",".",".",".",".","(제)최민지",".","10일","휴일","."),
    new Schedule("11일","목",".",".",".",".",".",".",".","박정범",".","11일","목","통품정기평가/의료비"),
    new Schedule("12일","금",".",".",".","이한기",".",".","1300(유)","김정훈",".","12일","금","민지 15:30 네일/총괄춘계"),
    new Schedule("13일","토",".",".",".",".",".",".",".","(서)김정훈",".","13일","토","."),
    new Schedule("14일","일",".",".",".",".",".",".",".",".",".","14일","일","."),
    new Schedule("15일","월",".",".",".",".",".",".",".","최민지",".","15일","월","."),
    new Schedule("16일","화",".",".",".",".",".",".",".","박정범",".","16일","화","."),
    new Schedule("17일","수","이한기",".",".","최아람",".",".","1030(남)","최민지",".","17일","수","나 신입교육"),
    new Schedule("18일","목","이윤복",".",".","박정범",".",".","1300(남)","백금옥",".","18일","목","."),
    new Schedule("19일","금","이윤복",".",".","박주영",".",".","1030(유)","김정훈",".","19일","금","통신비"),
    new Schedule("20일","토",".",".",".",".",".",".",".","(제)이한기",".","20일","토","."),
    new Schedule("21일","일",".",".",".",".",".",".",".","(서)김정훈","(서)박정범","21일","일","세일즈내평마감일"),
    new Schedule("22일","월","최아람",".",".",".",".",".",".","박정범",".","22일","월","."),
    new Schedule("23일","화","최아람",".",".","이윤복",".",".","1300(유)","최민지",".","23일","화","."),
    new Schedule("24일","수","박정범",".",".","최민지",".",".","1130(남)","백금옥",".","24일","수","."),
    new Schedule("25일","목",".",".",".","이진우",".",".","1130(유)","이한기",".","25일","목","."),
    new Schedule("26일","금",".",".",".","김정훈",".",".","1300(남)","김정훈",".","26일","금","통품춘계행사"),
    new Schedule("27일","토",".",".",".",".",".",".",".","(서)최민지",".","27일","토","."),
    new Schedule("28일","일",".",".",".",".",".",".",".",".",".","28일","일","."),
    new Schedule("29일","월",".",".",".",".",".",".",".","이한기",".","29일","월","."),
    new Schedule("30일","화",".",".",".",".",".",".",".","김정훈",".","30일","화",".")
]

//5월

var schedule5 =[

    new Schedule("1일","휴일",".",".",".",".",".",".",".",".",".","1일","휴일","."),
    new Schedule("2일","목",".",".",".",".",".",".",".",".",".","2일","목","."),
    new Schedule("3일","금",".",".",".",".",".",".",".",".",".","3일","금","."),
    new Schedule("4일","토",".",".",".",".",".",".",".",".",".","4일","토","."),
    new Schedule("5일","휴일",".",".",".",".",".",".",".",".",".","5일","휴일","."),
    new Schedule("6일","휴일",".",".",".",".",".",".",".",".",".","6일","휴일","."),
    new Schedule("7일","화",".",".",".",".",".",".",".",".",".","7일","화","."),
    new Schedule("8일","수",".",".",".",".",".",".",".",".",".","8일","수","업무지식평가"),
    new Schedule("9일","목",".",".",".",".",".",".",".",".",".","9일","목","."),
    new Schedule("10일","금",".",".",".",".",".",".",".",".",".","10일","금","."),
    new Schedule("11일","토",".",".",".",".",".",".",".",".",".","11일","토","."),
    new Schedule("12일","일",".",".",".",".",".",".",".",".",".","12일","일","."),
    new Schedule("13일","월",".",".",".",".",".",".",".",".",".","13일","월","."),
    new Schedule("14일","화",".",".",".",".",".",".",".",".",".","14일","화","."),
    new Schedule("15일","휴일",".",".",".",".",".",".",".",".",".","15일","휴일","."),
    new Schedule("16일","목",".",".",".",".",".",".",".",".",".","16일","목","."),
    new Schedule("17일","금",".",".",".",".",".",".",".",".",".","17일","금","."),
    new Schedule("18일","토",".",".",".",".",".",".",".",".",".","18일","토","."),
    new Schedule("19일","일",".",".",".",".",".",".",".",".",".","19일","일","."),
    new Schedule("20일","월",".",".",".",".",".",".",".",".",".","20일","월","."),
    new Schedule("21일","화",".",".",".",".",".",".",".",".",".","21일","화","."),
    new Schedule("22일","수",".",".",".",".",".",".",".",".",".","22일","수","."),
    new Schedule("23일","목",".",".",".",".",".",".",".",".",".","23일","목","."),
    new Schedule("24일","금",".",".",".",".",".",".",".",".",".","24일","금","."),
    new Schedule("25일","토",".",".",".",".",".",".",".",".",".","25일","토","."),
    new Schedule("26일","일",".",".",".",".",".",".",".",".",".","26일","일","."),
    new Schedule("27일","월",".",".",".",".",".",".",".",".",".","27일","월","."),
    new Schedule("28일","화",".",".",".",".",".",".",".",".",".","28일","화","."),
    new Schedule("29일","수",".",".",".",".",".",".",".",".",".","29일","수","."),
    new Schedule("30일","목",".",".",".",".",".",".",".",".",".","30일","목","."),
    new Schedule("31일","금",".",".",".",".",".",".",".",".",".","31일","금",".")
  ]           

//6월

var schedule6 = [
    new Schedule("1일","토",".",".",".",".",".",".",".",".",".","1일","토","."),
    new Schedule("2일","일",".",".",".",".",".",".",".",".",".","2일","일","."),
    new Schedule("3일","월",".",".",".",".",".",".",".",".",".","3일","월","."),
    new Schedule("4일","화","이한기",".",".",".",".",".",".",".",".","4일","화","업무지식평가"),
    new Schedule("5일","수","이한기",".",".",".",".",".",".",".",".","5일","수","."),
    new Schedule("6일","휴일",".",".",".",".",".",".",".",".",".","6일","휴일","."),
    new Schedule("7일","금","이한기",".",".",".",".",".",".",".",".","7일","금","."),
    new Schedule("8일","토",".",".",".",".",".",".",".",".",".","8일","토","."),
    new Schedule("9일","일",".",".",".",".",".",".",".",".",".","9일","일","."),
    new Schedule("10일","월",".",".",".",".",".",".",".",".",".","10일","월","."),
    new Schedule("11일","화",".",".",".",".",".",".",".",".",".","11일","화","."),
    new Schedule("12일","수",".",".",".",".",".",".",".",".",".","12일","수","."),
    new Schedule("13일","목","김정훈",".",".",".",".",".",".",".",".","13일","목","."),
    new Schedule("14일","금","김정훈",".",".",".",".",".",".",".",".","14일","금","."),
    new Schedule("15일","토",".",".",".",".",".",".",".",".",".","15일","토","."),
    new Schedule("16일","일",".",".",".",".",".",".",".",".",".","16일","일","."),
    new Schedule("17일","월",".",".",".",".",".",".",".",".",".","17일","월","."),
    new Schedule("18일","화",".",".",".",".",".",".",".",".",".","18일","화","."),
    new Schedule("19일","수","박정범",".",".",".",".",".",".",".",".","19일","수","."),
    new Schedule("20일","목","박정범",".",".",".",".",".",".",".",".","20일","목","."),
    new Schedule("21일","금","박정범",".",".",".",".",".",".",".",".","21일","금","."),
    new Schedule("22일","토",".",".",".",".",".",".",".",".",".","22일","토","."),
    new Schedule("23일","일",".",".",".",".",".",".",".",".",".","23일","일","."),
    new Schedule("24일","월",".",".",".",".",".",".",".",".",".","24일","월","."),
    new Schedule("25일","화",".",".",".",".",".",".",".",".",".","25일","화","."),
    new Schedule("26일","수","최아람",".",".",".",".",".",".",".",".","26일","수","."),
    new Schedule("27일","목","최아람",".",".",".",".",".",".",".",".","27일","목","."),
    new Schedule("28일","금","최아람",".",".",".",".",".",".",".",".","28일","금","."),
    new Schedule("29일","토",".",".",".",".",".",".",".",".",".","29일","토","."),
    new Schedule("30일","일",".",".",".",".",".",".",".",".",".","30일","일","."),
    new Schedule("1일","월",".",".",".",".",".",".",".",".",".","1일","월","."),
    new Schedule(".",".",".",".",".",".",".",".",".",".",".",".","0","."),
]

//7월

var schedule7 =[
    new Schedule("1일","월",".",".",".",".",".",".",".",".",".","1일","월","."),
    new Schedule("2일","화",".",".",".",".",".",".",".",".",".","2일","화","."),
    new Schedule("3일","수",".",".",".",".",".",".",".",".",".","3일","수","."),
    new Schedule("4일","목",".",".",".",".",".",".",".",".",".","4일","목","."),
    new Schedule("5일","금",".",".",".",".",".",".",".",".",".","5일","금","."),
    new Schedule("6일","토",".",".",".",".",".",".",".",".",".","6일","토","."),
    new Schedule("7일","일",".",".",".",".",".",".",".",".",".","7일","일","."),
    new Schedule("8일","월",".",".",".",".",".",".",".",".",".","8일","월","."),
    new Schedule("9일","화",".",".",".",".",".",".",".",".",".","9일","화","업무지식평가"),
    new Schedule("10일","수",".",".",".",".",".",".",".",".",".","10일","수","."),
    new Schedule("11일","목",".",".",".",".",".",".",".",".",".","11일","목","."),
    new Schedule("12일","금",".",".",".",".",".",".",".",".",".","12일","금","."),
    new Schedule("13일","토",".",".",".",".",".",".",".",".",".","13일","토","."),
    new Schedule("14일","일",".",".",".",".",".",".",".",".",".","14일","일","."),
    new Schedule("15일","월",".",".",".",".",".",".",".",".",".","15일","월","."),
    new Schedule("16일","화",".",".",".",".",".",".",".",".",".","16일","화","."),
    new Schedule("17일","수",".",".",".",".",".",".",".",".",".","17일","수","."),
    new Schedule("18일","목",".",".",".",".",".",".",".",".",".","18일","목","."),
    new Schedule("19일","금",".",".",".",".",".",".",".",".",".","19일","금","."),
    new Schedule("20일","토",".",".",".",".",".",".",".",".",".","20일","토","."),
    new Schedule("21일","일",".",".",".",".",".",".",".",".",".","21일","일","."),
    new Schedule("22일","월",".",".",".",".",".",".",".",".",".","22일","월","."),
    new Schedule("23일","화",".",".",".",".",".",".",".",".",".","23일","화","."),
    new Schedule("24일","수",".",".",".",".",".",".",".",".",".","24일","수","."),
    new Schedule("25일","목","이진우",".",".",".",".",".",".",".",".","25일","목","."),
    new Schedule("26일","금","이진우",".",".",".",".",".",".",".",".","26일","금","."),
    new Schedule("27일","토",".",".",".",".",".",".",".",".",".","27일","토","."),
    new Schedule("28일","일",".",".",".",".",".",".",".",".",".","28일","일","."),
    new Schedule("29일","월","이한기",".",".",".",".",".",".",".",".","29일","월","."),
    new Schedule("30일","화","이한기",".",".",".",".",".",".",".",".","30일","화","."),
    new Schedule("31일","수",".",".",".",".",".",".",".",".",".","31일","수","."),   
]

//8월

var schedule8 =[
    new Schedule("1일","목","최아람",".",".",".",".",".",".",".",".","1일","목","."),
    new Schedule("2일","금","최아람",".",".",".",".",".",".",".",".","2일","금","."),
    new Schedule("3일","토",".",".",".",".",".",".",".",".",".","3일","토","."),
    new Schedule("4일","일",".",".",".",".",".",".",".",".",".","4일","일","."),
    new Schedule("5일","월",".",".",".",".",".",".",".",".",".","5일","월","."),
    new Schedule("6일","화",".",".",".",".",".",".",".",".",".","6일","화","업무지식평가"),
    new Schedule("7일","수",".",".",".",".",".",".",".",".",".","7일","수","."),
    new Schedule("8일","목","박정범",".",".",".",".",".",".",".",".","8일","목","."),
    new Schedule("9일","금","박정범",".",".",".",".",".",".",".",".","9일","금","."),
    new Schedule("10일","토",".",".",".",".",".",".",".",".",".","10일","토","."),
    new Schedule("11일","일",".",".",".",".",".",".",".",".",".","11일","일","."),
    new Schedule("12일","월","김정훈",".",".",".",".",".",".",".",".","12일","월","."),
    new Schedule("13일","화","김정훈",".",".",".",".",".",".",".",".","13일","화","."),
    new Schedule("14일","수","김정훈",".",".",".",".",".",".",".",".","14일","수","."),
    new Schedule("15일","휴일",".",".",".",".",".",".",".",".",".","15일","휴일","."),
    new Schedule("16일","금",".",".",".",".",".",".",".",".",".","16일","금","."),
    new Schedule("17일","토",".",".",".",".",".",".",".",".",".","17일","토","."),
    new Schedule("18일","일",".",".",".",".",".",".",".",".",".","18일","일","."),
    new Schedule("19일","월",".",".",".",".",".",".",".",".",".","19일","월","."),
    new Schedule("20일","화",".",".",".",".",".",".",".",".",".","20일","화","."),
    new Schedule("21일","수",".",".",".",".",".",".",".",".",".","21일","수","."),
    new Schedule("22일","목","백금옥",".",".",".",".",".",".",".",".","22일","목","."),
    new Schedule("23일","금","백금옥",".",".",".",".",".",".",".",".","23일","금","."),
    new Schedule("24일","토",".",".",".",".",".",".",".",".",".","24일","토","."),
    new Schedule("25일","일",".",".",".",".",".",".",".",".",".","25일","일","."),
    new Schedule("26일","월",".",".",".",".",".",".",".",".",".","26일","월","."),
    new Schedule("27일","화",".",".",".",".",".",".",".",".",".","27일","화","."),
    new Schedule("28일","수",".",".",".",".",".",".",".",".",".","28일","수","."),
    new Schedule("29일","목",".",".",".",".",".",".",".",".",".","29일","목","."),
    new Schedule("30일","금",".",".",".",".",".",".",".",".",".","30일","금","."),
    new Schedule("31일","토",".",".",".",".",".",".",".",".",".","31일","토",".")
   
]

//9월

var schedule9 = [

   
    new Schedule("1일","일",".",".",".",".",".",".",".",".",".","1일","일","."),
    new Schedule("2일","월",".",".",".",".",".",".",".",".",".","2일","월","."),
    new Schedule("3일","화",".",".",".",".",".",".",".",".",".","3일","화","."),
    new Schedule("4일","수",".",".",".",".",".",".",".",".",".","4일","수","업무지식평가"),
    new Schedule("5일","목",".",".",".",".",".",".",".",".",".","5일","목","."),
    new Schedule("6일","금",".",".",".",".",".",".",".",".",".","6일","금","."),
    new Schedule("7일","토",".",".",".",".",".",".",".",".",".","7일","토","."),
    new Schedule("8일","일",".",".",".",".",".",".",".",".",".","8일","일","."),
    new Schedule("9일","월",".",".",".",".",".",".",".",".",".","9일","월","."),
    new Schedule("10일","화",".",".",".",".",".",".",".",".",".","10일","화","."),
    new Schedule("11일","수",".",".",".",".",".",".",".",".",".","11일","수","."),
    new Schedule("12일","목",".",".",".",".",".",".",".",".",".","12일","목","."),
    new Schedule("13일","금",".",".",".",".",".",".",".",".",".","13일","금","."),
    new Schedule("14일","토",".",".",".",".",".",".",".",".",".","14일","토","."),
    new Schedule("15일","일",".",".",".",".",".",".",".",".",".","15일","일","."),
    new Schedule("16일","휴일",".",".",".",".",".",".",".",".",".","16일","휴일","."),
    new Schedule("17일","휴일",".",".",".",".",".",".",".",".",".","17일","휴일","."),
    new Schedule("18일","휴일",".",".",".",".",".",".",".",".",".","18일","휴일","."),
    new Schedule("19일","목",".",".",".",".",".",".",".",".",".","19일","목","."),
    new Schedule("20일","금",".",".",".",".",".",".",".",".",".","20일","금","."),
    new Schedule("21일","토",".",".",".",".",".",".",".",".",".","21일","토","."),
    new Schedule("22일","일",".",".",".",".",".",".",".",".",".","22일","일","."),
    new Schedule("23일","월",".",".",".",".",".",".",".",".",".","23일","월","."),
    new Schedule("24일","화",".",".",".",".",".",".",".",".",".","24일","화","."),
    new Schedule("25일","수",".",".",".",".",".",".",".",".",".","25일","수","."),
    new Schedule("26일","목",".",".",".",".",".",".",".",".",".","26일","목","."),
    new Schedule("27일","금",".",".",".",".",".",".",".",".",".","27일","금","."),
    new Schedule("28일","토",".",".",".",".",".",".",".",".",".","28일","토","."),
    new Schedule("29일","일",".",".",".",".",".",".",".",".",".","29일","일","."),
    new Schedule("30일","월",".",".",".",".",".",".",".",".",".","30일","월","."),
    new Schedule("1일","화",".",".",".",".",".",".",".",".",".","1일","화",".")
]

//10월

var schedule10 =[
    
    new Schedule("1일","화",".",".",".",".",".",".",".",".",".","1일","화","."),
    new Schedule("2일","수",".",".",".",".",".",".",".",".",".","2일","수","."),
    new Schedule("3일","휴일",".",".",".",".",".",".",".",".",".","3일","휴일","."),
    new Schedule("4일","금",".",".",".",".",".",".",".",".",".","4일","금","."),
    new Schedule("5일","토",".",".",".",".",".",".",".",".",".","5일","토","."),
    new Schedule("6일","일",".",".",".",".",".",".",".",".",".","6일","일","."),
    new Schedule("7일","월",".",".",".",".",".",".",".",".",".","7일","월","."),
    new Schedule("8일","화",".",".",".",".",".",".",".",".",".","8일","화","업무지식 평가"),
    new Schedule("9일","휴일",".",".",".",".",".",".",".",".",".","9일","휴일","."),
    new Schedule("10일","목",".",".",".",".",".",".",".",".",".","10일","목","."),
    new Schedule("11일","금",".",".",".",".",".",".",".",".",".","11일","금","."),
    new Schedule("12일","토",".",".",".",".",".",".",".",".",".","12일","토","."),
    new Schedule("13일","일",".",".",".",".",".",".",".",".",".","13일","일","."),
    new Schedule("14일","월",".",".",".",".",".",".",".",".",".","14일","월","."),
    new Schedule("15일","화",".",".",".",".",".",".",".",".",".","15일","화","."),
    new Schedule("16일","수",".",".",".",".",".",".",".",".",".","16일","수","."),
    new Schedule("17일","목",".",".",".",".",".",".",".",".",".","17일","목","."),
    new Schedule("18일","금",".",".",".",".",".",".",".",".",".","18일","금","."),
    new Schedule("19일","토",".",".",".",".",".",".",".",".",".","19일","토","."),
    new Schedule("20일","일",".",".",".",".",".",".",".",".",".","20일","일","."),
    new Schedule("21일","월",".",".",".",".",".",".",".",".",".","21일","월","."),
    new Schedule("22일","화",".",".",".",".",".",".",".",".",".","22일","화","."),
    new Schedule("23일","수","최민지",".",".",".",".",".",".",".",".","23일","수","."),
    new Schedule("24일","목","최민지",".",".",".",".",".",".",".",".","24일","목","."),
    new Schedule("25일","금","최민지",".",".",".",".",".",".",".",".","25일","금","."),
    new Schedule("26일","토",".",".",".",".",".",".",".",".",".","26일","토","."),
    new Schedule("27일","일",".",".",".",".",".",".",".",".",".","27일","일","."),
    new Schedule("28일","월",".",".",".",".",".",".",".",".",".","28일","월","."),
    new Schedule("29일","화",".",".",".",".",".",".",".",".",".","29일","화","."),
    new Schedule("30일","수",".",".",".",".",".",".",".",".",".","30일","수","."),
    new Schedule("31일","목",".",".",".",".",".",".",".",".",".","31일","목",".")
]

//11월

var schedule11 =[


    
    new Schedule("1일","금",".",".",".",".",".",".",".",".",".","1일","금","."),
    new Schedule("2일","토",".",".",".",".",".",".",".",".",".","2일","토","."),
    new Schedule("3일","일",".",".",".",".",".",".",".",".",".","3일","일","."),
    new Schedule("4일","월",".",".",".",".",".",".",".",".",".","4일","월","."),
    new Schedule("5일","화",".",".",".",".",".",".",".",".",".","5일","화","업무지식평가"),
    new Schedule("6일","수",".",".",".",".",".",".",".",".",".","6일","수","."),
    new Schedule("7일","목","백금옥",".",".",".",".",".",".",".",".","7일","목","."),
    new Schedule("8일","금","백금옥",".",".",".",".",".",".",".",".","8일","금","."),
    new Schedule("9일","토",".",".",".",".",".",".",".",".",".","9일","토","."),
    new Schedule("10일","일",".",".",".",".",".",".",".",".",".","10일","일","."),
    new Schedule("11일","월",".",".",".",".",".",".",".",".",".","11일","월","."),
    new Schedule("12일","화",".",".",".",".",".",".",".",".",".","12일","화","."),
    new Schedule("13일","수",".",".",".",".",".",".",".",".",".","13일","수","."),
    new Schedule("14일","목",".",".",".",".",".",".",".",".",".","14일","목","."),
    new Schedule("15일","금",".",".",".",".",".",".",".",".",".","15일","금","."),
    new Schedule("16일","토",".",".",".",".",".",".",".",".",".","16일","토","."),
    new Schedule("17일","일",".",".",".",".",".",".",".",".",".","17일","일","."),
    new Schedule("18일","월",".",".",".",".",".",".",".",".",".","18일","월","."),
    new Schedule("19일","화",".",".",".",".",".",".",".",".",".","19일","화","."),
    new Schedule("20일","수",".",".",".",".",".",".",".",".",".","20일","수","."),
    new Schedule("21일","목","박정범",".",".",".",".",".",".",".",".","21일","목","."),
    new Schedule("22일","금","박정범",".",".",".",".",".",".",".",".","22일","금","."),
    new Schedule("23일","토",".",".",".",".",".",".",".",".",".","23일","토","."),
    new Schedule("24일","일",".",".",".",".",".",".",".",".",".","24일","일","."),
    new Schedule("25일","월","이진우",".",".",".",".",".",".",".",".","25일","월","."),
    new Schedule("26일","화","이진우",".",".",".",".",".",".",".",".","26일","화","."),
    new Schedule("27일","수",".",".",".",".",".",".",".",".",".","27일","수","."),
    new Schedule("28일","목",".",".",".",".",".",".",".",".",".","28일","목","."),
    new Schedule("29일","금",".",".",".",".",".",".",".",".",".","29일","금","."),
    new Schedule("30일","토",".",".",".",".",".",".",".",".",".","30일","토","."),
    new Schedule("1일","일",".",".",".",".",".",".",".",".",".","1일","일",".")


    
    

]


//12월

var schedule12 =[

   
    new Schedule("1일","일",".",".",".",".",".",".",".",".",".","1일","일","."),
    new Schedule("2일","월",".",".",".",".",".",".",".",".",".","2일","월","."),
    new Schedule("3일","화",".",".",".",".",".",".",".",".",".","3일","화","."),
    new Schedule("4일","수",".",".",".",".",".",".",".",".",".","4일","수","."),
    new Schedule("5일","목",".",".",".",".",".",".",".",".",".","5일","목","."),
    new Schedule("6일","금",".",".",".",".",".",".",".",".",".","6일","금","."),
    new Schedule("7일","토",".",".",".",".",".",".",".",".",".","7일","토","."),
    new Schedule("8일","일",".",".",".",".",".",".",".",".",".","8일","일","."),
    new Schedule("9일","월",".",".",".",".",".",".",".",".",".","9일","월","."),
    new Schedule("10일","화",".",".",".",".",".",".",".",".",".","10일","화","업무지식평가"),
    new Schedule("11일","수",".",".",".",".",".",".",".",".",".","11일","수","."),
    new Schedule("12일","목",".",".",".",".",".",".",".",".",".","12일","목","."),
    new Schedule("13일","금",".",".",".",".",".",".",".",".",".","13일","금","."),
    new Schedule("14일","토",".",".",".",".",".",".",".",".",".","14일","토","."),
    new Schedule("15일","일",".",".",".",".",".",".",".",".",".","15일","일","."),
    new Schedule("16일","월",".",".",".",".",".",".",".",".",".","16일","월","."),
    new Schedule("17일","화",".",".",".",".",".",".",".",".",".","17일","화","."),
    new Schedule("18일","수",".",".",".",".",".",".",".",".",".","18일","수","."),
    new Schedule("19일","목","최민지",".",".",".",".",".",".",".",".","19일","목","."),
    new Schedule("20일","금","최민지",".",".",".",".",".",".",".",".","20일","금","."),
    new Schedule("21일","토",".",".",".",".",".",".",".",".",".","21일","토","."),
    new Schedule("22일","일",".",".",".",".",".",".",".",".",".","22일","일","."),
    new Schedule("23일","월",".",".",".",".",".",".",".",".",".","23일","월","."),
    new Schedule("24일","화",".",".",".",".",".",".",".",".",".","24일","화","."),
    new Schedule("25일","휴일",".",".",".",".",".",".",".",".",".","25일","휴일","."),
    new Schedule("26일","목","이한기",".",".",".",".",".",".",".",".","26일","목","."),
    new Schedule("27일","금","이한기",".",".",".",".",".",".",".",".","27일","금","."),
    new Schedule("28일","토",".",".",".",".",".",".",".",".",".","28일","토","."),
    new Schedule("29일","일",".",".",".",".",".",".",".",".",".","29일","일","."),
    new Schedule("30일","월",".",".",".",".",".",".",".",".",".","30일","월","."),
    new Schedule("31일","화",".",".",".",".",".",".",".",".",".","31일","화",".")

 
]


var schemonth =[schedule1,schedule2,schedule3,schedule4,schedule5,schedule6,schedule7,
    schedule8,schedule9,schedule10,schedule11,schedule12] ;

var months = new Date();
var mon = months.getMonth();
console.log(mon)


$(`#changemonth label input[value=${mon}]`).prop('checked',true)
$('.date').text(mon+1+'월');
for (var i=0 ; i<schemonth[mon].length ; i++ ){
         
     
    $('#firstline').before(` <tr class="delnode">
        <td class="tg-0lax schedule1">${schemonth[mon][i].mo}</td>
        <td class="tg-0lax schedule1">${schemonth[mon][i].week}.</td>
        <td class="tg-u4ur schedule1">${schemonth[mon][i].yun1}</td>
        <td class="tg-u4ur schedule1">${schemonth[mon][i].yun2}</td>
        <td class="tg-u4ur schedule1">${schemonth[mon][i].yun3}</td>
        <td class="tg-kd4e schedule1">${schemonth[mon][i].heal1}</td>
        <td class="tg-kd4e schedule1">${schemonth[mon][i].heal2}</td>
        <td class="tg-kd4e schedule1">${schemonth[mon][i].heal3}</td>
        <td class="tg-kd4e schedule1">${schemonth[mon][i].healtime}</td>
        <td class="tg-f7v4 schedule1">${schemonth[mon][i].dang1}</td>
        <td class="tg-f7v4 schedule1">${schemonth[mon][i].dang2}</td>
        <td class="tg-0lax schedule1">${schemonth[mon][i].day2}</td>
        <td class="tg-0lax schedule1">${schemonth[mon][i].week2}</td>
        <td class="tg-0lax schedule1">${schemonth[mon][i].memo}</td>
      </tr>`)
    }
    $("td:contains('일.')").css('background-color','lightgrey');
    $("td:contains('일.')").siblings().css('background-color','lightgrey');
    $("td:contains('토.')").css('background-color','lightgrey');
    $("td:contains('토.')").siblings().css('background-color','lightgrey');

$('#changemonth label input').on('change',function(){
        $('tr').remove('.delnode');            
        var $mon =Number($(this).val())  
        $('.date').text($mon+1+'월');
        console.log($mon);
        for (var i=0 ; i<schemonth[$mon].length ; i++ ){

$('#firstline').before(` <tr class="delnode">
    <td class="tg-0lax schedule1">${schemonth[$mon][i].mo}</td>
    <td class="tg-0lax schedule1">${schemonth[$mon][i].week}.</td>
    <td class="tg-u4ur schedule1">${schemonth[$mon][i].yun1}</td>
    <td class="tg-u4ur schedule1">${schemonth[$mon][i].yun2}</td>
    <td class="tg-u4ur schedule1">${schemonth[$mon][i].yun3}</td>
    <td class="tg-kd4e schedule1">${schemonth[$mon][i].heal1}</td>
    <td class="tg-kd4e schedule1">${schemonth[$mon][i].heal2}</td>
    <td class="tg-kd4e schedule1">${schemonth[$mon][i].heal3}</td>
    <td class="tg-kd4e schedule1">${schemonth[$mon][i].healtime}</td>
    <td class="tg-f7v4 schedule1">${schemonth[$mon][i].dang1}</td>
    <td class="tg-f7v4 schedule1">${schemonth[$mon][i].dang2}</td>
    <td class="tg-0lax schedule1">${schemonth[$mon][i].day2}</td>
    <td class="tg-0lax schedule1">${schemonth[$mon][i].week2}</td>
    <td class="tg-0lax schedule1">${schemonth[$mon][i].memo}</td>
  </tr>`);
 
  $("td:contains('일.')").css('background-color','lightgrey');
  $("td:contains('일.')").siblings().css('background-color','lightgrey');
  $("td:contains('토.')").css('background-color','lightgrey');
  $("td:contains('토.')").siblings().css('background-color','lightgrey');

} //for반복문 끝부분
    }) //change이벤트 끝부분
    

  })

