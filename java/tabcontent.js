/* http://www.menucool.com/tabbed-content Free to use. v2013.7.6 */
(function(){var g=function(a){if(a&&a.stopPropagation)a.stopPropagation();else window.event.cancelBubble=true;var b=a?a:window.event;b.preventDefault&&b.preventDefault()},d=function(a,c,b){if(a.addEventListener)a.addEventListener(c,b,false);else a.attachEvent&&a.attachEvent("on"+c,b)},a=function(c,a){var b=new RegExp("(^| )"+a+"( |$)");return b.test(c.className)?true:false},j=function(b,c,d){if(!a(b,c))if(b.className=="")b.className=c;else if(d)b.className=c+" "+b.className;else b.className+=" "+c},h=function(a,b){var c=new RegExp("(^| )"+b+"( |$)");a.className=a.className.replace(c,"$1");a.className=a.className.replace(/ $/,"")},e=function(){var b=window.location.pathname;if(b.indexOf("/")!=-1)b=b.split("/");var a=b[b.length-1]||"root";if(a.indexOf(".")!=-1)a=a.substring(0,a.indexOf("."));if(a>20)a=a.substring(a.length-19);return a},c="mi"+e(),b=function(b,a){this.g(b,a)};b.prototype={h:function(){var b=new RegExp(c+this.a+"=(\\d+)"),a=document.cookie.match(b);return a?a[1]:this.i()},i:function(){for(var b=0,c=this.b.length;b<c;b++)if(a(this.b[b].parentNode,"selected"))return b;return 0},j:function(b,d){var c=document.getElementById(b.TargetId);if(!c)return;this.l(c);for(var a=0;a<this.b.length;a++)if(this.b[a]==b){j(b.parentNode,"selected");d&&this.d&&this.k(this.a,a)}else h(this.b[a].parentNode,"selected")},k:function(a,b){document.cookie=c+a+"="+b+"; path=/"},l:function(b){for(var a=0;a<this.c.length;a++)this.c[a].style.display=this.c[a].id==b.id?"block":"none"},m:function(){this.c=[];for(var c=this,a=0;a<this.b.length;a++){var b=document.getElementById(this.b[a].TargetId);if(b){this.c.push(b);d(this.b[a],"click",function(b){var a=this;if(a===window)a=window.event.srcElement;c.j(a,1);g(b);return false})}}},g:function(f,h){this.a=h;this.b=[];for(var e=f.getElementsByTagName("a"),i=/#([^?]+)/,a,b,c=0;c<e.length;c++){b=e[c];a=b.getAttribute("href");if(a.indexOf("#")==-1)continue;else{var d=a.match(i);if(d){a=d[1];b.TargetId=a;this.b.push(b)}else continue}}var g=f.getAttribute("data-persist")||"";this.d=g.toLowerCase()=="true"?1:0;this.m();this.n()},n:function(){var a=this.d?parseInt(this.h()):this.i();if(a>=this.b.length)a=0;this.j(this.b[a],0)}};var k=[],i=function(e){var b=false;function a(){if(b)return;b=true;setTimeout(e,4)}if(document.addEventListener)document.addEventListener("DOMContentLoaded",a,false);else if(document.attachEvent){try{var f=window.frameElement!=null}catch(g){}if(document.documentElement.doScroll&&!f){function c(){if(b)return;try{document.documentElement.doScroll("left");a()}catch(d){setTimeout(c,10)}}c()}document.attachEvent("onreadystatechange",function(){document.readyState==="complete"&&a()})}d(window,"load",a)},f=function(){for(var d=document.getElementsByTagName("ul"),c=0,e=d.length;c<e;c++)a(d[c],"tabs")&&k.push(new b(d[c],c))};i(f);return{}})()

class Teaminfo {
    constructor(_comnum,_kosid,_firstday,_name,_birth,_cellphone,_ktalkid,_inline,_ip){
        this.comnum = _comnum,
        this.kosid = _kosid,
        this.firstday = _firstday,
        this.name = _name,
        this.birth= _birth,
        this.cellphone = _cellphone,
        this.ktalkid = _ktalkid                
        this.inline = _inline
        this.ip =_ip
}}
let team =
[ new Teaminfo("31330","200867639","2008.12.15","박주영(8-12.2)","830901","010-4870-8149","82016684","56153"),
  new Teaminfo("33921","118175287","2010.05.25","이진우(10-5.3)","830214","010-9932-0450","82009880","56154","172.19.153.253"),
  new Teaminfo("34115","118175636","2010.06.08","박정범(10-6.1)","840523","010-5581-5947","82009540","56219","172.19.153.162"),
  new Teaminfo("35064","118176867","2010.08.09","김정훈77(10-8.1)","771120","010-2209-6279","82010195","56011","172.19.154.156"),
  new Teaminfo("39138","118183150","2011.05.11","최아람(11-5.2)","880112","010-6763-6647","82009303","56159"),
 new Teaminfo("51658","91037307","2013.09.16","최민지(13-9.1)","960213","010-4331-8979","82046713","56144","172.19.153.103"),
 new Teaminfo("53292","91044016","2013.12.19","이한기(13-12.2)","821007","010-2661-4384	","82057826","56217","172.19.153.105"),
 new Teaminfo("80020","91307022","2018.10.05","이윤복(18-10.1)","820117","010-8886-5570","82197538","56158","172.19.152.153"),
 new Teaminfo("34424","118176229","2010.06.29","백금옥(10-6.3)","701110","010-9277-8670","82010528","56287","172.19.152.160")
   ]

   window.onload =function(){
   
    for ( i=0 ; i<team.length; i++)
    { jQuery('#tr').after(`<tr><td>${team[i].comnum}</td>
     <td>${team[i].kosid}</td>
     <td>${team[i].firstday}</td>
     <td>${team[i].name}</td>
     <td>${team[i].birth}</td>
     <td>${team[i].cellphone}</td>
     <td>${team[i].ktalkid}</td>
     <td>${team[i].inline}</td>
     <td>${team[i].ip}</td>
     </tr>`)
    } }
