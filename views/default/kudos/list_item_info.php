<?php

$user = get_user($vars['annotation']->entity_guid);
$poster = get_user($vars['annotation']->owner_guid);

echo "<p><b><a href=\"{$user->getURL()}\">$user->name</a></b></p>";
echo '<p>' . elgg_echo('kudos:given') . ' ' . elgg_view_friendly_time($vars['annotation']->time_created) . '</p>';
echo '<br />';

echo elgg_view("output/longtext", array("value" => $vars['annotation']->value));

?>
<?php
if ($vars['annotation']->canEdit()) {
?>
<p>
<?php
	echo elgg_view("output/confirmlink", array(
					'href' => $vars['url'] . "action/kudos/delete?annotation_id=" . $vars['annotation']->id,
					'text' => elgg_echo('delete')
				));
?>
</p>
<?php
}
