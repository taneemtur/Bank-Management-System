<?php
$success = "";
	if(isset($_POST['submit'])){
		$accname = $_POST['firstname'];
		$accno = $_POST['accno'];
		$acciban = $_POST['iban'];
		$accemail = $_POST['emailid'];
		$accpassword = $_POST['password'];
		// $acctype = $_POST['accounttype'];
		$accbalance = $_POST['accountbalance'];
		$accdate = date('y-m-d');
		$ins_sql = "INSERT INTO accounts( accno, customerid,  accountbalance, accopendate) VALUES 
					('".$accno."', '".$accbalance."', '".$accdate."', '".$accdate."')";
		$run_sql = mysqli_query($con,$ins_sql);
		$temp = mysqli_affected_rows($con);
		if($temp>0){
			$in_sql = "INSERT INTO customers(firstname,customerid, iban,emailid, password) VALUES 
					('".$accname."','".$acciban."', '".$accemail."', '".$accpassword."')";
			$ru_sql = mysqli_query($con,$in_sql);
			$success = "Account added successfully!";
		}else{
			$success = "Something went wrong!";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Credit.com - Credit Company </title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 d-flex justify-content-between">
                        <!-- Logo Area -->
                        <div class="logo">
                            <a><img src="img/core-img/logo.png" alt=""></a>
                        </div>

                        <!-- Top Contact Info -->
                        <div class="top-contact-info d-flex align-items-center">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="25 th Street Avenue, Karachi, PAK"><img src="img/core-img/placeholder.png" alt=""> <span>25 th Street Avenue, Karachi, PAK</span></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="info@credit.com"><img src="img/core-img/message.png" alt=""> <span>info@credit.com</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="credit-main-menu" id="sticker">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="creditNav">

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
namespace QuickEmailVerification\HttpClient;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
/**
 * Main HttpClient which is used by Api classes
 * @package QuickEmailVerification\HttpClient
 */
class HttpClient implements HttpClientInterface
{
    /**
     * @var Client
     */
    private $client;
    /**
     * @var array
     */
    private static $options = [
        'base_uri'=>'http://api.quickemailverification.com',
        'api_version' => 'v1',
        'headers' => [
            'user-agent' => 'quickemailverification-php/v1.0.2 (https://github.com/quickemailverification/quickemailverification-php)'
        ]
    ];
    
    public function __construct($auth = '', array $options = [])
    {
        $options = array_merge(self::$options, $options);
        $options['headers']['Authorization'] = sprintf('token %s', $auth);
        $this->client = new Client($options);
    }
    /**
     * @param $path
     * @param array $body
     * @param array $options
     * @return Response
     * @throws \ErrorException|\RuntimeException
     */
    public function get($path, array $params = [], array $options = [])
    {
        return $this->request($path, [], 'GET', array_merge($options, ['query' => $params]));
    }
    public function post($path, $body, array $options = [])
    {
        return $this->request($path, $body, 'POST', $options);
    }
    public function patch($path, $body, array $options = [])
    {
        return $this->request($path, $body, 'PATCH', $options);
    }
    public function delete($path, $body, array $options = [])
    {
        return $this->request($path, $body, 'DELETE', $options);
    }
    public function put($path, $body, array $options = [])
    {
        return $this->request($path, $body, 'PUT', $options);
    }
    private function request($path, array $body = [], $httpMethod = 'GET', array $options = [])
    {
        if (isset($options['body'])) {
            $body = array_merge($options['body'], $body);
        }
        $headers = [];
        if (isset($options['headers'])) {
            $headers = $options['headers'];
            unset($options['headers']);
        }
        $options['body'] = json_encode($body);
        $options['headers'] = array_merge($headers, self::$options['headers']);
        $options = array_merge($options, self::$options);
        try {
            $response = $this->client->request($httpMethod, $path, $options);
        } catch (BadResponseException $e) {
            throw new \ErrorException($e->getMessage(), $e->getResponse()->getStatusCode());
        } catch (\LogicException $e) {
            throw new \ErrorException($e->getMessage(), $e->getCode());
        } catch (\RuntimeException $e) {
            throw new \ErrorException($e->getMessage(), $e->getCode());
        }
        return new Response(json_decode($response->getBody()->getContents(), true), $response->getStatusCode(), $response->getHeaders());
    }
}