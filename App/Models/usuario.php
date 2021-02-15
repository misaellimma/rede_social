<?php
	namespace App\Models;

	use MF\Model\Model;

	class Usuario extends Model {
		private $id = '';
		private $nome = '';
		private $email = '';
        private $senha = '';

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        public function autenticar(){
            $query = 'select id, nome, email, senha from usuarios where email = :email and senha = :senha';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':email', $this->__get('email'));
            $stmt->bindValue(':senha', md5($this->__get('senha')));
            $stmt->execute();
            
            $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

            if($usuario){
                if($usuario['id'] != '' && $usuario['nome'] != ''){
                    $this->__set('id', $usuario['id']);
                    $this->__set('nome', $usuario['nome']);
                }
            }   

            return $this;
        }

        public function salvar(){
            echo 'estamos aqui';
            $query = 'insert into usuarios(nome, email, senha)values(:nome, :email, :senha)';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':nome', $this->__get('nome'));
            $stmt->bindValue(':email', $this->__get('email'));
            $stmt->bindValue(':senha', md5($this->__get('senha')));
            $stmt->execute();

            return $this;
        }

    }
?>