<?php
/**
 * @package Hello_Security
 * @version 1.0.0
 */
/*
Plugin Name: Hello Security
Plugin URI: http://cantspeakgeek.com/hello-security/
Description: Built using the base code of the popular plugin, Hello Dolly, this plugin gives
users the ability to get security best practice tips shown on their admin panel.
Version: 1.0
Author: Michele Butcher
Author URI: http://cantspeakgeek.com/
License: GPLv2
*/

function hello_security_get_quote() {
	/** These are the quotes used */
	$quotes = array(
		__( 'Be WP Secuure', 'hello-security' ),
		__( 'PASSWORD is never a good password.', 'hello-security' ),
		__( 'Make your admin username unique.', 'hello-security' ),
		__( 'Change your password often.', 'hello-security' ),
		__( 'Use complex passwords.', 'hello-security' ),
		__( 'Use a contact form instead of having your email address on your site.', 'hello-security' ),
		__( 'Never call a WordPress user admin.', 'hello-security' ),
		__( 'Only keep the plugins you NEED.', 'hello-security' ),
		__( 'Use a different password for every account.', 'hello-security' ),
		__( 'Update all the things!', 'hello-security' ),
		__( 'Backup, backup, backup!', 'hello-security' ),
		__( 'Choose your themes and plugins wisely.', 'hello-security' ),
		__( 'Never share logins. Let them get their own.', 'hello-security' ),
		__( 'Do your research before you buy.', 'hello-security' ),
		__( 'Delete out old unused user accounts.', 'hello-security' ),
		__( 'Pay attention! You know your site the best.', 'hello-security' ),
		__( 'The harder the password is to remember, the harder it is to crack.', 'hello-security' ),
		__( 'Themes are for design. Plugins are for functionality.', 'hello-security' ),
		__( 'Todays features are tomorrow\'s vulnerabilities.', 'hello-security' ),
		__( 'Schedule reoccuring backups.', 'hello-security' ),
		__( 'Security is important before the hackers get in.', 'hello-security' ),
		__( 'Keep only one theme and the current WordPress theme for a default.', 'hello-security' ),
		__( 'An unisntalled theme or plugin has no vulnerabilities.', 'hello-security' ),
		__( 'Have you changed your password recently?', 'hello-security' ),
		__( 'Check your file persmissions.', 'hello-security' ),
		__( 'Always use SFTP if available.', 'hello-security' ),
		__( 'Only give users access they need.', 'hello-security' ),
		__( 'Backup all the things."', 'hello-security' )
	);

	// And then randomly choose a line
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

// Load plugin textdomain
function hello_secuirty_load_textdomain() {
	load_plugin_textdomain( 'hello-security', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}
add_action( 'plugins_loaded', 'hello_secuirty_load_textdomain' );

// This just echoes the chosen line, we'll position it later
function hello_security_echo_quote() {
	$chosen = hello_security_get_quote();
	echo "<p id='security'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_security_echo_quote' );

// We need some CSS to position the paragraph
function hello_security_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$direction = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#security {
		float: $direction;
		padding-$direction: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}
add_action( 'admin_head', 'hello_security_css' );
