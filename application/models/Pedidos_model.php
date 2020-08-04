<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MODEL MODULO CONFIGURAÇÃO PORTAL
 * teste e estudo para posterior implementação
 */
class Pedidos_model extends CI_Model {
	
	public function getPedidos(){
		
		$usuario = $this->ion_auth->user()->row();
		
		$query = $this->db->query("SELECT tbp.id_pedido, tbe.username AS 'nome_cliente', 
		tbe.phone AS 'telefone_cliente', tbe.logradouro, tbe.numero, tbe.complemento, 
		tbe.cidade, tbe.uf, tbe.cep, u.id AS 'idusuario', u.username AS 'nomeusuario', 
		tbp.id_situacao_entrega, tbse.nome_situacao_entrega, tbp.id_situacao_financeira, 
		tbsf.nome_situacao_financeira, tbp.id_tipo_pedido, tptp.tb_tipo_pedido, 
		SUM(pp.preco_pedido) AS 'valor_pedido' FROM tb_pedido tbp
		inner join (select pp.id_pedido, pp.id_produto, pp.quantidade, p.nome_produto , (p.valor * pp.quantidade) as 'preco_pedido' from tb_pedido_produto pp inner join tb_produto p on pp.id_produto=p.id_produto) as pp on pp.id_pedido = tbp.id_pedido
		INNER JOIN users u ON tbp.pedido_titular=u.id 
		INNER JOIN (SELECT tbe.id_endereco, tbe.logradouro, tbe.numero, tbe.complemento, tbe.cidade, tbe.uf, tbe.cep, tbe.dt_cadastro, us.id, us.username, us.phone FROM tb_endereco tbe
		INNER JOIN users us ON us.id=tbe.id_user) tbe ON tbe.id_endereco = tbp.id_endereco
		INNER JOIN tb_situacao_entrega tbse ON tbse.id_situacao_entrega = tbp.id_situacao_entrega 
		INNER JOIN tb_situacao_financeira tbsf ON tbsf.id_situacao_financeira=tbp.id_situacao_financeira 
		INNER JOIN tb_tipo_pedido tptp ON tptp.id_tb_tipo_pedido = tbp.id_tipo_pedido
		WHERE u.company=".$usuario->company."
		group by tbp.id_pedido");

		return $query->result();
	}

	public function getProdutos($idpedido=null){
		
		$query = $this->db->query("select pp.id_pedido, pp.id_produto, pp.quantidade, p.nome_produto , (p.valor * pp.quantidade) as 'preco_pedido' 
		from tb_pedido_produto pp 
		inner join tb_produto p on pp.id_produto=p.id_produto
		WHERE pp.id_pedido=".$idpedido." 
		ORDER BY pp.id_pedido");

		return $query->result();
	}


}