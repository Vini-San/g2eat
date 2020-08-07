//SISTEMAS
function deleteRecSis(idRecurso, idSistema, descriSistema) {
	$('#apagar_recSis_modal').modal('toggle');
	$('#idrecurso_recSis_delete').attr('value', idRecurso);
  $('#idsistema_recSis_delete').attr('value', idSistema);
  $('#descricaosistema_recSis_delete').attr('value', descriSistema);
}

function deleteRecursoUsuario(id, descrRecurso, usuario, idusuario) {
  $('#remover_recurso_modal').modal('toggle');
  $('#id_recurso_delete').val(id);
  $('#usuario_recurso_delete').val(usuario);
  $('#id_usuario_recurso_delete').val(idusuario);
  $("#labeldeleterecursousuario").text(descrRecurso);
 
};

//BANNERS
function editBanner(id, image, link, pos, carrosselID) {
  $('#editar_banner_modal').modal('toggle');
	$('#imagem_banner_edit').attr("value", image);
	$('#imagem_banner_edit_show').attr("src", getBaseUrl()+image);
  $('#link_banner_edit').val(link);
  $('#pos_banner_edit').val(pos);
  $('#carrossel_id_edit').val(carrosselID);
  $('#id_banner_edit').val(id);
}
function deleteBanner(id, link, carrosselID) {
  $('#apagar_banner_modal').modal('toggle');
  $('#id_banner_delete').val(id);
  $('#link_banner_delete').val(link);
  $('#carrossel_banner_delete').val(carrosselID);
}
function ocultarBanner(id, image, link, pos, carrosselID, desativado) {
  $('#ocultar_banner_modal').modal('toggle');
  $('#imagem_banner_hide').val(image);
  $('#link_banner_hide').val(link);
  $('#pos_banner_hide').val(pos);
  $('#id_carrossel_hide').val(carrosselID);
  $('#id_banner_hide').val(id);
  $('#desativado_banner_hide').val(desativado);
}


// EVENT LISTENERS
$('.btn-load').on('click', function () {
	var $this = $(this);
	$this.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Carregando...</button >');
	$this.attr("disabled", 'disabled');
	this.form.submit();
	// setTimeout(function () {
	// 	$this.button('reset');
	// }, 8000);
});

function filtraRecursosPorSistema(sistemaID, recursos, sistemasRecursos){
var arrayRecursos, arraySistemasRecursos;

arrayRecursos = recursos.split("|");
arraySistemasRecursos = sistemasRecursos.split("|");


for(i in arrayRecursos){
    if(arraySistemasRecursos[i] != sistemaID){
      $(`#checkbox`+arrayRecursos[i]).hide();
      $(`#labelcheckbox`+arrayRecursos[i]).hide();
      $(`#button`+arrayRecursos[i]).hide();
    }else{
      $(`#checkbox`+arrayRecursos[i]).show();
      $(`#labelcheckbox`+arrayRecursos[i]).show();
      $(`#button`+arrayRecursos[i]).show();
     // $(`#checkbox`+arrayRecursos[i]).removeAttr('checked');
    }
}


};

function checaPermissao(idDiv, recursos){
	
  arrayRecursos = recursos.split("|");

  //console.log(arrayRecursos);
  //console.log(idDiv);
  if(!arrayRecursos.includes(idDiv)){
  $(`#`+idDiv).hide();
  if($('#'+idDiv).hasClass('micro-recurso')){
    $('.micro-recurso').hide();
  }
  
 
  }

};

  function ocultaCheckBox(){
    $('.form-check-input').hide();
    $('.form-check-label').hide();
    $('.mt-auto').hide();

	};


window.setTimeout(function() {
  $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
  });
}, 3000);


function ativaScript(){
  var d = new Date();
  var n = d.getSeconds();  
  
  setTimeout(function(){
          
    location.reload();
      
    },
    /*Math.floor((Math.random() * n+240) + 1)*/n*1000);

    console.log(n);
    //console.log(n+240);
}

function preencheModalInfoPedido(baseURL, idPedido, total){
	$('#infomodal').modal('toggle');
	$('#headerModal').html('Pedido');
	//console.log("entrou na função!");
	//////////////////INICIO ROTINA PEDIDO/////////////////
	$.ajax({
		type: 'POST',
		//Caminho do arquivo do seu controller/função
		//url: 'sugestao/post_sugestao',
		url: baseURL + 'paineladmin/paineladmin/lista_produtos',
		data: {'idPedido' : idPedido},
		dataType: 'JSON',
		beforeSend: function(){
      $('#tabela-produtos > tbody').html("");
      $('#totalproduto').html("");
			$('#tabela-produtos > tbody:last-child').append('<tr><td colspan="5"><div class="d-flex justify-content-center">Coletando informações... <div class="spinner-border" role="status"><span class="sr-only"></span></div></div></td></tr></tr>');
			//console.log("cheguei a rodar");
		},
		success: function(json){   
			console.log(json);
	
			var produtospedidos = json.produtospedidos;
			//console.log(produtospedidos);
			
				$('#tabela-produtos > tbody').html("");
				
				if(produtospedidos.length > 0){
					$.each(produtospedidos, function (i, c) {

						console.log(produtospedidos.nome_produto);
            $('#tabela-produtos > tbody:last-child').append('<tr><td class="text-center">'+c.nome_produto+'</td><td class="text-center">'+c.quantidade+'</td><td class="text-center"> R$ '+c.preco_pedido+'</td></tr></tr>');

          });
          
          $('#totalproduto').append('<p class="text-lg-right"> TOTAL = R$ '+total+'</p>');
          
				}else{
          $('#tabela-produtos > tbody:last-child').append('<tr><td colspan="6"><div class="d-flex justify-content-center">Não há cursos cadastrados nesta unidade </div></td></tr></tr>');

				}
        

		
		
		},
		error: function(XMLHttpRequest, requestObject, error, errorThrown){			
			$('#tabela-produtos > tbody').html("");
			//$('#tabela-produtos > tbody:last-child').append('<tr><td colspan="6"><div class="d-flex justify-content-center">Ocorreu um erro na requisição. Tente novamente em instantes.</div></td></tr></tr>');
	
			console.log(XMLHttpRequest);
			console.log(requestObject);
			console.log(error);
			//console.log(errorThrown);
			//console.log('Erro na transferência');
			//console.error(error.toString());
		}     
		
	});

}

function limpa_formulário_cep() {
        //Limpa valores do formulário de cep.
        document.getElementById('logradouro').value=("");
        /* document.getElementById('bairro').value=(""); */
        document.getElementById('cidade').value=("");
        document.getElementById('uf').value=("");
        document.getElementById('ibge').value=("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('logradouro').value=(conteudo.logradouro);
        /* document.getElementById('bairro').value=(conteudo.bairro); */
        document.getElementById('cidade').value=(conteudo.localidade);
        document.getElementById('uf').value=(conteudo.uf);
        /* document.getElementById('ibge').value=(conteudo.ibge); */
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}
    
function pesquisacep() {

    var valorcep = document.getElementById('cep').value;

    //Nova variável "cep" somente com dígitos.
    var cep = valorcep.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('logradouro').value="...";
            /* document.getElementById('bairro').value="..."; */
            document.getElementById('cidade').value="...";
            document.getElementById('uf').value="...";
            /* document.getElementById('ibge').value="..."; */

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};