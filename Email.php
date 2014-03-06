<!DOCTYPE>
<html>
<meta>Email.php </meta>
<body>
<!--<script type="text/javascript" src="C:\wamp\www\phptest\website.js"> $(document).ready(function() {
	$("disappear").on("click", function(){
	$("#fade").fadeToggle(400);
	

	});
}); </script>-->
<?php 
$firstErr = $lastErr = $emailErr = $siblingsErr = $birthErr = $websiteErr = " ";
$first = $last = $email = $siblings = $birth = $website = " ";

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
 
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if (empty($_POST["first_name"]))
    {$firstErr = "Name is required";}   //Prints error message
    else
    {$first = test_input($_POST["first_name"]);
		if (!preg_match("/^[a-zA-Z ]*$/", $first))
			{
			$firstErr = "Only letters and white spaces allowed";
			}
	}

	if (empty($_POST["last_name"]))
    {$lastErr = "Name is required";}   //Prints error message
    else
    {$last = test_input($_POST["last_name"]);
		if (!preg_match("/^[a-zA-Z ]*$/", $last))
			{
			$lastErr = "Only letters and white spaces allowed";
			}
	}

  if (empty($_POST["email"]))
    {$emailErr = "Email is required";}
  else
	{$email = test_input($_POST["email"]);
		if (!preg_match("/([\w\-]+\@[\w-]+\.[\w-]+)/",$email))
			{
				$emailErr = "Invalid email format";
			}
	}

  if (empty($_POST["birth"]))
    {$birth = "";}
  else
   		{
			$birthErr = "MM/DD/YYYY format";
		}
	}

  if (empty($_POST["website"]))
    {$websiteErr = "Website is required";}
  else
	{$website = test_input($_POST["website"]);
		if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website))
			{
			$websiteErr = "Invalid URL";
			}
	}
	
		


?>
 

<form id="hide" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

First Name: <input type="text" name="first_name">
<span class="error">* <?php echo $firstErr;?></span>
<br><br>
Last Name: <input type="text" name="last_name">
<span class="error">* <?php echo $lastErr?></span>
<br><br>
D.O.B. <input type="text" name="birth"> <br>
<p>(e.g. 7-12)</p>
<br><br>
E-mail:
<input type="text" name="email">
<span class="error">* <?php echo $emailErr;?> </span>
<br><br>
Website:
<input type="text" name="website">
<span class="error">* <?php echo $websiteErr;?> </span>
<br><br>
Siblings?
<input type="radio" name="siblings" value="yes">Yes
<?php if (isset($siblings) && $siblings=="yes") echo "checked";?>
<input type="radio" name="siblings" value="no">No
<?php if (isset($siblings) && $siblings=="no") echo "checked";?>
<span class="error">* <?php echo $siblingsErr;?></span>
<br><br>
<label>If so, what are their names? <textarea name="comment" rows="7" cols="30"></textarea></label>
<br><br>
<input type="submit" name="submit" value="Submit"> 
</form>
<br>
<br>
<h1>Your Input</h1>
<br>
<?php
 //include "welcome.php";
include "database.php";
?>
<br>
<!--<button id="disappear">Hide this</button>-->

<?php
 include "poll.php"
?>






</body>
</html>