<?php

$receiver = get_entity($vars['item']->subject_guid);

if ($vars['item']->annotation_id != 0) {
	$reason = get_annotation($vars['item']->annotation_id)->value;
}

$receiver_link = "<a href=\"{$receiver->getURL()}\">{$receiver->name}</a>";
$string = sprintf(elgg_echo("kudos:river:created"), $receiver_link);

if (isset($reason)) {
	$string .= "<div class=\"river_content_display\">";
	$string .= elgg_get_excerpt($reason, 200);
	$string .= "</div>";
}

echo $string;