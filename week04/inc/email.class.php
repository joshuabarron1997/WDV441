<?php
class ContactForm {
	//properties
	var $firstName = "";
	var $lastName = "";
	var $dateOfBirth = "";
	var $email = "";
	var $message = "";
	var $subject = "";
	
	//functions
	function setFirst($firstName){
		$this->firstName = $firstName;
	}
	function setLast($lastName){
		$this->lastName = $lastName;
	}
	function setDate($date){
		$this->dateOfBirth = $date;
	}
	function setEmail($email){
		$this->email = $email; 
	}
	function setMessage($message){
		$this->message = $message;
	}
	function setSubject($subject){
		$this->subject = $subject;
	}
	function send(){
		$to = $this->email;
		$content = "My name is ".$this->firstName." ".$this->lastName.". My Birthday is ".$this->dateOfBirth.". I would like you to know, ".$this->message;
		$headers = "From:" . "webformtr18@joshbarron.info";
		mail($to, $this->subject, $content, $headers);
	}
}


?>