<?php

$output = list_annotations($vars['user']->guid, 'kudos', 20, false);
if ($output) {
	echo $output;
} else {
	echo '<div class="contentWrapper">';
	echo elgg_echo('kudos:none');
	echo '</div>';
}