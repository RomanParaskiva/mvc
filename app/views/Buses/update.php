<main>
	<?php if (isset($DATA['message'])): ?>
	<p><?= Security::escape($DATA['message']); ?></p>
	<?php endif; ?>

	<?php if (!$DATA['bus']): ?>
	<p>/</p>
	<?php else: ?>
	<form method="POST">
		<input type="hidden" name="id" value="<?= Security::escape($DATA['bus']->id); ?>">
	
		<label>
			<span>Компания:</span>
			<input type="text" name="company" value="<?= Security::escape($DATA['bus']->company); ?>" required>
		</label>

		<label>
			<span>Телефон:</span>
			<input type="phone" name="phone" value="<?= Security::escape($DATA['bus']->phone); ?>">
		</label>

		<label>
			<span>Количество мест:</span>
			<input type="number" name="seats" value="<?= Security::escape($DATA['bus']->seats); ?>">
		</label>

		<button type="submit">Обновить</button>
	</form>
	<?php endif; ?>
</main>
