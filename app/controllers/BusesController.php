<?php

/**
 * BusesController
 */
class BusesController extends AuthController {

	/**
	 * Путь: /buses/
	 * @return void
	 */
	public function index() {
		// Постављање наслова
		$this->set('title', 'Buses');
		$userId = intval(Session::get(Config::USER_COOKIE));
		// Узимање података из базе
		$buses = BusesModel::getAll();

		// Прослеђивање података слоју приказа
		$this->set('buses', $buses);
	}

	/**
	 * Путь: /buses/create/
	 * @return void
	 */
	public function create() {
		// Постављање наслова
		$this->set('title', 'Добавить автобус');

		
		if (!Http::isPost()) {
			return;
		}

		// Узимање података из HTTP POST променљивих
		$company =  htmlspecialchars(filter_input(INPUT_POST, 'company', FILTER_DEFAULT ));
		$seats =  htmlspecialchars(filter_input(INPUT_POST, 'seats', FILTER_SANITIZE_NUMBER_INT ));
		$phone =  htmlspecialchars(filter_input(INPUT_POST, 'phone', FILTER_DEFAULT));

		// Валидација података
		if (empty($company) || empty($seats)) {
			$this->set('message', 'Заполните все поля!');
			return;
		}

		// Нормализација података пре уписа у базу
		$userId = intval(Session::get(Config::USER_COOKIE));
		$company = trim($company);
		$seats = trim($seats);
		$phone = trim($phone);

		// Упис података у базу
		$bus = BusesModel::create([
			'company' => $company,
			'phone' => $phone,
			'seats' => $seats,
		]);

		// Повратак на формулар у случају неуспелог уписа у базу
		if (!$bus) {
			$this->set('message', 'Ошибка записи. Попробуйте еще раз');
			return;
		}

		// Редирекција
		Redirect::to('buses');
	}

	/**
	 * Путь: /clients/update/$id
	 * @param int $id ID параметр
	 * @return void
	 */
	public function update($id) {

		$bus = BusesModel::getById($id);
		// Постављање наслова
		$this->set('title', 'Редактирование данных автобуса '. $bus->company);

		// Обустави даљу обраду захтева у случају да није одговарајућа HTTP метода
		if (!Http::isPost()) {
			$this->setBus($id);
			return;
		}

		// Узимање података из HTTP POST променљивих
		$id =  htmlspecialchars(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT));
		$company =  htmlspecialchars(filter_input(INPUT_POST, 'company', FILTER_DEFAULT ));
		$seats =  htmlspecialchars(filter_input(INPUT_POST, 'seats', FILTER_SANITIZE_NUMBER_INT ));
		$phone =  htmlspecialchars(filter_input(INPUT_POST, 'phone', FILTER_DEFAULT));

		// Валидација података
		if (empty($company) || empty($seats) || empty($phone)) {
			$this->set('message', 'Error #1!');
			$this->setBus($id);
			return;
		}

		// Ажурирање података у бази
		$status = BusesModel::update($id, [
			'company' => trim($company),
			'phone' => trim($phone),
			'seats' => trim($seats),
		]);

		// Повратак на формулар у случају неуспелог уписа у базу
		if (!$status) {
			$this->set('message', 'Ошибка обновления, попробуйте еще раз');
			$this->setBus($id);
			return;
		}

		// Редирект
		Redirect::to('buses');
	}

	/**
	 * Путь: /buses/delete/$id
	 * @param int $id ID параметар
	 * @return void
	 */
	public function delete($id) {
		// Уклањање података из базе
		BusesModel::delete($id);

		// Редирекција
		Redirect::to('buses');
	}

	/**
	 * Враћа ред из табеле по ID параметру и складишти га у податке за приказ
	 * @param int $id ID параметар
	 * @return void
	 */
	private function setBus($id, $name = 'bus') {
		// Узимање података из базе
		$bus = BusesModel::getById($id);

		// Прослеђивање података слоју приказа
		$this->set($name, $bus);
	}

}
