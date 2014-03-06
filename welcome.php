<?php 
// define variables and set to empty values
$name = $email = $siblings = $birth = "";
$nameErr = $emailErr = $siblingsErr = $birthErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$first   = test_input($_POST["first_name"]);
	$last    = test_input($_POST["last_name"]);
	$email   = test_input($_POST["email"]);
	$website = test_input($_POST["birth"]);
	/*$comment = test_input($_POST["comment"]);*/
	if (empty($_POST["siblings"]))
		{$siblingsErr = "This field is required";}
	else
		{$siblings = test_input($_POST["siblings"]);}
		
}

/*function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}*/
?>






<strong>Welcome</strong>  <?php if(isset($first) && $first != NULL)echo $_POST["first_name"] . " "; 
if(isset($last) && $last != NULL)echo$_POST["last_name"]; ?>
<br>
<br>
<strong>Your email address is:</strong> <?php if(isset($email) && $email != NULL)echo $_POST["email"]; ?><br>
<br>
<br>
<a href="<?php if (isset($email) && $email)echo $_POST['website']?>" >Click Here</a> to view your site.<br>
