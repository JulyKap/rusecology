<?php
include_once('model/startup.php');
include_once('controller/C_Admin.php');
include_once('controller/C_Npage.php');
include_once('controller/C_Dpage.php');
include_once('controller/C_Apage.php');
include_once('controller/C_Tpage.php');
include_once('controller/C_Nart.php');
include_once('controller/C_Dart.php');
include_once('controller/C_Aart.php');
include_once('controller/C_Tart.php'); 
include_once('controller/C_Page.php');
include_once('controller/C_Search.php');
include_once('controller/C_Article.php');
include_once('controller/C_Contact.php');
include_once('controller/C_Home.php'); 
include_once('model/M_Users.php');

// Инициализация.
startup();

// Выбор контроллера.
switch ($_GET['c'])
{
	case 'adsite':
		$controller = new C_Admin('adsite');//контроллер страницы администрирования
		break;
	case 'npage':
		$controller = new C_Npage('npage');//контроллер создания новой страницы
		break;	
	case 'dpage':
		$controller = new C_Dpage('dpage');//контроллер удаления страницы
		break;
	case 'apage':
		$controller = new C_Apage('apage');//контроллер выбора редактируемых страниц
		break;	
	case 'tpage':
		$controller = new C_Tpage('tpage');//контроллер редактирования страницы
		break;
	case 'nart':
		$controller = new C_Nart('nart');//контроллер создания новой статьи
		break;
	case 'dart':
		$controller = new C_Dart('dart');//контроллер удаления статьи
		break;
	case 'aart':
		$controller = new C_Aart('aart');//контроллер выбора редактируемых статей
		break;		
	case 'tart':
		$controller = new C_Tart('tart');//контроллер редактирования статьи
		break; 
	case 'contact':
		$controller = new C_Contact('contact');//контроллер контактной страницы сайта
		break;  
	case 'ssite':
		$controller = new C_Search('ssite');//контроллер страницы вывода текста страниц, статей сайта, в которых найдено данное слово
		break;  
	case 'part':
		$controller = new C_Article('part');//контроллер страницы вывода текста статьи сайта
		break; 
	default:
		$controller = new C_Home('home');//контроллер главной страницы
		break;
}

if ($_GET['c'] != 'adsite'  && 
	$_GET['c'] != 'npage'   && $_GET['c'] != 'dpage' && $_GET['c'] != 'apage'   && $_GET['c'] != 'tpage' &&
	$_GET['c'] != 'nart'    && $_GET['c'] != 'dart'  && $_GET['c'] != 'aart'    && $_GET['c'] != 'tart'  && 
	$_GET['c'] != 'contact' && $_GET['c'] != 'home'  && $_GET['c'] != 'ssite'   && $_GET['c'] != 'part'  && $_GET['c'] != '')
{
	$usual = $_GET['c'];
	$controller = new C_Page($usual);//контроллер обычной страницы сайта
}

// Обработка запроса.
$controller->Request();
