<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Login with Google for Codeigniter
 *
 * Library for Codeigniter to authenticate users through Google OAuth 2.0 and get user profile info
 *
 * @authors     Harsha G, Nick Humphries
 * @license     MIT
 * @link        https://github.com/angel-of-death/Codeigniter-Google-OAuth-Login
 */

class Google {
	public function __construct()
	{
		$this->ci =& get_instance();

		$config = $this->ci->load->config('google');

		$fcpath = FCPATH . 'google-api-php-client-2.2.1/vendor/autoload.php';

  	include_once $fcpath;

		$this->ci->load->library('session');

		$this->client = new Google_Client();
    $this->client->setApplicationName($this->ci->config->item('applicationName'));

    $this->client->setClientId($this->ci->config->item('clientId'));
    $this->client->setClientSecret($this->ci->config->item('clientSecret'));
    $this->client->setRedirectUri($this->ci->config->item('redirectUri'));
    $this->client->setDeveloperKey($this->ci->config->item('apiKey'));

    $this->client->addScope('https://www.googleapis.com/auth/userinfo.email');

    $this->oauth2 = new Google_Service_Oauth2($this->client);

	}

	public function loginURL() {
		return $this->client->createAuthUrl();
  }

    public function getAuthenticate() {
    	$creds = $this->client->authenticate($_GET['code']);

        return $creds;
    }

    public function getAccessToken() {
        return $this->client->getAccessToken();
    }

    // public function setAccessToken() {
    //     $token = $this->client->setAccessToken();

    //     var_dump($token);
    //     return $token;
    // }

    public function revokeToken() {
        return $this->client->revokeToken();
    }

    public function getUserInfo() {
        return $this->oauth2->userinfo->get();
    }

}

?>
