<?php if(isset($_POST["name"]))  
{
	// Read the form values
	$success = false;
	$name = isset( $_POST['name'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['name'] ) : "";
	$lName = isset( $_POST['lname'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['lname'] ) : "";
	$phone = isset( $_POST['phone'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['phone'] ) : "";
	$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
	$message = isset( $_POST['contact_message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['contact_message'] ) : "";
	
	//Headers
	$to = "alex.sup@gmx.de";
    $subject = 'Contact Us';
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	
	//body message
	$message = "First Name: ". $name . "<br> Last Name: ". $lName . "<br> Email: ". $senderEmail . "<br> phone: ". $phone . "<br> Message: " . $message . "";
	
	//Email Send Function
    $send_email = mail($to, $subject, $message, $headers);
      
    echo ($send_email) ? '<div class="success">Email wurde erfolgreich abgeschickt.</div>' : 'Error: Email wurde nicht gesendet.';
}
else
{
	echo '<div class="failed">Failed: Email nicht gesendet.</div>';
}
?>