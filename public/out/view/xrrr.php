<?php
if (isset($_GET['step']) && $_GET['step'] == 1) {
    sleep(0);
    header('Location: ?step=2');
}elseif (isset($_GET['step']) && $_GET['step'] == 2) {
    sleep(1);
    header('Location: '.$login);
}

//if (isset($_GET['share']) && $_GET['share'] == 1) {
//    header('Location: '.base_url().'how_sexy_are_you/');
//}

?>
<div class="container">

    <div dir="ltr">
        <div class="row">
            <div class="col-md-8">
                <div class="jumbotron text-center quiz step-0">
                    <div class="jumbotron-container">
                        <div class="horizontal-ad">
                            <!-- Adsense -->

                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- quizocean.com -->
                            <ins class="adsbygoogle"
                                 style="display:block"
                                 data-ad-client="ca-pub-5489420758437700"
                                 data-ad-slot="3012129637"
                                 data-ad-format="auto"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>
                        <p></p>

                        <div class="quiz-analyse" style="display: none">
                            <img src="<?php echo asset_url(); ?>/img/loading.gif" style="width: 140px;" class="main-loader" />
                            <br/>
                            <br/>
                            <p id="status-text">
                                <?php
                                if (!isset($_GET['step'])) {
                                    echo "Analysing Facebook profile ...";
                                }elseif (isset($_GET['step']) && $_GET['step'] == 2) {
                                    echo "Calculating results ...";
                                }
                                ?>
                            </p>
                            <div class="like-box">
                                <center><h4>Please Like Us!</h4></center>
                                <div class="fb-like head-like" data-layout="button_count" data-action="like" data-href="https://www.facebook.com/QuizOcean-968665643215083" data-show-faces="false" data-share="false">
                                </div><br></div>
                        </div>

                        <?php
                        $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                        if (strpos($url,'result') !== false && strpos($url,'share') == false) {
                            echo '
<div class="quiz-cover">
<a class="fb-box-share fb-box-share-single" href="#" onclick="return share_and_redirect(\''.$url.'?share=1\', \''.$url.'?share=1\')">
    <span class="fb-box-share-icon"></span>
    <span class="fb-box-share-text">Share On Facebook</span>
</a>
<div style="padding: 10px 0 5px">
</div>
<a href="#" onclick="return share_and_redirect(\''.$url.'?share=1\', \''.$url.'?share=1\')">
<img src="'. base_url() .'uploads/xrrr/result_'. $user_id .'.jpg" class="replace-loader" alt="">
</a>
<div id="try_again">
    <a class="btn btn-default try-again-btn" href="'. base_url().'xrrr?step=1">
        <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
    Not happy with results? Try again
</a>
</div>
<div class="result-image-description">xrrr</div>
<p style="margin: 10px 0 0">
    <small>
        <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FQuizOcean-968665643215083&amp;locale=en_GB&amp;width=130&amp;height=20&amp;colorscheme=light&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;send=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden;
        width:130px; margin: 0 auto; height:20px;" class="fb-like" allowTransparency="true"></iframe>
    </small>
</p>
<a class="fb-box-share fb-box-share-single" href="#" onclick="return share_and_redirect(\''.$url.'?share=1\', \''.$url.'?share=1\')">
    <span class="fb-box-share-icon"></span>
    <span class="fb-box-share-text">Share On Facebook</span>
</a>
<div style="padding: 10px 0 5px">
</div>
';


                        } else {


                            echo '
<div class="quiz-cover">
<a href="'. base_url().'xrrr?step=1" class="start-load main-image">
<img src="'. asset_url().'img/sample/edu.jpg" class="replace-loader" alt=""/>
</a>
<div style="padding: 10px 0 5px">
</div>
<a class="btn btn-primary btn-lg start-load" href="'. base_url().'xrrr?step=1">Start</a>
';
                        }
                        ?>



                    </div>
                    <script>
                        $('.start-load').on('click', function (e) {
                            $('.quiz-analyse').show();
                            $('.quiz-cover').hide();
                            e.preventDefault();
                            var href = this.href;
                            setTimeout(function () {
                                window.location.href = href;
                            }, 150);
                        });
                    </script>



                    <?php include("right-down.php"); ?>
