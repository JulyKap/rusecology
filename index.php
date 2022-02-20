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

// �������������.
startup();

// ����� �����������.
switch ($_GET['c'])
{
	case 'adsite':
		$controller = new C_Admin('adsite');//���������� �������� �����������������
		break;
	case 'npage':
		$controller = new C_Npage('npage');//���������� �������� ����� ��������
		break;	
	case 'dpage':
		$controller = new C_Dpage('dpage');//���������� �������� ��������
		break;
	case 'apage':
		$controller = new C_Apage('apage');//���������� ������ ������������� �������
		break;	
	case 'tpage':
		$controller = new C_Tpage('tpage');//���������� �������������� ��������
		break;
	case 'nart':
		$controller = new C_Nart('nart');//���������� �������� ����� ������
		break;
	case 'dart':
		$controller = new C_Dart('dart');//���������� �������� ������
		break;
	case 'aart':
		$controller = new C_Aart('aart');//���������� ������ ������������� ������
		break;		
	case 'tart':
		$controller = new C_Tart('tart');//���������� �������������� ������
		break; 
	case 'contact':
		$controller = new C_Contact('contact');//���������� ���������� �������� �����
		break;  
	case 'ssite':
		$controller = new C_Search('ssite');//���������� �������� ������ ������ �������, ������ �����, � ������� ������� ������ �����
		break;  
	case 'part':
		$controller = new C_Article('part');//���������� �������� ������ ������ ������ �����
		break; 
	default:
		$controller = new C_Home('home');//���������� ������� ��������
		break;
}

if ($_GET['c'] != 'adsite'  && 
	$_GET['c'] != 'npage'   && $_GET['c'] != 'dpage' && $_GET['c'] != 'apage'   && $_GET['c'] != 'tpage' &&
	$_GET['c'] != 'nart'    && $_GET['c'] != 'dart'  && $_GET['c'] != 'aart'    && $_GET['c'] != 'tart'  && 
	$_GET['c'] != 'contact' && $_GET['c'] != 'home'  && $_GET['c'] != 'ssite'   && $_GET['c'] != 'part'  && $_GET['c'] != '')
{
	$usual = $_GET['c'];
	$controller = new C_Page($usual);//���������� ������� �������� �����
}

// ��������� �������.
$controller->Request();
