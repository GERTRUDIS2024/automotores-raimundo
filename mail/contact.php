<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "mleandroh@hotmail.com"; // Change this email to your //
$subject = "$m_subject:  $name";
$body = "Has recibido un nuevo mensaje desde el formulario del sitio web.\n\n"."Detalles:\n\nName: $name\n\n\nEmail: $email\n\nMotivo: $m_subject\n\nMensaje: $message";
$header = "De: $email";
$header .= "Responder a: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
