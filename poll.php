<html>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js">
	</script>
<head>

	<script>
		function getVote(int)
			{
				if (window.XMLHttpRequest)
					{
						xmlhttp = new XMLHttpRequest(); 
					}
				else 
					{
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}	
				xmlhttp.onreadystatechange = function()
					{
						if (xmlhttp.readystate == 4 && xmlhttp.status == 200)
						{
							document.getElementById("poll").innerHTML=xhtml.responseText;
						}
					}	
				xmlhttp.open("GET", "poll_vote.php?vote="+int,true);
				xmlhttp.send();
			}
	</script>
</head>
<body>

<div id="poll"> 
<h3>Was this site helpful?</h3>
<form>
	Yes, absolutely!
<input type="radio" name="vote" value="0" onclick="getVote(this.value)">
<br>
	Eh....Not so much..
<input type="radio" name="vote" value="1" onclick="getVote(this.value)">
</form>
</div>
</body>
</html>