<?php
$mysqli = new mysqli('localhost', 'hackme', 'da2IkkV3xfn9h4RS', 'hackme');

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
?>
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
	if( isset($_REQUEST['id']) ) {
	    if(preg_match("/'?(?:\w*)\W*?[a-z].*(R|ELECT|OIN|NTO|HERE|NION)/i", $_REQUEST['id'])){
	        die("Your request has been blocked by AumWAF");
	    }
      if(stripos(json_encode($_SERVER), 'sqlmap') !== false) {
        die("Your request has been blocked by AumWAF");
      }
      if(stripos(json_encode($_SERVER), 'scan') !== false) {
        die("Your request has been blocked by AumWAF");
      }
  		$sql = $mysqli->query('SELECT * FROM tbl_hackme WHERE id = ' . $_GET['id']);
  		if($mysqli->error) {
  			echo($mysqli->error);
  		} else {
  			$data = $sql->fetch_object();
  			echo $data->col1;
  		}
	}
	?>
    </body>
</html>