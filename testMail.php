<?php
	include ("PHPMailer/src/Exception.php");
	include ("PHPMailer/src/OAuth.php");
	include ("PHPMailer/src/POP3.php");
	include ("PHPMailer/src/PHPMailer.php");
	include ("PHPMailer/src/SMTP.php");

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	function sendMail($sendEmail, $subject, $body, $altBody) {
        $mail = new PHPMailer(true);
	try {
		$mail->SMTPDebug = 0;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'batoi1271.doe@gmail.com';
		$mail->Password = 'Toi@123456789';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;
        $mail->CharSet='UTF-8';
        $mail->setFrom('batoi1271.doe@gmail.com');
        $mail->addAddress($sendEmail);
        $mail->isHTML(true);
            $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = $altBody;
        $mail->send();
        echo 'Message has been sent';
        } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->Errorlnfo;
	}
    }
?>