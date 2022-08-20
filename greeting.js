function getFullYmdStr()
      { var d = new Date(); return d.getFullYear() + "년 " + (d.getMonth()+1) + "월 " + d.getDate() + "일 " + d.getHours() + "시 " + d.getMinutes() + "분 " + d.getSeconds() + "초 " + '일월화수목금토'.charAt(d.getUTCDay())+'요일'; };
       function daydiff(){
             document.getElementById("today_t").innerHTML =getFullYmdStr();
		};
