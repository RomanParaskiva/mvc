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
	 * Получение списка клиентов по user_id
	 * @param string $user_id 
	 * @return array
	 */
	public static function getClientsByUserId($userId) {
		$tableName = '`' . self::$tableName . '`';
		$tableName = sprintf('`%s`', self::$tableName);

		$sql = "SELECT * FROM $tableName WHERE `user_id` = ?;";
		$pst = DB::getInstance()->prepare($sql);
		$pst->bindValue(1, $userId, PDO::PARAM_STR);
		$pst->execute();
		
		return $pst->fetchAll();
	}

}