<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf=8">
<body>
    <h1>java script</h1>
    <ol>
    <script charset="utf=8">
     i = 0;
     while (i<10) {
         document.write("<li>hello"+i +"world</li>");
         document.write(i);
         i++ ;
        }    
    </script>

   </ol>
    <h1> php</h1>
    <ol>
    <?php
     $i = 0;
     while($i < 10) {
         echo  ` <li> hello world </li>`;
         $i++ ;
        echo $i;

        }
    ?>
    </ol>

</body>
</html>