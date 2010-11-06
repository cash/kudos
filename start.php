<?php

register_elgg_event_handler('init', 'system', 'kudos_init');

function kudos_init() {

	register_page_handler('kudos', 'kudos_page_handler');

	elgg_extend_view('css', 'kudos/css');
	elgg_extend_view('profile/menu/links', 'kudos/user_hover_menu');

	global $CONFIG;
	$action_path = "{$CONFIG->pluginspath}kudos/actions";
	register_action('kudos/add', FALSE, "$action_path/add.php", TRUE);
	register_action('kudos/delete', FALSE, "$action_path/delete.php", TRUE);
}

function kudos_page_handler($page) {

	kudos_sidebar_menu();
	
	switch ($page[0]) {
		case "add":
			$user = get_user_by_username($page[1]);
			admin_gatekeeper();
			$title = sprintf(elgg_echo('kudos:add:title'), $user->name);
			$content = elgg_view('kudos/add', array('user' => $user));
			break;
		case "user":
			$user = get_user_by_username($page[1]);
			$title = sprintf(elgg_echo('kudos:user:title'), $user->name);
			$content = elgg_view('kudos/user', array('user' => $user));
			break;
		case "all":
			$title = elgg_echo('kudos:all:title');
			$content = elgg_view('kudos/all');
			break;
	}

	$content = elgg_view_title($title) . $content;
	$body = elgg_view_layout('two_column_left_sidebar', '', $content);
	page_draw($title, $body);
}

function kudos_sidebar_menu() {
	global $CONFIG;
	$base = $CONFIG->wwwroot;
	if (isloggedin()) {
		$user = get_loggedin_user();
		add_submenu_item(elgg_echo('kudos:your:title'), "{$base}pg/kudos/user/{$user->username}/");
	}
	add_submenu_item(elgg_echo('kudos:all:title'), "{$base}pg/kudos/all/");
}