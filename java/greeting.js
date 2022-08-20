function getFullYmdStr(){
        var d = new Date();
        return d.getFullYear() + "y " + (d.getMonth()+1) + "M " + d.getDate() + "DAY " + d.getHours() + "H " + d.getMinutes() + 
        "분 " + d.getSeconds() + "S " +  '1234567'.charAt(d.getUTCDay())+'week';
    };
