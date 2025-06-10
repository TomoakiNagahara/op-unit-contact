<?php
/**	op-unit-contact:/admin/reply.php
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
$form =  OP()->Unit()->Form();
$form -> Config('reply.form.php');

//	...
$qql =  OP()->Unit()->QQL();
$qql -> Open('Contact.sqlite3');

//	...
if( $form -> isValidate() ){

	//	...
	$id = $form -> GetValue('id');

	//	...
	if( $id ){
		//	...
		if( $replay = $form->GetValue('replay') ){

			//	...
			$set = [
				'id'        => $id,
				'reply'     => 1,
				'message'   => $replay,
				'created'   => OP()->Time(true),
				'timestamp' => OP()->Timestamp(false),
			];

			//	...
			$ai = $qql->Set(' t_message ', $set);

			//	...
			if( $ai ){
				$form->SetValue('replay','');
			}
		}

		//	...
		$records = $qql -> Get(" t_message.id = {$id} ");
	}

}else{
	//	...
	foreach( $qql->Get(" t_message ", [], ['order'=>'timestamp desc']) as $record ){
		//	...
		$id = $record['id'];

		//	...
		if( isset($records[$id]) ){
			continue;
		}

		//	...
		$records[$id] = $record;
	}
}

//	...
OP()->Template('reply.phtml', [
	'form'    => $form,
	'qql'     => $qql,
	'records' => $records ?? [],
]);
