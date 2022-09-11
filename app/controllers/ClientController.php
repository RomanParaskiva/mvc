<?php

/**
 * ClientController
 */
class ClientController extends AuthController {

	/**
	 * Рута: /tasks/
	 * @return void
	 */
	public function index() {
		// Постављање наслова
		$this->set('title', 'Clients');
		$userId = intval(Session::get(Config::USER_COOKIE));
		// Узимање података из базе
		$clients = ClientModel::getClientsByUserId($userId);

		foreach ($clients as $client) {
			$client->created_at = Utils::formatDateAndTime($client->created_at);
		}

		// Прослеђивање података слоју приказа
		$this->set('clients', $clients);
	}

	/**
	 * Рута: /tasks/create/
	 * @return void
	 */
	public function create() {
		// Постављање наслова
		$this->set('title', 'Добавить клиента');

		// Обустави даљу обраду захтева у случају да није одговарајућа HTTP метода
		if (!Http::isPost()) {
			return;
		}

		// Узимање података из HTTP POST променљивих
		$name =  htmlspecialchars(filter_input(INPUT_POST, 'name', FILTER_DEFAULT ));
		$phone =  htmlspecialchars(filter_input(INPUT_POST, 'phone', FILTER_DEFAULT ));
		$email =  htmlspecialchars(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
		$description =  htmlspecialchars(filter_input(INPUT_POST, 'description', FILTER_DEFAULT ));

		// Валидација података
		if (empty($name) || empty($description)) {
			$this->set('message', 'Error #1!');
			return;
		}

		// Нормализација података пре уписа у базу
		$userId = intval(Session::get(Config::USER_COOKIE));
		$name = trim($name);
		$phone = trim($phone);
		$email = trim($email);
		$description = trim($description);

		// Упис података у базу
		$client = ClientModel::create([
			'user_id' => $userId,
			'name' => $name,
			'phone' => $phone,
			'email' => $email,
			'description' => $description
		]);

		// Повратак на формулар у случају неуспелог уписа у базу
		if (!$client) {
			$this->set('message', 'Error #2!');
			return;
		}

		// Редирекција
		Redirect::to('clients');
	}

	/**
	 * Рута: /clients/update/$id
	 * @param int $id ID параметр
	 * @return void
	 */
	public function update($id) {

		$client = ClientModel::getById($id);
		// Постављање наслова
		$this->set('title', 'Редактирование данных клиента '.$client->name);

		// Обустави даљу обраду захтева у случају да није одговарајућа HTTP метода
		if (!Http::isPost()) {
			$this->setClient($id);
			return;
		}

		// Узимање података из HTTP POST променљивих
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
		$name =  htmlspecialchars(filter_input(INPUT_POST, 'name', FILTER_DEFAULT ));
		$phone =  htmlspecialchars(filter_input(INPUT_POST, 'phone', FILTER_DEFAULT ));
		$email =  htmlspecialchars(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
		$description =  htmlspecialchars(filter_input(INPUT_POST, 'description', FILTER_DEFAULT ));

		// Валидација података
		if (empty($name) || empty($description)) {
			$this->set('message', 'Error #1!');
			$this->setClient($id);
			return;
		}

		// Нормализација података пре уписа у базу
		$userId = intval(Session::get(Config::USER_COOKIE));
		$name = trim($name);
		$phone = trim($phone);
		$email = trim($email);
		$description = trim($description);

		// Ажурирање података у бази
		$status = ClientModel::update($id, [
			'user_id' => $userId,
			'name' => $name,
			'phone' => $phone,
			'email' => $email,
			'description' => $description
		]);

		// Повратак на формулар у случају неуспелог уписа у базу
		if (!$status) {
			$this->set('message', 'Error #2!');
			$this->setClient($id);
			return;
		}

		// Редирекција
		Redirect::to('clients');
	}

	/**
	 * Рута: /client/delete/$id
	 * @param int $id ID параметар
	 * @return void
	 */
	public function delete($id) {
		// Уклањање података из базе
		ClientModel::delete($id);

		// Редирекција
		Redirect::to('clients');
	}

	/**
	 * Враћа ред из табеле по ID параметру и складишти га у податке за приказ
	 * @param int $id ID параметар
	 * @return void
	 */
	private function setClient($id, $name = 'client') {
		// Узимање података из базе
		$client = ClientModel::getById($id);

		// Прослеђивање података слоју приказа
		$this->set($name, $client);
	}

	/**
	 * Форматира име и презиме корисника за приказ
	 * @param string $firstName Име
	 * @param string $lastName Презиме
	 * @return string
	 */
	public static function formatFirstAndLastName($firstName, $lastName) {
		$user = trim(implode(' ', [$firstName, $lastName]));
		return $user ? $user : 'N/A';
	}

}
