<?php

echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<Response>';
echo    '<Say voice="woman" language="ja-jp">アンケートをセールスフォースに登録します</Say>';
echo '</Response>';

require("soapclient/SforcePartnerClient.php");

// 事前に必要な情報を宣言します。   
  
// 今回は特定のセールスフォース組織に依存しないような場合に利用する  
// Partner WSDL ファイルを利用します。  
///define("PARTNER_WSDL_FILE", "./configs/partner.wsdl.xml");
///define("WS_TWILIO_WSDL_FILE", "./configs/WS_TwilioDemo.wsdl.xml");
  
// セールスフォースへAPI接続する場合、接続元のIPアドレス許可が必要となりますが、  
// 代替手段として、今回はセキュリティトークンを発行してIPアドレス許可の設定はスキップします。  
///define("SECURITY_TOKEN", "i695PQ92Vqxj8AWp2fqlBzVX0");   
  
// API でログインするセールスフォースのアカウントです。  
///define("LOGIN_ID", "sis_developer_twilio@sisinc.co.jp.dev");  
  
// パスワードの後ろにセキュリティトークンを付けます。  
///define("LOGIN_PASS", "sis-515user" . SECURITY_TOKEN);   


// 接続用クラスを生成します。  
///$sforce_connection = new SforcePartnerClient();  
///$soap_client = $sforce_connection->createConnection(PARTNER_WSDL_FILE, null);  
  
///try {  
    // セールスフォースへログインを実行します。  
///    $login = $sforce_connection->login(LOGIN_ID, LOGIN_PASS);  
    //var_dump($login);  
///} catch (Exception $e) {  
///    var_dump($e);  
///}  

// SOAPクライアントを作成します
///$parsedURL = parse_url($sforce_connection->getLocation());
///define ("_SFDC_SERVER_", substr($parsedURL['host'],0,strpos($parsedURL['host'], '.')));  
///define ("_WS_NAME_", "WS_TwilioDemo");  
//define ("_WS_WSDL_", "sfdc/" . _WS_NAME_ . ".wsdl.xml");  
///define ("_WS_ENDPOINT_", 'https://login.salesforce.com/services/wsdl/class/' . _WS_NAME_);  
///define ("_WS_NAMESPACE_", 'http://soap.sforce.com/schemas/class/' . _WS_NAME_);

///$client = new SoapClient(WS_TWILIO_WSDL_FILE);
///$sforce_header = new SoapHeader(_WS_NAMESPACE_, "SessionHeader", array("sessionId" => $sforce_connection->getSessionId()));
///$client->__setSoapHeaders(array($sforce_header));


///echo _WS_NAME_."br";  
//echo _WS_WSDL_."br";  
///echo _WS_ENDPOINT_."br";  
///echo _WS_NAMESPACE_."p";

///try {
  // POSTされたユーザの入力を分割
  // Parameterが無い場合は終了する
///  if(empty($_POST['Digits'])) {
///      echo "Oh! No Param.";
///      return;
///  } 
  
  // call the web service via post
//  $param0 = substr($_POST['Digits'], 0, 1);
//  $param1 = substr($_POST['Digits'], 1, 1);
//  $wsParams=array($param0, $param1);
///  $wsParams=array("1", "1");
///  $response = $client->createQuestionnaire($wsParams);
  // dump the response to the browser
//   print_r($response);

// this is really bad.
///} catch (Exception $e) {
///  global $errors;
///  $errors = $e->faultstring;
///  echo "Ooop! Error: <b>" . $errors . "</b>";
///die;
///}
?>