	</main>
	<!-- JavaScript -->
	<script src="<?= Utils::generateLink('assets/js/main.js'); ?>"></script>
	<?php if (isset($DATA['JAVASCRIPT_MODULE'])): ?>
	<script src="<?= Utils::generateLink($DATA['JAVASCRIPT_MODULE']); ?>"></script>
	<?php endif; ?>
</body>

</html>
