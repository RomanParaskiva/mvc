
	<p>
		<a href="<?= Utils::generateLink('clients/create') ?>">Добавить клиента</a>
	</p>
	<?php if (empty($DATA['clients'])): ?>
	<p>Пока что нет ни одного клиента :( </p>
	<?php else: ?>
	<div class="table-responsive">
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>ФИО</th>
					<th>Заметка</th>
					<th>Телефон</th>
					<th>Email</th>
					<th>Created at</th>
					<th colspan="2"></th>
			</thead>
			<tbody>
				<?php foreach ($DATA['clients'] as $client): ?>
					
				<tr>
					<td><?= Security::escape($client->id) ?></td>
					<td><?= Security::escape($client->name) ?></td>
					<td><?= Security::escape($client->description) ?></td>
					<td><?= Security::escape($client->phone) ?></td>
					<td><?= Security::escape($client->email) ?></td>
					<td><?= Security::escape($client->created_at) ?></td>
					<td>
						<a href="<?= Utils::generateLink('clients/update/' . $client->id) ?>">
							Update
						</a>
					</td>
					<td>
						<a onclick="return confirm('Are you sure?');" href="<?= Utils::generateLink(
          'clients/delete/' . $client->id
      ) ?>">
							Delete
						</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<?php endif; ?>
	

