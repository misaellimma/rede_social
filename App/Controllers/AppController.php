<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action {

    public function feed(){
        $this->testarSessao();
        $this->render('feed');
    }

    public function perfil(){
        $this->testarSessao();
        $this->render('perfil', 'layout2');

    }

    public function sobre(){
        $this->testarSessao();
        $this->render('sobre', 'layout2');
    }

    public function fotos(){
        $this->testarSessao();
        $this->render('fotos', 'layout2');
    }

    public function amigos(){
        $this->testarSessao();
        $this->render('amigos', 'layout2');
    }

    

    public function testarSessao(){
        session_start();
        print_r($_SESSION);

        $this->view->sair = true;

        if($_SESSION['id'] == '' || !isset($_SESSION)){
            header('location: /login');
        }
    }
	
}
?>