<?php

$guid = get_input('guid');
$reason = get_input('reason');

$user = get_user($guid);
if (!$user) {

}

$result = $user->annotate('kudos', $reason);

system_message(sprintf(elgg_echo('kudos:add:success'), $user->name));
forward();
