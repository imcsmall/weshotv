<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<style type="text/css">
body {
	background-color: #C30;
}
</style>
</head>

<body>
<p><img src="soccer-image.php?title=<?php echo urlencode($_POST["title"]) ."&subtitle=" . urlencode($_POST["subtitle"]) ?>" width="853" height="114" alt="Soccer Lower Third" />
</p>
<form id="form1" name="form1" method="post" action="">
  <p>
    <label for="title">Title</label>
    <input name="title" type="text" id="title" value="<?php echo $_POST["title"] ?>" />
  </p>
  <p>
    <label for="subtitle">Sub-Title</label>
    <input name="subtitle" type="text" id="subtitle" value="<?php echo $_POST["subtitle"] ?>" />
  </p>
  <p>submit
    <input type="submit" name="submit" id="submit" value="Submit" />
  </p>
</form>
<p><img src="soccer-score.php" width="480" height="135" alt="scoreboard" /></p>
</body>
</html>