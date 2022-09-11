<?php

/**
 * RoutesController
 */
class RoutesController extends AuthController {

	/**
	 * Путь: /routes/
	 * @return void
	 */
	public function index() {
		// Постављање наслова
		$this->set('title', 'Маршруты');
		
		// Узимање података из базе
		$routes = RoutesModel::getAll();

		// Прослеђивање података слоју приказа
		$this->set('routes', $routes);
	}

	/**
	 * Путь: /broutes/create/
	 * @return void
	 */
	public function create() {
		// Постављање наслова
		$this->set('title', 'Добавить маршрут');

		
		if (!Http::isPost()) {
			return;
		}

		// Узимање података из HTTP POST променљивих
		$name =  htmlspecialchars(trim(filter_input(INPUT_POST, 'name', FILTER_DEFAULT )));

		// Валидација података
		if (empty($name)) {
			$this->set('message', 'Заполните название маршрута');
			return;
		}

		// Упис података у базу
		$rout = RoutesModel::create([
			'name' => $name
		]);

		// Повратак на формулар у случају неуспелог уписа у базу
		if (!$rout) {
			$this->set('message', 'Ошибка записи. Попробуйте еще раз');
			return;
		}

		// Редирекција
		Redirect::to('routes');
	}

	/**
	 * Путь: /broutes/update/$id
	 * @param int $id ID параметр
	 * @return void
	 */
	public function update($id) {

		$rout = RoutesModel::getById($id);
		// Постављање наслова
		$this->set('title', 'Редактирование данных автобуса '. $rout->name);

		// Обустави даљу обраду захтева у случају да није одговарајућа HTTP метода
		if (!Http::isPost()) {
			$this->setRout($id);
			return;
		}

    $name =  htmlspecialchars(trim(filter_input(INPUT_POST, 'name', FILTER_DEFAULT )));

		// Валидација података
		if (empty($name)) {
			$this->set('message', 'Введите название маршрута');
			$this->setRout($id);
			return;
		}

		// Ажурирање података у бази
		$status = RoutesModel::update($id, [
			'name' => $name,
		]);

		// Повратак на формулар у случају неуспелог уписа у базу
		if (!$status) {
			$this->set('message', 'Ошибка обновления, попробуйте еще раз');
			$this->setRout($id);
			return;
		}

		// Редирект
		Redirect::to('routes');
	}

	/**
	 * Путь: /broutes/delete/$id
	 * @param int $id ID параметар
	 * @return void
	 */
	public function delete($id) {
		// Уклањање података из базе
		RoutesModel::delete($id);

		// Редирекција
		Redirect::to('routes');
	}

	/**
	 * Враћа ред из табеле по ID параметру и складишти га у податке за приказ
	 * @param int $id ID параметар
	 * @return void
	 */
	private function setRout($id, $name = 'rout') {
		// Узимање података из базе
		$rout = RoutesModel::getById($id);

		// Прослеђивање података слоју приказа
		$this->set($name, $rout);
	}

}
