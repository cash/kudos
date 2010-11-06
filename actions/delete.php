<?php

$annotation_id = get_input('annotation_id');

$kudos = get_annotation($annotation_id);
if (!$kudos) {
	register_error(elgg_echo('kudos:delete:failure'));
	forward(REFERER);
}

if (!$kudos->canEdit()) {
	register_error(elgg_echo('kudos:delete:failure'));
	forward(REFERER);
}

$kudos->delete();

system_message(elgg_echo('kudos:delete:success'));
forward(REFERER);