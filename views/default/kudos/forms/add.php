<?php

echo elgg_view_entity($vars['user']);

echo '<p>';
echo '<label>' . elgg_echo('kudos:reason') . '</label>';
echo elgg_view('input/text', array('internalname' => 'reason'));
echo '</p>';

echo elgg_view('input/hidden', array('internalname' => 'guid', 'value' => $vars['user']->guid));

echo elgg_view('input/submit', array('value' => elgg_echo('save')));