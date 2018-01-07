<?php

return [
#	'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2', //actionIndex in NewsController
	'news/([0-9]+)' => 'news/view/$1', //actionIndex in NewsController
	'news' => 'news/index', //actionIndex in NewsController

	#users
	'users/create' => 'user/create',
	'users/store' => 'user/store',
	'users/edit/([0-9]+)' => 'user/edit/$1',
	'users/update/([0-9]+)' => 'user/update/$1',
	'users/delete/([0-9]+)' => 'user/delete/$1',
	'users/([0-9]+)' => 'user/show/$1',
	'users/page-([0-9]+)' => 'user/index/$1', //пагинация в пользователях
	'users' => 'user/index',

    #contacts
    'contacts/create' => 'contact/create', //страница с формой создания контакта
    'contacts/store' => 'contact/store', //создание контакта (сохранение)
    'contacts/add/user' => 'contact/addUser', //выбор существующего пользователя при создании контакта
    'contacts/([0-9]+)/set-user' => 'contact/setUser/$1', //выбор существующего пользователя
    'contacts/([0-9]+)/set-address' => 'contact/setAddress/$1', //выбор адреса
    'contacts/([0-9]+)/set-group' => 'contact/setGroup/$1', //выбор группы
    'contacts/update/([0-9]+)' => 'contact/update/$1', //сохранение отредактированного контакта
    'contacts/delete/([0-9]+)' => 'contact/delete/$1', //удаление контакта
    'contacts/([0-9]+)' => 'contact/show/$1', //просмотр контакта
    'contacts/page-([0-9]+)' => 'contact/index/$1', //пагинация
    'contacts' => 'contact/index', //просмотр всех контактов

	#address
	'address/create' => 'address/create',
	'address/store' => 'address/store',
	'address/edit/([0-9]+)' => 'address/edit/$1',
	'address/update/([0-9]+)' => 'address/update/$1',
	'address/delete/([0-9]+)' => 'address/delete/$1',
	'address/([0-9]+)' => 'address/show/$1',
	'address/page-([0-9]+)' => 'address/index/$1', //пагинация
	'address' => 'address/index',

    #groups
    'groups/create' => 'group/create',
    'groups/store' => 'group/store',
    'groups/edit/([0-9]+)' => 'group/edit/$1',
    'groups/update/([0-9]+)' => 'group/update/$1',
    'groups/delete/([0-9]+)' => 'group/delete/$1',
    'groups/([0-9]+)' => 'group/show/$1',
    'groups/page-([0-9]+)' => 'group/index/$1', //пагинация
    'groups' => 'group/index',

	#others
	'/' => 'default/index' //главная страница
];