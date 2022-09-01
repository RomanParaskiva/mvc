<?php

/**
 * TaskModel
 */
class TaskModel extends Model {

	/**
	 * Назив табеле
	 * @var string
	 */
	protected static $tableName = 'tasks';

	/**
	 * Враћање свих редова из табеле - INNER JOIN са табелом `users`
	 * @return array
	 */
	public static function getAllFromInnerJoinWithUsers($id) {
		$tasks = sprintf('`%s`', self::getTableName());

		/**
		 * Редослед табела у SELECT реду је битан јер желимо да `id` поље из табеле `tasks` прегази `id` поље из табеле `users`
		 */
		$sql = "SELECT * FROM $tasks WHERE `user_id` = ? "; 

		$pst = DB::getInstance()->prepare($sql);
		$pst->bindValue(1, $id, PDO::PARAM_INT);
		$pst->execute();

		return $pst->fetchAll();
	}

}


// <<<END
// 		SELECT $tasks.*, $users.`first_name`, $users.`last_name`
// 		FROM $tasks INNER JOIN $users
// 		ON $tasks.`user_id` = $users.`id`;
// 		END;