<?php
// add the admin options page
add_action('admin_menu', 'plugin_admin_add_page');
function plugin_admin_add_page() {
	add_options_page('Customize Plain Honey', 'Plain Honey', 'manage_options', 'plugin', 'plugin_options_page');
}

// display the admin options page
function plugin_options_page() {
?>
	<div>
	<h2>Plain Honey Options</h2>
	<form action="options.php" method="post">
	<?php settings_fields('plainhoney_options'); ?>
	<?php do_settings_sections('plainhoney'); ?>

	<input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" />
	</form></div>

	<?php
}

// add the admin settings and such
add_action('admin_init', 'plugin_admin_init');
function plugin_admin_init(){
	register_setting( 'plainhoney_options', 'plainhoney_options', 'plainhoney_options_validate' );
	add_settings_section('plainhoney_main', 'Main Settings', 'plainhoney_section_text', 'plainhoney');
	add_settings_field('plainhoney_home_headline', 'Homepage Headline', 'plainhoney_home_headline_label', 'plainhoney', 'plainhoney_main');
}

function plainhoney_home_headline_label() {
	$options = get_option('plainhoney_options');
	echo "<textarea id='plainhoney_home_headline' name='plainhoney_options[home_headline]' style='width:200px;height:150px;font-size:16px' type='text'>{$options['home_headline']}</textarea>";
}

//validate our options
function plainhoney_options_validate($input) {
	return $input;
	/*
	$newinput['home_headline'] = trim($input['home_headline']);
	if(!preg_match('/^[a-z0-9]{32}$/i', $newinput['home_headline'])) {
	$newinput['home_headline'] = '';
	}
	return $newinput;
	
	*/
}

function plainhoney_section_text() {
	echo '';
}
?>