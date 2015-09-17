<?php
  header("content-type: text/xml");
  
  $answer1 = $_POST['Digits'];
//  $tel_from = $_POST['From'];
?>

<Response>
  <Say voice="woman" language="ja-jp">
    質問2   興味を持った部署がかんソ部の人は1を。。産ソ部の人は2を。。金ソ部の人は3を。。ソ部の人は4を。押してください
  </Say>
  <Gather timeout="60" numDigits="1" />
</Response>


<?php
// Salesforceへの登録処理
// 事前に必要な情報を宣言します
require_once dirname(__FILE__) . '/soapclient/SforcePartnerClient.php';

// 今回は特定のセールスフォース組織に依存しないような場合に利用する  
// Partner WSDL ファイルを利用します。  
define("PARTNER_WSDL_FILE", "./configs/partner.wsdl.xml");
define("WS_TWILIO_WSDL_FILE", "./configs/WS_TwilioDemo.wsdl.xml");
  
// セールスフォースへAPI接続する場合、接続元のIPアドレス許可が必要となりますが、  
// 代替手段として、今回はセキュリティトークンを発行してIPアドレス許可の設定はスキップします。  
define("SECURITY_TOKEN", "i695PQ92Vqxj8AWp2fqlBzVX0");   
  
// API でログインするセールスフォースのアカウントです。  
define("LOGIN_ID", "sis_twilio@sisinc.co.jp.dev");  

// パスワードの後ろにセキュリティトークンを付けます。  
define("LOGIN_PASS", "sis-515user" . SECURITY_TOKEN);   


// 接続用クラスを生成します。  
$sforce_connection = new SforcePartnerClient();  
$soap_client = $sforce_connection->createConnection(PARTNER_WSDL_FILE, null);  
  
try {  
    // セールスフォースへログインを実行します。  
    $login = $sforce_connection->login(LOGIN_ID, LOGIN_PASS);  
    //var_dump($login);  
} catch (Exception $e) {  
    var_dump($e);  
}  

// SOAPクライアントを作成します
$parsedURL = parse_url($sforce_connection->getLocation());
define ("_SFDC_SERVER_", substr($parsedURL['host'],0,strpos($parsedURL['host'], '.')));  
define ("_WS_NAME_", "WS_TwilioDemo");  
define ("_WS_ENDPOINT_", 'https://login.salesforce.com/services/wsdl/class/' . _WS_NAME_);  
define ("_WS_NAMESPACE_", 'http://soap.sforce.com/schemas/class/' . _WS_NAME_);

$client = new SoapClient(WS_TWILIO_WSDL_FILE);
$sforce_header = new SoapHeader(_WS_NAMESPACE_, "SessionHeader", array("sessionId" => $sforce_connection->getSessionId()));
$client->__setSoapHeaders(array($sforce_header));

try {
  // POSTされたユーザの入力を分割
  // Parameterが無い場合は終了する
  if(empty($_POST['Digits'])) {
      echo "Oh! No Param.";
      return;
  } 
  
  // call the web service via post
  $wsParams=array($answer1, $_POST['Digits']);
  $response = $client->createQuestionnaire($wsParams);
  echo '<Response>';
  echo    '<Say voice="woman" language="ja-jp">セールスフォースに登録しました。アンケートの協力ありがとうございます。</Say>';
  echo '</Response>';

// this is really bad.
} catch (Exception $e) {
  global $errors;
  $errors = $e->faultstring;
  echo "Ooop! Error: <b>" . $errors . "</b>";
  die;
}
?>
