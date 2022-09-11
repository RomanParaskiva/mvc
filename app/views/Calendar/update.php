<main>
	<?php if (isset($DATA['message'])): ?>
	<p><?= Security::escape($DATA['message']); ?></p>
	<?php endif; ?>

	<?php if (!$DATA['rout']): ?>
	<p>/</p>
	<?php else: ?>
	<form method="POST">
		<input type="hidden" name="id" value="<?= Security::escape($DATA['rout']->id); ?>">
	
		<label>
			<span>Название:</span>
			<input type="text" name="name" value="<?= Security::escape($DATA['rout']->name); ?>" required>
		</label>

		<button type="submit">Обновить</button>
	</form>
	<?php endif; ?>
</main>
