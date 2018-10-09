<!DOCTYPE html>
<html>
    <head>
        <title>Protected by Next-Gen AumWAF</title>
        <style type="text/css">
        body {
          display: block;
          font-family: consolas !important;
          white-space: pre;
          font-size: 12px;
          margin: 1em 0px;
        }
        </style>
    </head>
    <body>
      <?php 
      if(!empty($_POST['code'])) {
      	if(preg_match('/\<\?/i', $_POST['code'])) {
      		die("Your request has been blocked by AumWAF");
      	} else {
      		die("Internal Server Error");
      	}
      }
      ?>
      <form action="" method="POST">
      	<textarea name="code" rows="5" cols="50"></textarea>
      	<input type="submit" value="Submit">
      </form>
    </body>
</html>
