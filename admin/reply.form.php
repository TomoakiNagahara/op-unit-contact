<?php
/**	op-unit-contact:/admin/reply.form.php
 *
 * @created     2025-06-10
 * @version     1.0
 * @package     op-unit-contact
 * @author      Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright   Tomoaki Nagahara All right reserved.
 */

/**	Declare strict
 *
 */
declare(strict_types=1);

/**	namespace
 *
 */
namespace OP;

//	...
$form = [
	'name' => 'reply',
];

//	...
$id = [
	'name' => 'id',
	'type' => 'id',
	'placeholder' => 'id',
	'validate' => 'required',
];

//	...
$replay = [
	'name' => 'replay',
	'type' => 'textarea',
	'placeholder' => 'Replying to a message',
];

//	...
$form['input'] = [
	$id,
	$replay,
];

//	...
return $form;