<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action {

	public function autenticar(){

        $usuario = Container::getModel('Usuario');
        $usuario->__set('email', $_POST['email']);
        $usuario->__set('senha', $_POST['senha']);

        echo strlen($usuario->__get('email')).'<br>';
        echo strlen($usuario->__get('senha'));

        if(strlen($usuario->__get('email')) < 3 || strlen($usuario->__get('senha')) < 3){
            header("Location: /login?login=erro");
        }else{
            $usuario->autenticar();

            if($usuario->__get('id') == ''){
                header("Location: /login?login=erro");
            }else{
                session_start();

                $_SESSION['id'] = $usuario->__get('id');
                $_SESSION['nome'] = $usuario->__get('nome');

                header("Location: /feed");
            }
        }
    }

    public function sair(){
        session_start();
        session_destroy();
        header("Location: /");
    }
}
?>