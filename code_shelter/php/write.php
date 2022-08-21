<?php
 $conn = mysqli_connect('localhost','root','amho73032721');
 mysqli_select_db($conn,'opentutorials');
 $result = mysqli_query($conn,"SELECT*FROM topic");
    
 ?>

<!doctype html>
<html>
 <head>
   <title>웹페이지 만들기 </title>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" 
   href="http://localhost/html공부/style1.css">
 </head>

<body id="target">
   <h1>JAVASCRIPT </h1>
    <img width ="100" src="https://img1.daumcdn.net/thumb/R1280x0
    /?scode=mtistory2&fname=https%3A%2F%2Ft1.daumcdn.net%2Fcfile%2Ftistory%2F9960713B5E05845C19"/>

   <nav>
   <ol>
      <?php
      while($row=mysqli_fetch_assoc($result)){
       echo '<li><a href="http://localhost/php/index.php?id='.$row['id'].'">'.$row['title'].'</a></li>'."\n";
        }
      ?>
       
   </ol>
  </nav>
  <div id="control">
    <input type="button" value="white" 
    onclick="document.getElementById('target').className='white'"/>
    <input type="button" value="black" 
    onclick="document.getElementById('target').className='black'"/>
    <a href="http://localhost/php/write.php">쓰기</a>
  </div>
  <article>
   <form action="http://localhost/php/process.php" method="post">
    <p>
      제목<input type="text" name="title">
      </P>
      <p>
        작성자 : <input type="text" name="author">
      </p>
      <p>
      본문 : <textarea name="description"></textarea>
      <input type="submit" name="name">
   </form>
    
  </article>
</body>
</html>
