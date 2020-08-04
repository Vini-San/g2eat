$('#inserir_banner_modal').ready( function() {

	$( '#selectBannerImg_new' ).html( '<ul class="filetree start"><li class="wait">' + 'Acessando repositório...' + '<li></ul>' );
	
	var baseUrl = getBaseUrl();
	getfilelist($('#selectBannerImg_new'), '../../../../uploads' );
	
	function getfilelist( cont, root ) {
	
		$( cont ).addClass( 'wait' );
			
		$.post('./../../application/views/admin/banners/Foldertree.php', { dir: root }, function( data ) {
	
			$( cont ).find( '.start' ).html( '' );
			$( cont ).removeClass( 'wait' ).append( data );
			if( 'Sample' == root ) 
				$( cont ).find('UL:hidden').show();
			else 
				$( cont ).find('UL:hidden').slideDown({ duration: 500, easing: null });
			
		});
	}
	
	$( '#selectBannerImg_new' ).on('click', 'LI A', function() {
		var entry = $(this).parent();
		
		if( entry.hasClass('folder') ) {
			if( entry.hasClass('collapsed') ) {
				entry.find('UL').remove();
				getfilelist( entry, escape( $(this).attr('rel') ));
				entry.removeClass('collapsed').addClass('expanded');
			}
			else {
				entry.find('UL').slideUp({ duration: 500, easing: null });
				entry.removeClass('expanded').addClass('collapsed');
			}
		} else {
			var path_min = $(this).attr('rel');
			$('#imagem_banner_new_show').attr('src', path_min);
			path_min = path_min.slice((baseUrl.length)-18);
			$( '#imagem_banner_new' ).attr( 'value' , path_min);
		}
	return false;
	});
	
});

$('#editar_banner_modal').ready(function () {

	$('#selectBannerImg_edit').html('<ul class="filetree start"><li class="wait">' + 'Acessando repositório...' + '</li></ul>');

	getfilelist($('#selectBannerImg_edit'), '../../../../uploads');

	function getfilelist(cont, root) {

		$(cont).addClass('wait');

		$.post('./../../application/views/admin/banners/Foldertree.php', { dir: root }, function (data) {

			$(cont).find('.start').html('');
			$(cont).removeClass('wait').append(data);
			if ('Sample' == root)
				$(cont).find('UL:hidden').show();
			else
				$(cont).find('UL:hidden').slideDown({ duration: 500, easing: null });

		});
	}

	$('#selectBannerImg_edit').on('click', 'LI A', function () {
		var entry = $(this).parent();
		var baseUrl = getBaseUrl();

		if (entry.hasClass('folder')) {
			if (entry.hasClass('collapsed')) {
				entry.find('UL').remove();
				getfilelist(entry, escape($(this).attr('rel')));
				entry.removeClass('collapsed').addClass('expanded');
			}
			else {
				entry.find('UL').slideUp({ duration: 500, easing: null });
				entry.removeClass('expanded').addClass('collapsed');
			}
		} else {
			var path_min = $(this).attr('rel');
			$('#imagem_banner_edit_show').attr('src', path_min);
			path_min = path_min.slice((baseUrl.length) - 18);
			$('#imagem_banner_edit').attr('value', path_min);
		}
		return false;
	});

});