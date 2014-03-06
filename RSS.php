<html>
<head>
<script type></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js">
	function showRSS(feed)
		{
			if (feed.length==0)
				{	
					document.getElementById("rssOutput").innerHTML=""
					return;
				}
			if (window.XMLHTTPRequest)
				{
					xmlhttp=new XMLHTTPRequest();	
				}
			else
				{	
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
			xmlhttp.onreadystatechange = function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{	
							document.getElementById("rssOutput").innerHTML=xmlhttp.responseText;
						}
				}
			xmlhttp.open("GET", "getrss.php?q="+str,true);
			xmlhttp.send();
		}
</script>
</head>
<body>

<form>
<select onchange="showRSS(this.value)">
<option value="">Pick a RSS-feed:</option>
<option value="Google">Google News</option>
<option value="MSNBC">MSNBC News</option>
<option value="MangaStream">Mangastream</option>
</select>
</form>
<br>
<div id="rssOutput">RSS-feed will be listed here...</div>
</body>
</html>