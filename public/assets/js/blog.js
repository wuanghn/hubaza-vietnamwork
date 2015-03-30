
	CKEDITOR.disableAutoInline = true;
$(document).ready(function(){


	$(".in_avatar").change(function(){
		readURL(this);
	});

	$('.a_update').click(function(){
		var id = $(this).parent().parent().find('td.td_id').text();
		var discription = $(this).parent().parent().find('td.td_discription').text();
		var name = $(this).parent().parent().find('td.td_name').text();
		var avatar = $(this).parent().parent().find('td.td_avatar').text();

		$('#name_up').val(name);
		$('#discription_up').val(discription);
		$('#img_avatar_up').attr('src',avatar);
		$('#id_up').val(id);
	})

	$('#editor1').ckeditor();




	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$(input).parent().find('.img_avatar').attr('src', e.target.result);
//				$('#img_avatar').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}
})
