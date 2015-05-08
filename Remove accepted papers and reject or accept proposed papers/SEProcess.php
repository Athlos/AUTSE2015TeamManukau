<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title></title>
<style>

label {
	float: left;
}

.inputButton{
	margin-right: 5px;
}

.inputDate{
	position: absolute;
	left: 200px;
	float:left;
	top: 222px;
}

.center {
    margin-left: auto;
    margin-right: auto;
    width: 70%;
}

.centerBox {
    margin-left: auto;
    margin-right: auto;
    width: 70%;
}


.date{
	position: absolute;
	left: 900px;
	float:left;
	top: 225px;
}

statusRequired{
	position: absolute;
	left: 900px;
	float:left;
	top: 126px;
}

.post{
	position: absolute;
	left: 700px;
	float:left;
	top: 324px;
}

.reset{
	position: absolute;
	left: 800px;
	float:left;
	top: 324px;
}

.home{
	position: relative;
	left: 900px;
	float:left;
	top: 310px;
}


form{
	line-height:2em
}
.element {
  position: relative;
  top: 50%;
  transform: translateY(-50%);
}


body {
    background-image: url("wood.jpg");
    background-color: #cccccc;
}


h1   {color:blue}
p    {color:black}

</style>
</head>
<body>
<div align="center" class = "center" >
	<h1>Accept or Reject</h1>
	<form action = "poststatusprocess.php" method = "POST" style='width: 500px;'>
	<fieldset>
	<label>Status Code (required): <input type = "text" name = "statusCode"   required pattern="^S{1}[0-9]{4}"> </label>

	<br>
	
	<label>Status (required): <input type = "text" name = "status"  align = "center"  required pattern="[a-zA-Z0-9](" ")("!")(".")(",")("?")"> </label>
	
	<br>
	
	<label>Share: <input type = "radio" name = "shareSettings" value = "public" checked >Public
	<input type = "radio" name = "shareSettings" value = "friends" ">Friends
	<input type = "radio" name = "shareSettings" value = "onlyMe">Only Me
	</label>
	
	<br>
	<?php
	$date = date('Y-m-d');
	?>
	<label>Date: <input type = "text" name = "date"  value = "<?php echo date('d-m-Y'); ?>" required></label>
	
	<br>
	<!-- its permission[] becuase that is the recommended way to do this according to http://stackoverflow.com/questions/4997252/get-post-from-multiple-checkboxes-->
	<!-- value is 1 for checked and 0 if not checked(0 is assumed)-->
	<label>Permission Type: <input type="checkbox" name="permissionLike" value="True"> Allow Like
	<input type="checkbox" name="permissionComment" value="True"> Allow Comment
	<input type="checkbox" name="permissionShare" value="True"> Allow Share</label>

	<br><br>
	
	<input type = "submit" value = "Post" style = "float: left;" class = "inputButton" >
	
	<input type = "reset" value = "Reset" style = "float: left;" class = "inputButton" >
	</fieldset>
	</form>
	<!-- This returns to the home page-->
	<form action="index.php" >
		<input type="submit" value="Home Page" >
	</form>
	</div>
</body>
</html> 