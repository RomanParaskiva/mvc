<main>
	<p>
		<a href="<?= Utils::generateLink('routes/create') ?>">Добавить маршрут</a>
	</p>
	<?php if (empty($DATA['routes'])): ?>
	<p>Пока что нет ни одного маршрута :( </p>
	<?php else: ?>
	<div class="table-responsive">
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Название</th>
					<th colspan="2"></th>
			</thead>
			<tbody>
				<?php foreach ($DATA['routes'] as $routes): ?>
					
				<tr>
					<td><?= Security::escape($routes->id) ?></td>
					<td><?= Security::escape($routes->name) ?></td>
					<td>
						<a href="<?= Utils::generateLink('routes/update/' . $routes->id) ?>">
							Редактировать
						</a>
					</td>
					<td>
						<a onclick="return confirm('Вы уверены?');" href="<?= Utils::generateLink(
          'routes/delete/' . $routes->id
      ) ?>">
							Удалить
						</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<?php endif; ?>
	
	
</main>
