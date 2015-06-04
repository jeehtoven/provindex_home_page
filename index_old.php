<html>
<style type="text/css">
#menu {
    width: 1400px;
    height: 35px;
    font-size: 16px;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
	text-align: center;
    text-shadow: 3px 2px 3px #333333;
    background-color: #65AC34;
    border-radius: 8px;
	position:relative;
    	
}

#menu ul {
    height: auto;
    padding: 8px 0px;
    margin: 0px;
}

#menu li { 
display: inline; 
padding: 20px; 
}

#menu a {
    text-decoration: none;
    color: #040404;
    padding: 8px 8px 8px 8px;
}

#menu a:hover {
    color: #65AC34;
    background-color: #040404;
}

#copyright {
    width: 500px;
    height: 20px;
    font-size: 16px;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    text-align: center;
    text-shadow: 3px 2px 3px #333333;
    background-color: #65AC34;
    border-radius: 8px;
	position:relative;
	right: -30%		
}
</style>
<title>Provindex, Inc.</title>
<div id="menu">
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="aboutus.php">About Us</a></li>
<li><a href="services.php">Services</a></li>
<li><a href="./trends/index.php">Trends</a></li>
<li><a href="contactus.php">Contact Us</a></li>
</ul>
</div>
<br><br><center><img src='provindex_logo.jpg'></center><br><br>
<?php
$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'provindex@gmail.com';
$password = 'Appr0ach';
 
// Initial connection to the inbox
$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());
 
// Grabs any e-mail that is not read
$emails = imap_search($inbox,'UNSEEN');
 
if($emails) {
   foreach($emails as $email_number) {
    $message = imap_fetchbody($inbox,$email_number,1.1);
    if ($message == "") { // no attachments is the usual cause of this
        $message = imap_fetchbody($inbox, $email_number, 1);
    }


$final_message = imap_base64($message);
$final_message = explode("- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -",$final_message,-1); 
foreach ($final_message as $headline) {
echo $headline . "<br><br>"; 
}
//echo $final_message . "<br><br>"; 
//var_dump(json_decode($message));  

//print_r($message);
 
   }// end foreach loop
} // end if($emails)
?>

<div id="copyright">Copyright 2015 Provindex, Inc.</div>
</html>