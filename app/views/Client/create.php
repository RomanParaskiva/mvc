<main>
	<?php if (isset($DATA['message'])): ?>
	<p><?= Security::escape($DATA['message']); ?></p>
	<?php endif; ?>

	<form method="POST">
		<label>
			<span>Имя:</span>
			<input type="text" name="name" required>
		</label>

		<label>
			<span>Телефон:</span>
			<input type="phone" name="phone">
		</label>

		<label>
			<span>Email:</span>
			<input type="email" name="email">
		</label>
		<label>
			<span>Описание:</span>
			<textarea name="description" required></textarea>
		</label>
		<button type="submit">Создать</button>
	</form>
</main>
