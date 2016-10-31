<?php
use Mailgun\Mailgun;

Class SuggesterEmailView{

	public $data;

	public function __construct($data){
		$this->data = $data;
	}
	
	public function render(){
		extract($this->data);
		$this->sendEmail("templates/suggesteremail.inc.php");
	}

	public function sendEmail($templateFile){

		extract($this->data);

		# instantiate the SDK with your API credentials and define your domain. 
			$mg = new Mailgun("key-51f57053fbdbccb8908aad52176084c5");
			$domain = "sandbox709c3852794c4baca4979bf825742fd0.mailgun.org";

			// open up a buffer to store details of templates file.
			
			ob_start();

			include $templateFile;

			$emailBody = ob_get_clean();

			# Now, compose and send your message.
			$mg->sendMessage($domain, array(
				'from'    => $emailHeader['from'],
			    'to'      => $emailHeader['to'],
			    'subject' => $emailHeader['subject'],
			    'text'    => $emailBody
			    ));


	
	}
}

?>