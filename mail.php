<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];
header('Content-Type: application/json');
if ($name === ''){
  print json_encode(array('message' => 'Pole Twoje imię nie może pozostać puste!', 'code' => 0));
  exit();
}
if ($email === ''){
  print json_encode(array('message' => 'Pole Twój adres e-mail nie może pozostać puste!', 'code' => 0));
  exit();
} else {
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
  print json_encode(array('message' => 'Pole Twój adres e-mail zawiera nie poprawny format!', 'code' => 0));
  exit();
  }
}
if ($subject === ''){
  print json_encode(array('message' => 'Pole Temat nie może pozostać puste!', 'code' => 0));
  exit();
}
if ($message === ''){
  print json_encode(array('message' => 'Pole Twoja wiadomość nie może pozostać puste!', 'code' => 0));
  exit();
}
$content="WIADOMOŚĆ WYSŁANA OD | IMIĘ: $name \nADRES E-MAIL: $email \nWIADOMOŚĆ: $message";
$recipient = "kontakt@mfaldzinski.pl";
$mailheader = "NADAWCA | E-MAIL: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
print json_encode(array('message' => 'Twoja wiadomość została wysłana!', 'code' => 1));
exit();
?>
