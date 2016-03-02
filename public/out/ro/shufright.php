<?php
error_reporting(E_ALL);

$links = array();



$links[] = '
                    <a href="'.base_url().'how_were_you_created" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/how_were_you_created_sample.jpg" alt=""/>
                        <h5><strong>Cum ai fost creat (ă)?</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';
$links[] = '
                    <a href="'.base_url().'myanimal_soul" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/myanimal_soul_sample.jpg" alt=""/>
                        <h5><strong>Ce animal ar alege sufletul tău?</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';
$links[] = '
                    <a href="'.base_url().'your_next_super_goal" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/your_next_super_goal_sample.jpg" alt=""/>
                        <h5><strong>Care va fi următorul super țel pe care îl vei atinge?</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';
$links[] = '
                    <a href="'.base_url().'no1thing" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/no1thing_sample.jpg" alt=""/>
                        <h5><strong>1 lucru pe care toată lumea ar trebui să-l știe despre tine?</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';
$links[] = '
                    <a href="'.base_url().'no1wordused" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/no1wordused_sample.jpg" alt=""/>
                        <h5><strong>Care este cel mai des folosit cuvânt în postările tale?</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';
$links[] = '
                    <a href="'.base_url().'catlook" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/catlook_sample.jpg" alt=""/>
                        <h5><strong>Cum ai arăta dacă ai fi o pisică?</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';
$links[] = '
                    <a href="'.base_url().'how_sexy_are_you" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/sexy_sample.jpg" alt=""/>
                        <h5><strong>Afla cat de sexy esti</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';
$links[] = '

                    <a href="'.base_url().'mancester_united_fan" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/mancester_sample.jpg" alt=""/>
                        <h5><strong>Esti suporter FC Steaua Bucuresti?</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';
$links[] = '

                    <a href="'.base_url().'past_life" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/pastlife_sample.jpg" alt=""/>
                        <h5><strong>Afla cine ai fost intr-o viata anterioara</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';
$links[] = '
                    <a href="'.base_url().'angry" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/angry_sample.jpg" alt=""/>
                        <h5><strong>Afla cu ce animal semeni cand te infurii</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';
$links[] = '
                    <a href="'.base_url().'meaning_of_name" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/name_sample.jpg" alt=""/>
                        <h5><strong>Afla ce inseamna numele tau</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';
$links[] = '
                    <a href="'.base_url().'how_many_babys" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/baby_sample.jpg" alt=""/>
                        <h5><strong>Afla cati copii vei avea</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';
$links[] = '
                    <a href="'.base_url().'in_love" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/inlove_sample.jpg" alt=""/>
                        <h5><strong>Cate persoane se vor indragosti de tine in 2016?</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';
$links[] = '
                    <a href="'.base_url().'expensive_art" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/art_sample.jpg" alt=""/>
                        <h5><strong>Ai aparut intr-o opera de arta. CLICK AICI!</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';
$links[] = '
                    <a href="'.base_url().'celebrity" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/celebrity_sample.jpg" alt=""/>
                        <h5><strong>Afla cu ce vedeta te asemeni</strong></h5>
                        <span class="clearfix"></span>
                    </a>
';

$links[] = '<a href="'.base_url().'eesse" class="sidebar-quiz"><img src="'.asset_url().'img/sample/eesse_sample.jpg" alt=""/><h5><strong>AAA</strong></h5><span class="clearfix"></span> </a>';
$links[] = '<a href="'.base_url().'eesse" class="sidebar-quiz"><img src="'.asset_url().'img/sample/eesse_sample.jpg" alt=""/><h5><strong>AAA</strong></h5><span class="clearfix"></span> </a>';
$links[] = '<a href="'.base_url().'eesse" class="sidebar-quiz"><img src="'.asset_url().'img/sample/eesse_sample.jpg" alt=""/><h5><strong>AAA</strong></h5><span class="clearfix"></span> </a>';
shuffle($links);

foreach (array_slice($links, 0, 4) as $item) {
    echo($item);
    echo(' ');
}

?>
