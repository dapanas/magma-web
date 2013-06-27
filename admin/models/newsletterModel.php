<?php
class newsletterModel extends ModelBase
{
	

	public function send()
	{   

			include('../lib/class/class.phpmailer.php');
			
			// Get users info
			$consulta = $this->db->prepare("SELECT email FROM accounts where newsletter > 0");
			$consulta->execute();			
			// Post Variables
			$emailSubject = $_POST['emailSubject'];
			$emailBody = $_POST['emailBody'];
			$rows = $consulta->fetchAll();
			$r = '';
			foreach($rows as $row) {
		
				$emailUser = $row['email'];
				// Define mail object and mail parameters
				$mail = new PHPMailer();
				$mail->From = 'noreply@publicaenmagma.es';
				$mail->FromName = 'Magma';
				$mail->AddAddress($emailUser);
				$mail->Subject = $emailSubject;
				$mail->Body = $emailBody;
				// Send and verify
				if(!$mail->Send()) {
				$r .= 'No se ha enviado a '. $emailUser.'<br>';
				$r .= 'Error es: '. $mail->ErrorInfo.'<br>';
				} else {
				$r .= 'Se ha enviado a '.$emailUser.'<br>';
				}
			}

		return $r;
	}
}
?>
