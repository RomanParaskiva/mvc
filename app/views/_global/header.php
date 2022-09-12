<!DOCTYPE html>
<html lang="en">

<head>
	<title><?= isset($DATA['title']) ? $DATA['title'] . ' | MVC' : 'MVC'; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipiscing elit.">
	<!-- CSS -->
	<link rel="stylesheet" href="<?= Utils::generateLink('assets/css/output.css'); ?>">
	<!-- Favicon -->
	<link rel="icon" href="<?= Utils::generateLink('assets/favicon.png'); ?>">
</head>

<body class="font-sans overflow-hidden">

	<div class="bg-slate-100 p-3 flex items-center justify-between h-[60px]">
		<?php if (isset($DATA['title'])): ?>
		<h1 class="text-gray-600"><?= Security::escape($DATA['title']); ?></h1>
		<?php endif;?>

		<nav>
			<ul class="flex gap-3">
				<li class="font-semibold p-2 text-blue-600 hover:text-blue-400"><a href="<?= Utils::generateLink(''); ?>">Главная</a></li>
				<li class="font-semibold p-2 text-blue-600 hover:text-blue-400"><a href="<?= Utils::generateLink('clients'); ?>">Клиенты</a></li>
				<li class="font-semibold p-2 text-blue-600 hover:text-blue-400"><a href="<?= Utils::generateLink('buses'); ?>">Автобусы</a></li>
				<li class="font-semibold p-2 text-blue-600 hover:text-blue-400"><a href="<?= Utils::generateLink('routes'); ?>">Маршруты</a></li>
				<li class="font-semibold p-2 text-blue-600 hover:text-blue-400"><a href="<?= Utils::generateLink('calendar'); ?>">Календарь</a></li>
				<?php if (empty(Session::get(Config::USER_COOKIE))): ?>
					<li class="font-semibold p-2  text-blue-600 hover:text-blue-400"><a href="<?= Utils::generateLink('login'); ?>">Log in</a></li>
				<?php else:?>
					<li class="font-semibold p-2 text-blue-600 hover:text-blue-400"><a onclick="return confirm('Are you sure?');" href="<?= Utils::generateLink('logout'); ?>">Выйти</a></li>
				<?php endif; ?>
			</ul>
		</nav>
	</div>

	<main class="w-[100vw] h-[calc(100vh_-_60px)] p-3 overflow-y-auto">
