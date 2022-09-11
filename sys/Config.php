<?php

/**
 * Конфигурациони фајл
 */
final class Config {

	/**
	 * Апсолутни линк апликације
	 * @var string
	 */
	const BASE = 'http://tickets/';

	/**
	 * Релативни линк апликације (на продукцији најчешће само '/')
	 */
	const PATH = '/';

	/**
	 * Сервер БП: име хоста
	 * @var string
	 */
	const DB_HOST = 'localhost';

	/**
	 * Сервер БП: корисничко име
	 * @var string
	 */
	const DB_USER = 'root';

	/**
	 * Сервер БП: лозинка
	 * @var string
	 */
	const DB_PASS = 'root';

	/**
	 * Сервер БП: име базе
	 * @var string
	 */
	const DB_NAME = 'tickets';

	/**
	 * Сесијска променљива у којој ће бити складиштен корисников ИД приликом пријаве
	 * @var string
	 */
	const USER_COOKIE = 'user_id';


	/**
	 * Роль пользователя
	 * @var string
	 * 
	*/
	const USER_ROLE = 'user_role';

	/**
	 * Случајни или псеудо-случајни стринг произвољне дужине
	 * @var string
	 */
	const SALT = '34aa3fb2d3249fsd0s8df9846a2f34';

}
