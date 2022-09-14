<?php

/**
 * CalendarController
 */
class CalendarController extends AuthController {

	/**
	 * Путь: /buses/
	 * @return void
	 */
	public function index() {
		// Постављање наслова
		$this->set('title', 'Календарь');
	
		// Узимање података из базе
		$dates = CalendarModel::getAll();

		$this->set(
			'calendar', Calendar::getInterval(date('n.Y'), date('n.Y', strtotime('+11 month')))
		);

		// Прослеђивање података слоју приказа
		$this->set('dates', $dates);
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
		$bus = CalendarModel::create([
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

		$bus = CalendarModel::getById($id);
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
		$status = CalendarModel::update($id, [
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
	 * Путь: /calendar/day/$id
	 * @param int $id ID параметр
	 * @return void
	 */
	public function day($id) {

		$day = CalendarModel::getById($id);
		// Постављање наслова
		$this->set('title', 'Редактирование расписания на '. date('d-m-Y', $id));

		// Обустави даљу обраду захтева у случају да није одговарајућа HTTP метода
			// if (!Http::isPost()) {
			// 	$this->setDay($id);
			// 	return;
			// }

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
		$status = CalendarModel::update($id, [
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
		CalendarModel::delete($id);

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
		$bus = CalendarModel::getById($id);

		// Прослеђивање података слоју приказа
		$this->set($name, $bus);
	}

}
