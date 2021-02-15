<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action {

    public function feed(){
        $this->testarSessao();

        $postagem = Container::getModel('Postagem');
        $postagem->__set('id_usuario', $_SESSION['id']);

        $this->view->postagens = $postagem->getAll();

        $this->render('feed');
    }

    public function perfil(){
        $this->testarSessao();
        
        $postagem = Container::getModel('Postagem');
        $postagem->__set('id_usuario', $_SESSION['id']);

        $this->view->postagens = $postagem->getAll();

        $usuario = Container::getModel('Usuario');
        $usuario->__set('id', $_SESSION['id']);

        $this->view->infoUsuario = $usuario->getInfoUsuario();


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

    public function postagem(){
        $this->testarSessao();
        
        $postagem = Container::getModel('Postagem');
        $postagem->__set('id_usuario', $_SESSION['id']);
        $postagem->__set('postagem', $_POST['postagem']);

        $postagem->salvar();
        if(isset($_GET['pagina'])){
            if($_GET['pagina'] == 'perfil'){
                header('location: /perfil');
            }else if($_GET['pagina'] == 'feed'){
                header('location: /feed');
            }
        }
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