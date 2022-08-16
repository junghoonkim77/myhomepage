           function getYmd10(){
            var d = new Date();
            return d.getFullYear() + "-" + ((d.getMonth() + 1) > 9 ? (d.getMonth() + 1).toString() : "0" + (d.getMonth() + 1)) + "-" + 
            (d.getDate() > 9 ? d.getDate().toString() : "0" + d.getDate().toString());
            } ;
        
         //오늘날짜 중 시분초까지 계산
            
           function getFullYmdStr(){
                var d = new Date();
                return d.getFullYear() + "년 " + (d.getMonth()+1) + "월 " + d.getDate() + "일 " + d.getHours() + "시 " + d.getMinutes() + 
                "분 " + d.getSeconds() + "초 " +  '일월화수목금토'.charAt(d.getUTCDay())+'요일';
            };
        
