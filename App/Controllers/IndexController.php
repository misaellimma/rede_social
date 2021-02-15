<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {

	public function index() {
		$this->testaSessao();
		$this->render('index');
	}

	public function login(){
		$this->testaSessao();
		$this->render('login');
	}

	public function cadastrar(){
		$this->testaSessao();
		$this->render('cadastrar');
	}

	public function testaSessao(){
		session_start();

		if(isset($_SESSION['id'])){
			header('location: /feed');
		}
	}

	public function registrar(){
		$usuario = Container::getModel('Usuario');
        $usuario->__set('nome', $_POST['nome']);
        $usuario->__set('email', $_POST['email']);
		$usuario->__set('senha', $_POST['senha']);

		$usuario->salvar();
		header('location: /');
	}
}
?>