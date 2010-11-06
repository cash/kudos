<?php
$receiver = get_entity($vars['annotation']->entity_guid);
?>

<item>
	<guid isPermaLink='true'><?php echo $vars['annotation']->getURL(); ?></guid>
	<pubDate><?php echo date("r", $vars['annotation']->time_created); ?></pubDate>
	<link><?php echo $vars['annotation']->getURL(); ?></link>
	<title><![CDATA[<?php echo sprintf(elgg_echo('kudos:view:title'), $receiver->name); ?>]]></title>
	<description><![CDATA[<?php echo (autop($vars['annotation']->value)); ?>]]></description>
	<?php echo elgg_view('extensions/item'); ?>
</item>