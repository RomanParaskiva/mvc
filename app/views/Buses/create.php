<main>
	<?php if (isset($DATA['message'])): ?>
	<p><?= Security::escape($DATA['message']); ?></p>
	<?php endif; ?>

	<form method="POST">
		<label>
			<span>Компания:</span>
			<input type="text" name="company" required>
		</label>

		<label>
			<span>Телефон:</span>
			<input type="phone" name="phone">
		</label>

		<label>
			<span>Количество мест:</span>
			<input type="number" name="seats">
		</label>
		<button type="submit">Создать</button>
	</form>
</main>
