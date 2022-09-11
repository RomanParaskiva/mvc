
	<p>
		<a href="<?= Utils::generateLink('buses/create') ?>">Добавить машину</a>
	</p>
	<?php if (empty($DATA['buses'])): ?>
	<p>Пока что нет ни одного клиента :( </p>
	<?php else: ?>
	<div class="table-responsive">
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Компания</th>
					<th>Количество мест</th>
					<th>Телефон</th>
					<th colspan="2"></th>
			</thead>
			<tbody>
				<?php foreach ($DATA['buses'] as $buses): ?>
					
				<tr>
					<td><?= Security::escape($buses->id) ?></td>
					<td><?= Security::escape($buses->company) ?></td>
					<td><?= Security::escape($buses->seats) ?></td>
					<td><?= Security::escape($buses->phone) ?></td>
					<td>
						<a href="<?= Utils::generateLink('buses/update/' . $buses->id) ?>">
							Редактировать
						</a>
					</td>
					<td>
						<a onclick="return confirm('Вы уверены?');" href="<?= Utils::generateLink(
          'buses/delete/' . $buses->id
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
	
	

