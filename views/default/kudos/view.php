<?php

echo elgg_view_annotation($vars['kudos']);

$url = "{$vars['url']}pg/kudos/all/";
echo '<div class="contentWrapper">';
echo elgg_view('output/url', array('href' => $url, 'text' => elgg_echo('kudos:more')));
echo '</div>';