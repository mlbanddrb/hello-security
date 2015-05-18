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
	$quotes = "Be WP Secuure
	PASSWORD is never a good password.
	Make your admin username unique.
	Change your password often.
	Use complex passwords.
	Use a contact form instead of having your email address on your site.
	Never call a WordPress user admin.
	Only keep the plugins you NEED.
	Use a different password for every account.
	Update all the things!
	Backup, backup, backup!
	Choose your themes and plugins wisely.
	Never share logins. Let them get their own.
	Do your research before you buy.
	Delete out old unused user accounts.
	Pay attention! You know your site the best.
	The harder the password is to remember, the harder it is to crack.
	Themes are for design. Plugins are for functionality.
	Todays features are tomorrow's vulnerabilities.
	Schedule reoccuring backups.
	Security is important before the hackers get in.
	Keep only one theme and the current WordPress theme for a default.
	An unisntalled theme or plugin has no vulnerabilities.
	Have you changed your password recently?
	Check your file persmissions.
	Always use SFTP if available.
	Only give users access they need.
	Backup all the things.";

		// Here we split it into lines
	$quotes = explode( "\n", $quotes );

	// And then randomly choose a line
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_security() {
	$chosen = hello_security_get_quote();
	echo "<p id='security'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_security' );

// We need some CSS to position the paragraph
function security_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#security {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'security_css' );

?>
