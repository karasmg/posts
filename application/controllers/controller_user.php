<?php

class Controller_User extends Controller
{

    function __construct()
    {
        $this->model = new Model_User();
        $this->view = new View();
    }

    function action_login()
    {
        $fb = new Facebook\Facebook([
            'app_id' => '1117093858416886',
            'app_secret' => 'd0b7bace2e128956dd75ebf64c0121dd',
            'default_graph_version' => 'v2.8',
        ]);


        $permissions = []; // optional
        $helper = $fb->getRedirectLoginHelper();
        $accessToken = $helper->getAccessToken();

        if (isset($accessToken)) {

            $url = "https://graph.facebook.com/v2.8/me?fields=id,name,gender,email,picture,cover&access_token={$accessToken}";
            $headers = array("Content-type: application/json");


            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
            curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3");
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            $st = curl_exec($ch);
            $result = json_decode($st, TRUE);
            echo "My name: " . $result['name'];
            echo "Email: " . $result['email'];
            //echo "<img src=" . $result['cover']['source'] . ">";

        } else {
            $loginUrl = $helper->getLoginUrl('https://posts.local/user/login', $permissions);
            $this->view->generate('login_view.php', 'template_view.php', [
                'loginUrl' => $loginUrl
            ]);
        }

    }


}
