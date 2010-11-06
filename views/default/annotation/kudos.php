<?php

$user = get_user($vars['annotation']->entity_guid);

$icon = elgg_view("profile/icon", array(
	'entity' => $user,
	'size' => 'small',
));

$info = elgg_view('kudos/list_item_info', $vars);

echo elgg_view_listing($icon, $info);
