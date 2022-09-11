
	<!-- <p>
		<a href="<? //= Utils::generateLink('calendar/create') ?>">Добавить маршрут</a>
	</p> -->
	<?php // if (empty($DATA['dates'])): ?>
	<p>Пока что нет ни одного маршрута :( </p>
	<?php // else: ?>
	<!-- <div class="table-responsive">
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Название</th>
					<th colspan="2"></th>
			</thead>
			<tbody>
				<?php // foreach ($DATA['dates'] as $dates): ?>
					
				<tr>
					<td><? //= Security::escape($dates->id) ?></td>
					<td><? //= Security::escape($dates->name) ?></td>
					<td>
						<a href="<?//= Utils::generateLink('calendar/update/' . $dates->id) ?>">
							Редактировать
						</a>
					</td>
					<td>
						<a onclick="return confirm('Вы уверены?');" href="<?//= Utils::generateLink(
          // 'calendar/delete/' . $dates->id
      //) ?>">
							Удалить
						</a>
					</td>
				</tr>
				<?php // endforeach; ?>
			</tbody>
		</table>
	</div> -->
	<?php // endif; ?>
	
	<div class="flex flex-wrap ">

	</div>
