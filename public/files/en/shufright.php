<?php
error_reporting(E_ALL);

$links = array();



$links[] = '
                    <a href="'.base_url().'myanimal_soul" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/myanimal_soul_sample.jpg" alt=""/>
                        <h5><strong>What Animal Chose Your Soul?</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';
$links[] = '
                    <a href="'.base_url().'no1thing" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/no1thing_sample.jpg" alt=""/>
                        <h5><strong>1 Thing Everyone Should Know About You?</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';
$links[] = '
                    <a href="'.base_url().'no1wordused" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/no1wordused_sample.jpg" alt=""/>
                        <h5><strong>Which Is The No.1 Word You Use In Your Posts?</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';
$links[] = '
                    <a href="'.base_url().'catlook" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/catlook_sample.jpg" alt=""/>
                        <h5><strong>How Would You Look If You Were A Cat?</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';
$links[] = '
                    <a href="'.base_url().'how_sexy_are_you" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/sexy_sample.jpg" alt=""/>
                        <h5><strong>How Sexy Are You?</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';
$links[] = '

                    <a href="'.base_url().'mancester_united_fan" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/mancester_sample.jpg" alt=""/>
                        <h5><strong>Are you a Manchester United Fan?</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';
$links[] = '

                    <a href="'.base_url().'past_life" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/pastlife_sample.jpg" alt=""/>
                        <h5><strong>Who have you been in a past life?</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';
$links[] = '
                    <a href="'.base_url().'angry" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/angry_sample.jpg" alt=""/>
                        <h5><strong>Wich animal are you similar to when you\'re angry?</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';
$links[] = '
                    <a href="'.base_url().'meaning_of_name" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/name_sample.jpg" alt=""/>
                        <h5><strong>What is the meaning of your name?</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';
$links[] = '
                    <a href="'.base_url().'how_many_babys" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/baby_sample.jpg" alt=""/>
                        <h5><strong>How many children you will have?</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';
$links[] = '
                    <a href="'.base_url().'in_love" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/inlove_sample.jpg" alt=""/>
                        <h5><strong>How many people will be in love with you in 2016?</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';
$links[] = '
                    <a href="'.base_url().'expensive_art" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/art_sample.jpg" alt=""/>
                        <h5><strong>You appeared in famous painting. CLICK HERE!</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';
$links[] = '
                    <a href="'.base_url().'celebrity" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/celebrity_sample.jpg" alt=""/>
                        <h5><strong>Do You Look Like A Celebrity?</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';
[[ADD]]
shuffle($links);

foreach (array_slice($links, 0, 4) as $item) {
    echo($item);
    echo(' ');
}

?>
