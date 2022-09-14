<?php

return [
	// HomeController
	new Route('Home', 'index', '|^/?$|'),
	new Route('Home', 'login', '|^login/?$|'),
	new Route('Home', 'logout', '|^logout/?$|'),
	// ClientController
	new Route('Client', 'index', '|^clients/?$|'),
	new Route('Client', 'create', '|^clients/create/?$|'),
	new Route('Client', 'update', '|^clients/update/([0-9]+)/?$|'),
	new Route('Client', 'delete', '|^clients/delete/([0-9]+)/?$|'),

	// BusesController
	new Route('Buses', 'index', '|^buses/?$|'),
	new Route('Buses', 'create', '|^buses/create/?$|'),
	new Route('Buses', 'update', '|^buses/update/([0-9]+)/?$|'),
	new Route('Buses', 'delete', '|^buses/delete/([0-9]+)/?$|'),

	// RoutesController
	new Route('Routes', 'index', '|^routes/?$|'),
	new Route('Routes', 'create', '|^routes/create/?$|'),
	new Route('Routes', 'update', '|^routes/update/([0-9]+)/?$|'),
	new Route('Routes', 'delete', '|^routes/delete/([0-9]+)/?$|'),

	// CalendarController
	new Route('Calendar', 'index', '|^calendar/?$|'),
	new Route('Calendar', 'create', '|^calendar/create/?$|'),
	new Route('Calendar', 'update', '|^calendar/update/([0-9]+)/?$|'),
	new Route('Calendar', 'delete', '|^calendar/delete/([0-9]+)/?$|'),
	new Route('Calendar', 'day', '|^calendar/day/([0-9]+)/?$|'),

	// TaskController
	new Route('Task', 'index', '|^tasks/?$|'),
	new Route('Task', 'create', '|^tasks/create/?$|'),
	new Route('Task', 'update', '|^tasks/update/([0-9]+)/?$|'),
	new Route('Task', 'delete', '|^tasks/delete/([0-9]+)/?$|'),
	// TaskApiController
	new Route('TaskApi', 'index', '|^api/tasks/?$|'),
	// Подразумевана рута
	new Route('Home', 'e404', '|^.*$|'),
];
