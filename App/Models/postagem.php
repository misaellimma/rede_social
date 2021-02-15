<?php
	namespace App\Models;

	use MF\Model\Model;

	class Postagem extends Model {
		private $id = '';
		private $id_usuario = '';
		private $postagem = '';
        private $data = '';

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        public function salvar(){
            $query = 'insert into postagens(id_usuario, postagem)values(:id_usuario, :postagem)';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
            $stmt->bindValue(':postagem', $this->__get('postagem'));
            $stmt->execute();

            return $this;
        }

        public function getAll(){
            $query = "
                SELECT
                    p.id,
                    p.id_usuario,
                    u.nome,
                    p.postagem,
                    date_format(p.data, '%d/%m/%Y %H:%i') as data
                FROM
                    postagens as p
                    left join usuarios as u
                    on(p.id_usuario = u.id)
                WHERE
                    p.id_usuario = :id_usuario
                ORDER BY
                    p.data desc
            ";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

    }
?>