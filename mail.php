<?php
function sendEmail($parentEmail){
    echo "$parentEmail";
    require_once ('../PHPMailer-5.2-stable/PHPMailerAutoload.php');
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='ssl';
    $mail->Host='smtp.gmail.com';
    $mail->Port='465';
    $mail->isHTML();
    $mail->Username='rainbowcare357@gmail.com';
    $mail->Password='Rainbow123#';
    $mail->setFrom('noreply@howcode.org');
    $mail->Subject='Registered';
    $mail->Body='You were registered.';
    $mail->AddAddress('$parentEmail');
    try {
        $mail->Send();
    } catch (phpmailerException $e) {
        echo ($e);
    }
}
?>

