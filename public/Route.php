<?php

	namespace App;

	use MF\Init\Bootstrap;

	class Route extends Bootstrap {

		protected function initRoutes() {

			$routes['home'] = array(
				'route' => '/',
				'controller' => 'indexController',
				'action' => 'index'
			);

			$routes['login'] = array(
				'route' => '/login',
				'controller' => 'indexController',
				'action' => 'login'
			);

			$routes['cadastrar'] = array(
				'route' => '/cadastrar',
				'controller' => 'indexController',
				'action' => 'cadastrar'
			);

			$routes['registrar'] = array(
				'route' => '/registrar',
				'controller' => 'indexController',
				'action' => 'registrar'
			);

			$routes['autenticar'] = array(
				'route' => '/autenticar',
				'controller' => 'AuthController',
				'action' => 'autenticar'
			);

			$routes['sair'] = array(
				'route' => '/sair',
				'controller' => 'AuthController',
				'action' => 'sair'
			);
			
			$routes['feed'] = array(
				'route' => '/feed',
				'controller' => 'AppController',
				'action' => 'feed'
			);

			$routes['perfil'] = array(
				'route' => '/perfil',
				'controller' => 'AppController',
				'action' => 'perfil'
			);

			$routes['sobre'] = array(
				'route' => '/sobre',
				'controller' => 'AppController',
				'action' => 'sobre'
			);

			$routes['fotos'] = array(
				'route' => '/fotos',
				'controller' => 'AppController',
				'action' => 'fotos'
			);

			$routes['amigos'] = array(
				'route' => '/amigos',
				'controller' => 'AppController',
				'action' => 'amigos'
			);
			$routes['postagem'] = array(
				'route' => '/postagem',
				'controller' => 'AppController',
				'action' => 'postagem'
			);

			$this->setRoutes($routes);
		}

	}

?>