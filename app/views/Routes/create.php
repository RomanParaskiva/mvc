<main>
	<?php if (isset($DATA['message'])): ?>
	<p><?= Security::escape($DATA['message']); ?></p>
	<?php endif; ?>

	<form method="POST">
		<label>
			<span>Название:</span>
			<input type="text" name="name" required>
		</label>
		
		<button type="submit">Создать</button>
	</form>
</main>
