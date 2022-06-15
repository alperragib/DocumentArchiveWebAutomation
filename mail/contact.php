  <?php
require 'vendor/autoload.php';

function sendMail($mail_adress,$subject,$content){
	$email = new \SendGrid\Mail\Mail(); 
	$email->setFrom("", "");
	$email->setSubject($subject);
	$email->addTo($mail_adress);
	$email->addContent("text/html", $content);
	$sendgrid = new \SendGrid('SG.');
		try {
			$response = $sendgrid->send($email);

			if($response->statusCode() == 202){
				return true;
			}
			else{
				return false;
			}
		} 
		catch (Exception $e) {
			return false;
		}
}

?>