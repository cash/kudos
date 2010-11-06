<?php

$user = get_user($vars['annotation']->entity_guid);
$poster = get_user($vars['annotation']->owner_guid);

echo "<a href=\"{$user->getURL()}\">$user->name</a>";
echo elgg_view("output/longtext", array("value" => $vars['annotation']->value));

?>

<div class="generic_comment">
	<div class="generic_comment_icon">
<?php
		echo elgg_view("profile/icon", array('entity' => $user, 'size' => 'small'));
?>
	</div>
	<div class="generic_comment_details">

		<?php echo elgg_view("output/longtext", array("value" => $vars['annotation']->value)); ?>

		<p class="generic_comment_owner">
			<a href="<?php echo ''//$user->getURL(); ?>"><?php echo $user->name; ?></a> <?php echo elgg_view_friendly_time($vars['annotation']->time_created); ?>
		</p>

		<?php

			// if the user looking at the comment can edit, show the delete link
			if ($vars['annotation']->canEdit()) {

			?>
		<p>
			<?php

				echo elgg_view("output/confirmlink",array(
					'href' => $vars['url'] . "action/comments/delete?annotation_id=" . $vars['annotation']->id,
					'text' => elgg_echo('delete'),
					'confirm' => elgg_echo('deleteconfirm'),
				));

			?>
		</p>

			<?php
			} //end of can edit if statement
		?>
	</div>
</div>