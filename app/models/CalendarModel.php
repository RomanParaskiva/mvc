<?php

/**
 * CalendarModel
 */
class CalendarModel extends Model {

	/**
	 * Назив табеле
	 * @var string
	 */
	protected static $tableName = 'calendar';

	/**
	 * Получение списка клиентов по user_id
	 * @param string $user_id 
	 * @return array
	 */
	public static function getRouteAndBusByDate($date) {
		$tableName = '`' . self::$tableName . '`';
		$tableName = sprintf('`%s`', self::$tableName);

		$sql = "SELECT b.company, b.seats FROM `calendar` c, `buses` b WHERE c.date = ?;";
		$pst = DB::getInstance()->prepare($sql);
		$pst->bindValue(1, $date, PDO::PARAM_STR);
		$pst->execute();
		
		return $pst->fetchAll();
	}

}