<?php

?>
<div class="contentWrapper">
<?php
	$body = elgg_view('kudos/forms/add', $vars);
	$params = array(
		'body' => $body,
		'action' => "{$vars['url']}action/kudos/add/",
	);
	echo elgg_view('input/form', $params);
?>
</div>