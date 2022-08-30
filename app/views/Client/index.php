<main>
	<?php if (empty($DATA['clients'])): ?>
	<p>Пока что нет ни одного клиента :( </p>
	<?php else: ?>
	<div class="table-responsive">
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Description</th>
					<th>User</th>
					<th>Created at</th>
					<th colspan="2"></th>
			</thead>
			<tbody>
				<?php foreach ($DATA['clients'] as $clients): ?>
				<tr>
					<td><?= Security::escape($clients->id); ?></td>
					<td><?= Security::escape($clients->name); ?></td>
					<td><?= Security::escape($clients->description); ?></td>
					<td><?= Security::escape($clients->user); ?></td>
					<td><?= Security::escape($clients->created_at); ?></td>
					<td>
						<a href="<?= Utils::generateLink('clients/update/' . $clients->id) ?>">
							Update
						</a>
					</td>
					<td>
						<a onclick="return confirm('Are you sure?');" href="<?= Utils::generateLink('clients/delete/' . $clients->id) ?>">
							Delete
						</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<?php endif; ?>

	<p>
		<a href="<?= Utils::generateLink('clients/create'); ?>"Добавить клиента</a>
	</p>
</main>
