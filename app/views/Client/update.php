<main>
	<?php if (isset($DATA['message'])): ?>
	<p><?= Security::escape($DATA['message']); ?></p>
	<?php endif; ?>

	<?php if (!$DATA['client']): ?>
	<p>/</p>
	<?php else: ?>
	<form method="POST">
		<input type="hidden" name="id" value="<?= Security::escape($DATA['client']->id); ?>">
	
		<label>
			<span>Имя:</span>
			<input type="text" name="name" value="<?= Security::escape($DATA['client']->name); ?>" required>
		</label>

		<label>
			<span>Телефон:</span>
			<input type="phone" name="phone" value="<?= Security::escape($DATA['client']->phone); ?>">
		</label>

		<label>
			<span>Email:</span>
			<input type="email" name="email" value="<?= Security::escape($DATA['client']->email); ?>">
		</label>

		<label>
			<span>Описание:</span>
			<textarea name="description" required><?= Security::escape($DATA['client']->description); ?></textarea>
		</label>

		<button type="submit">Обновить</button>
	</form>
	<?php endif; ?>
</main>
