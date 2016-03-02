<?php
error_reporting(E_ALL);

$links2 = array();







$links2[] = '
                    <a href="'.base_url().'how_were_you_created">
                        <img src="'.asset_url().'img/sample/how_were_you_created_sample.jpg" alt=""/>
                        <span>Cum ai fost creat (ă)?</span>
                    </a>
';
$links2[] = '
                    <a href="'.base_url().'myanimal_soul">
                        <img src="'.asset_url().'img/sample/myanimal_soul_sample.jpg" alt=""/>
                        <span>Ce animal ar alege sufletul tău?</span>
                    </a>
';
$links2[] = '
                    <a href="'.base_url().'your_next_super_goal">
                        <img src="'.asset_url().'img/sample/your_next_super_goal_sample.jpg" alt=""/>
                        <span>Care va fi următorul super țel pe care îl vei atinge?</span>
                    </a>
';
$links2[] = '
                    <a href="'.base_url().'no1thing">
                        <img src="'.asset_url().'img/sample/no1thing_sample.jpg" alt=""/>
                        <span>1 lucru pe care toată lumea ar trebui să-l știe despre tine?</span>
                    </a>
';
$links2[] = '
                    <a href="'.base_url().'no1wordused">
                        <img src="'.asset_url().'img/sample/no1wordused_sample.jpg" alt=""/>
                        <span>Care este cel mai des folosit cuvânt în postările tale?</span>
                    </a>
';
$links2[] = '
                    <a href="'.base_url().'catlook">
                        <img src="'.asset_url().'img/sample/catlook_sample.jpg" alt=""/>
                        <span>Cum ai arăta dacă ai fi o pisică?</span>
                    </a>
';
$links2[] = '
                    <a href="'.base_url().'how_sexy_are_you">
                        <img src="'.asset_url().'img/sample/sexy_sample.jpg" alt=""/>
                        <span>Afla cat de sexy esti?</span>
                    </a>
';
$links2[] = '
                    <a href="'.base_url().'mancester_united_fan">
                        <img src="'.asset_url().'img/sample/mancester_sample.jpg" alt=""/>
                        <span>Esti suporter FC Steaua Bucuresti?</span>
                   </a>
';
$links2[] = '
                    <a href="'.base_url().'past_life" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/pastlife_sample.jpg" alt=""/>
                        <span>Cine ai fost intr-o viata anterioara?</span>
                    </a>
';
$links2[] = '
                    <a href="'.base_url().'angry" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/angry_sample.jpg" alt=""/>
                        <span>Cu ce animal semeni cand esti furios?</span>
                    </a>
';
$links2[] = '
                    <a href="'.base_url().'meaning_of_name" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/name_sample.jpg" alt=""/>
                        <span>Ce inseamna numele tau?</span>
                    </a>
';
$links2[] = '
                    <a href="'.base_url().'how_many_babys" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/baby_sample.jpg" alt=""/>
                        <span>Afla cati copii vei avea?</span>
                    </a>
';
$links2[] = '
                    <a href="'.base_url().'in_love" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/inlove_sample.jpg" alt=""/>
                        <span>Cate persoane se vor indragosti de tine in 2016?</span>
                    </a>
';
$links2[] = '
                    <a href="'.base_url().'expensive_art" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/art_sample.jpg" alt=""/>
                        <span>Ai aparut intr-o opera de arta. CLICK AICI!</span>
                    </a>
';
$links2[] = '
                    <a href="'.base_url().'celebrity" class="sidebar-quiz">
                        <img src="'.asset_url().'img/sample/celebrity_sample.jpg" alt=""/>
                        <span>Afla cu ce vedeta te asemeni</span>
                    </a>
';
$links2[] = '<a href="'.base_url().'eesse" class="sidebar-quiz"><img src="'.asset_url().'img/sample/eesse_sample.jpg" alt=""/><span>AAA</span></a>';$links2[] = '<a href="'.base_url().'eesse" class="sidebar-quiz"><img src="'.asset_url().'img/sample/eesse_sample.jpg" alt=""/><span>AAA</span></a>';$links2[] = '<a href="'.base_url().'eesse" class="sidebar-quiz"><img src="'.asset_url().'img/sample/eesse_sample.jpg" alt=""/><span>AAA</span></a>';
shuffle($links2);

foreach (array_slice($links2, 0, 6) as $item2) {
    echo($item2);
    echo(' ');
}

?>
