<?php

use \app\models\Configuration;

return array(

	/**
	 * You may wish for all e-mails sent with Mailgun to be sent from
	 * the same address. Here, you may specify a name and address that is
	 * used globally for all e-mails that are sent by Mailgun.
	 *
	 */
	'from' => array(
		'address' => getConfigVariable('defult_email_address'), 
		'name' => getConfigVariable('defult_email_name')
	),


	/**
	 * Global reply-to e-mail address
	 *
	 */
	'reply_to' => '',


	/**
	 * Mailgun (private) API key
	 *
	 */
	'api_key' => 'key-30400c7cc69e8c04485273456948fe6c',

	/**
	 * Mailgun public API key
	 *
	 */
	'public_api_key' => 'pubkey-fe071b705cebbdb25753821d9b0bec7a',

	/**
	 * Domain name registered with Mailgun
	 *
	 */
	'domain' => 'upandabove.com.au',

	/**
	 * Force the from address
	 *
	 * When your `from` e-mail address is not from the domain specified some
	 * e-mail clients (Outlook) tend to display the from address incorrectly
	 * By enabling this setting Mailgun will force the `from` address so the
	 * from address will be displayed correctly in all e-mail clients.
	 *
	 * Warning:
	 * This parameter is not documented in the Mailgun documentation
	 * because if enabled, Mailgun is not able to handle soft bounces
	 *
	 */
	'force_from_address' => false,


	/**
	 * Testing
	 *
	 * Catch All address
	 *
	 * Specify an email address that receives all emails send with Mailgun
	 * This email address will overwrite all email addresses within messages
	 */
	'catch_all' => "",


	/**
	 * Testing
	 *
	 * Mailgun's testmode
	 *
	 * Send messages in test mode by setting this setting to true.
	 * When you do this, Mailgun will accept the message but will
	 * not send it. This is useful for testing purposes.
	 *
	 * Note: Mailgun does charge your account for messages sent in test mode.
	 */
	'testmode' => false
);
