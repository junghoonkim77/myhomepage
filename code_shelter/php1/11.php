<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf=8">
    </head>
<body>
    <h1>java script</h1>
   <ul>
   <script charset="utf-8">
        list = new Array("김정훈","김주남","김기준","김기은");
        i=0;
        while(i < list.length) {
            document.write("<li>"+list[i]+"</li>");
            i = i+1;
        }

        </script>
    </ul>
    <h1> php</h1>
    <?php
    $list = array("김정훈","김주남","김기준","김기은");
    $i = 0;
    while ($i < count($list)) {
        echo "$list[$i]";
        $i=$i+1;
        
    }
    ?>


</body>
</html>