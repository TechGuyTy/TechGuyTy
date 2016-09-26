<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="comment_style.css">
<script type="text/javascript" src="jquery.min.js"></script>

<link rel="stylesheet" href="Styles.css" media="screen" title="no title" charset="utf-8">

<script type="text/javascript">
function post()
{
  var comment = document.getElementById("comment").value;
  var name = document.getElementById("username").value;
  var link =document.getElementById("link").value;
  if(comment && link)
  {
    alert("Successful Post!");
    $.ajax
    ({
      type: 'post',
      url: 'post_comment.php',
      data:
      {
         user_comm:comment,
	     user_name:name,
       user_link:linkto
      },
      success: function (response)
      {
	    document.getElementById("all_comments").innerHTML=response+document.getElementById("all_comments").innerHTML;
	    document.getElementById("comment").value="";
        document.getElementById("username").value="";

      }
    });

  }else{
    alert("You're missing a field, try again!");
  return false;}
}
</script>

</head>

<body>
<div class="container ">
<div class="container main-container">



  <h1>Welcome to the resource holder!</h1>
  <p class="white-text">
    Please submit a description of why the resource will be helpful , and a link!
  </p>

  <form method='post' action="" onsubmit="return post();">
  <textarea id="comment" placeholder="Write Your Comment Here....."></textarea>
  <br>
  <input type="text" id="link" placeholder="Resource Link">
  <br>
  <input type="text" id="username" placeholder="Your Name">
  <br>
  <input type="submit" value="Post Comment">
  </form>

  <div id="all_comments">
  <?php
    $host="176.32.230.47"; //176.32.230.47
    $username="cl59-techguyty";
    $password="Ft.erBX9-";
    $databasename="cl59-techguyty";

    $connect=mysql_connect($host,$username,$password);
    $db=mysql_select_db($databasename);

    $comm = mysql_query("select name,comment,post_time, link from comments order by post_time desc");
    while($row=mysql_fetch_array($comm))
    {
	  $name=$row['name'];
	  $comment=$row['comment'];
      $time=$row['post_time'];
      $linkto=$row['link'];

    ?>

	<div class="comment_div ">
	  <p class="name">Posted By:<?php echo $name;?></p>
      <p class="comment"><wbr><?php echo $comment;?><span></p> <!--need a spot for link-->
	  <p class="time"><?php echo $time;?> <span class="link-icon"><a href="<?php echo $linkto;?>">LINK</a><span></p>
	</div>

    <?php
    }
    ?>
  </div>
  </div>
</div>
</body>
</html>
