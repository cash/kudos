<?php

$guid = get_input('guid');
$reason = get_input('reason');
$referrer = urldecode(get_input('referrer'));

$user = get_user($guid);
if (!$user) {
	register_error('kudos:add:failure');
	forward($referrer);
}

$result = $user->annotate('kudos', $reason, ACCESS_PUBLIC);

$subject = sprintf(elgg_echo('kudos:subject'), $CONFIG->site->name);
$message = sprintf(elgg_echo('kudos:body'), $reason, $CONFIG->site->name);
notify_user($user->guid, get_loggedin_userid(), $subject, $message);

add_to_river('river/annotation/kudos/create', 'create', $user->guid, get_loggedin_userid(), ACCESS_PUBLIC, 0, $result);

system_message(sprintf(elgg_echo('kudos:add:success'), $user->name));
forward($referrer);
