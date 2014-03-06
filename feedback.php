<!DOCTYPE>
<html>
<body>

<h2>Want to send some feedback?</h2>

<?php
/**function spamfilter($field)
{
//Clean e-mail 
$field=filter_var($field, FILTER_SANITIZE_EMAIL);
// Validation
if(filter_var($field, FILTER_SANITIZE_EMAIL)){
	return TRUE;
	}
else
{
	return FALSE;
	}
}*/
$sendErr = $titleErr = $messageErr = " ";
$send 	 = $title 	 = $message    = " ";

if (!isset($_POST["submit"]))//sending feedback
{
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{

	if (empty($_POST["from"]))
    	{$sendErr = "Email is required";}
  	else
		{$send = test_input($_POST["from"]);
			if (!preg_match("/([\w\-]+\@[\w-]+\.[\w-]+)/",$send))
				{
					$sendErr = "Invalid email format";
				}
	}
	

	if (empty($_POST["subject"]))
	    {$subjectErr = "Subject is required";}   // Prints error message
    else
    	{$title = test_input($_POST["subject"]);
		if (!preg_match("/^[a-zA-Z ]*$/", $title))
				{
					$titleErr = "Only letters and white spaces allowed";
				}

	if (empty($_POST["message"]))
    	{$messageErr = "The message requires some text doesn't it?";}   //Prints error message
    else
    	{$message = test_input($_POST["message"]);
			if (!preg_match("/^[a-zA-Z ]*$/", $message))
				{
					$messageErr = "<strong>"."C\'mon man!"."<strong>"."only letters and white spaces allowed!";
				}		
}
//TO BE CONTINUED
if (!isset($_POST["submit"])){

?>


<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
From: <input type="text" name="from"> <br>
Subject: <input type="text" name="subject"> <br>
Message: <textarea rows="10" cols="40" name="message"></textarea><br>
<input type="submit" name="submit"  value="Submit Feedback">
</form>

<?php

}
else	
	// user has submitted a form
{
	// check if "from" is included
	if (isset($_POST["from"]))
		{
	// "from" email address validation
				$from    = $_POST["from"]; 
				$subject = "Test PHP" . $_POST["subject"];
				$message = $_POST["message"];
				// (PHP rule) messages can not be over 70 characters
				$message = wordwrap($message, 70);
				ini_set("sendmail_from", "webmaster@something.com");
				ini_set("SMTP", "localhost");
				ini_set("smtp_port", 25);
				mail("dnlham127@gmail.com", $subject, $message,"From: $from\n");
				echo "Thank you for your feedback.";
			
		}
	}

?>


</body>
</html>