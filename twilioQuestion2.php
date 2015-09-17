<?php
//  header("content-type: text/xml");
  
//  var_dump($_POST);

  $answer1 = $_POST['Digits'];
  var_dump($answer1);

?>

<Response>
  <Gather timeout="60" numDigits="1" action="twilio_response.php?answer1=<?php  $answer1  ?>" method="GET">
    <Say voice="woman" language="ja-jp">
      質問2   興味を持った部署がかんソ部の人は1を。。産ソ部の人は2を。。金ソ部の人は3を。。ソ部の人は4を。押してください
    </Say>
  </Gather>
</Response>
