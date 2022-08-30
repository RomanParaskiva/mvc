<?php

/**
 * ClientModel
 */
class ClientModel extends Model {

	/**
	 * Назив табеле
	 * @var string
	 */
	protected static $tableName = 'clients';

	/**
	 * Аутентификација корисника коришћењем е-поште и лозинке
	 * @param string $email Е-пошта корисника
	 * @param string $password Хеш-вредност корисничке лозинке
	 * @return object
	 */
	public static function getClientsByUserId($userId) {
		$tableName = '`' . self::$tableName . '`';
		$tableName = sprintf('`%s`', self::$tableName);

		$sql = "SELECT * FROM $tableName WHERE `user_id` = ? LIMIT 1;";
		$pst = DB::getInstance()->prepare($sql);
		$pst->bindValue(1, $userId, PDO::PARAM_STR);
		$pst->execute();

		return $pst->fetch();
	}

}