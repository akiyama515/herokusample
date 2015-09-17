<?php
  header("content-type: text/xml");
  
  $POST[Answer1] = $_POST['Digits'];
//  $tel_from = $_POST['From'];
?>

<Response>
  <Gather timeout="60" numDigits="1" action="twilio_response.php>
    <Say voice="woman" language="ja-jp">
      質問2   興味を持った部署がかんソ部の人は1を。。産ソ部の人は2を。。金ソ部の人は3を。。ソ部の人は4を。押してください
    </Say>
  </Gather>
</Response>
