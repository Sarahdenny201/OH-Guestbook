<?php
	$name = $_POST['Full Name'];
	$phone = $_POST['Phone Number'];
	$email = $_POST['Email Address'];
	$name2 = $_POST['Do you have a Real Estate Agent?'];
	$name3 = $_POST['Realtor Name'];
?>

<?php
	$email_from = 'sarah.denny@lnf.com';

	$email_subject = "Open House submition - agent - address";

	$email_body = "$name signed your open house guest book.\n".
				"New contact:\n".
				"$name\n".
				"$phone\n".
				"$email\n".
				"Do they have an agent $name2\n"
				"Agent name $name3\n"
?>

<?php
  $to = "sarah.denny@lnf.com, sarahdenny201@gmail.com";

  mail($to,$email_subject,$email_body,$headers);
?>

<?php
function IsInjected($str)
{
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );
               
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    
    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}

if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}
?>