<html>

<body>


	 <form action = "saveRatings.php" method = "get">
	 <p>

	 Confidence Rating : 
		<select id = "confidence">
		<option >One Star!</option>
		<option>Two Stars!</option>
		<option>Three Stars!</option>
		<option>Four Stars!</option>
		<option>Five Stars!</option>
		</select>
		<br>
		<br>
		 <textarea rows="4" cols="50" maxlength="255" name = "commentC">Write your comment here. It is capped at 255 characters. </textarea>

	 </p>
	 <hr>
	<p>
	 Quality Rating : 
	 <select id = "quality">
		<option>One Star!</option>
		<option>Two Stars!</option>
		<option>Three Stars!</option>
		<option>Four Stars!</option>
		<option>Five Stars!</option>
		</select>
		<br>
		<br>
		<textarea rows="4" cols="50" maxlength="255" name = "commentQ">Write your comment here. It is capped at 255 characters. </textarea>
	 </p>
	 
		<input type="submit" value="Reject">

	</form> 
</body>
</html>