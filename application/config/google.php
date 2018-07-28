<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config['clientId'] = '283108941912-fko46qcdu161lolrelna7l2qkhiubnpg.apps.googleusercontent.com'; //add your client id
$config['clientSecret'] = '8eONajpAdStGQc9HVmM7RENS'; //add your client secret
$config['redirectUri'] = base_url().'login/loginwithgoogle'; //add your redirect uri
$config['apiKey'] = ''; //add your api key here
$config['applicationName'] = base_url().'login with google'; //application name for the api
$config['dscope'] = "https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email";

?>
