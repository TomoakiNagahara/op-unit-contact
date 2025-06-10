<?php
/** op-unit-contact:/form/contact.php
 *
 * @created     2025-06-10
 * @version     1.0
 * @package     op-unit-contact
 * @author      Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright   Tomoaki Nagahara All right reserved.
 */

//	...
$form = [
	'name' => 'contact',
];

//	...
$message = [
	'name'  => 'message',
	'type'  => 'text',
	'placeholder' => 'Type a message...',
	'validate' => 'required, english',
	'errors' => [
		'required' => 'Please type a message.',
		'english'  => 'Please type in English.',
	],
];

//	...
$button = [
	'name'  => 'button',
	'type'  => 'button',
	'value' => ' Send ',
];

//	...
$form['input'] = [
	$message,
	$button,
];

//	...
return $form;
