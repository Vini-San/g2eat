<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MODEL MODULO CONFIGURAÇÃO PORTAL
 * teste e estudo para posterior implementação
 */
class Clientes_model extends CI_Model {
	
	public function update_endereco($data, $id){

			$this->db->where("id_endereco", $id);  
			$this->db->update("tb_endereco", $data);
			return true;  
			//UPDATE tbl_user SET first_name = '$first_name', last_name = '$last_name' WHERE id = '$id'  
	}

	public function insert_endereco($data){  
		   
		$this->db->insert("tb_endereco", $data);
		$id = $this->db->insert_id($this->tables['users'] . '_id_seq');
		return true;
	
	}
	
	public function getEnderecosCliente($id_usuario){
		
		$query = $this->db->query("select *  
		from tb_endereco
		where id_user=".$id_usuario);

		return $query->result();
	}
	public function getEnderecoCliente($id_endereco){
		
		$query = $this->db->query("select *  
		from tb_endereco
		where id_endereco=".$id_endereco);
		$record=$query->row();
		return $record;
	}

	public function getTipos(){
		
		$query = $this->db->query("select * from tb_tipo_produto");

		return $query->result();
	}

	public function getProdutoById($id){
		
		$query = $this->db->query("select prod.id_produto, 
		prod.nome_produto, prod.valor, prod.quantidade, tprod.nome_tipo_produto, prod.id_tipo 
		from tb_produto prod 
		inner join tb_tipo_produto tprod on tprod.id_tipo_produto=prod.id_tipo
		where prod.id_produto = ".$id);

		return $query->result();
	}

	public function insert_produto($data){  
		   
		$this->db->insert("tb_produto", $data);
	
	}
	  
	public function update_produto($data, $id){

           $this->db->where("id_produto", $id);  
           $this->db->update("tb_produto", $data);  
           //UPDATE tbl_user SET first_name = '$first_name', last_name = '$last_name' WHERE id = '$id'  
	}
	
	public function getCategorias(){
		
		$query = $this->db->query("select * from tb_tipo_produto");

		return $query->result();
	}

	public function getCategoriasById($id){
		
		$query = $this->db->query("select * from tb_tipo_produto
		where id_tipo_produto = ".$id);

		return $query->result();
	}

	public function insert_categoria($data){  
		   
		$this->db->insert("tb_tipo_produto", $data);
	
	}

	public function update_categoria($data, $id){

		$this->db->where("id_tipo_produto", $id);  
		$this->db->update("tb_tipo_produto", $data);  
		//UPDATE tbl_user SET first_name = '$first_name', last_name = '$last_name' WHERE id = '$id'  
	 }
	 public function update_groups($data, $id){

		$this->db->where("id", $id);  
		$this->db->update("groups", $data);  
		//UPDATE tbl_user SET first_name = '$first_name', last_name = '$last_name' WHERE id = '$id'  
 	}


}