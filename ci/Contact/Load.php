<?php
/**	op-unit-contact:/ci/Contact/Load.php
 *
 * @created    2025-06-10
 * @version    1.0
 * @package    op-unit-contact
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */

/**	namespace
 *
 */
namespace OP;

/* @var $ci UNIT\CI\CI_Config */

//	Load
$method = 'Load';
$args   =  null;
$result = [];
$result[] = [
	'ai' => 1,
	'id' => 1,
	'reply'   => null,
	'message' => 'This is a message for CI.',
	'created' =>  0,
	'timestamp' => '2025-06-10 14:20:15',
];
$ci->Set($method, $result, $args);
