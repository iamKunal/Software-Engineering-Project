<?php
session_start();

require_once "../vendor/autoload.php";

class EmailFormat{
	public $subject, $body, $altbody;
	function __construct(){
		$subject = "Automatically Generated Subject";
		$body = "No Content";
		$altbody = "No Content";
	}
}

class MailHandler{
	private $mail;
	function __construct(){
		require_once dirname(__FILE__).'/mail_connect.php';
		$sendmail = new MailConnect();
		$this->mail = $sendmail->connect();
	}
	private function Send($content, $to_name, $to_add){
		$this->mail->ClearAllRecipients( );
		$this->mail->addAddress($to_add, $to_name);
		$this->mail->isHTML(true);
		$this->mail->Subject = $content->subject;
		$this->mail->Body = $content->body;
		$this->mail->AltBody = $content->altbody;
		if(!$this->mail->send()) {
    			return 0;
		} 
		else {
    			return 1;
		}
	}
	public function notify_rec($to_name, $to_add){
		$email = new EmailFormat();
		$email->subject = "new recommendation request";
		$email->body = "<b>Hi $to_name </b> <br> You have a new recommendation request. Please log into IITI LPS to take action. <br> <i>Thanks</i>";
		return $this->Send($email, $to_name, $to_add);
	}
	public function notify_apr($to_name, $to_add){
		$email = new EmailFormat();
		$email->subject = "new approval request";
		$email->body = "<b>Hi $to_name </b> <br> You have a new approval request. Please log into IITI LPS to take action. <br> <i>Thanks</i>";
		return $this->Send($email, $to_name, $to_add);
	}
	public function join_notify($status){
		$email = new EmailFormat();
		$to_name = $_SESSION['myname'];
		$to_add = $_SESSION['username'];
		if($status){
			$email->subject = "Joining Report Submitted";
			$email->body = "<b>Hi $to_name </b> <br> We are pleased to inform you that your Joining Report has been successfully submitted and processed. <br> <i>Thanks</i>";
		}
		else{
			$email->subject = "Failed to submit Joining Report";
			$email->body = "<b>Hi $to_name </b> <br> We failed to process your Joining Report. Kindly fill it again. Please recheck your details if problem persists. <br> <i>Thanks</i>";	
		}
		return $this->Send($email, $to_name, $to_add);

	}
}

?>
