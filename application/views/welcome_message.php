<?php
$this->load->view('partials/head', ['title' => 'Ajax Posts']);
$this->load->view('partials/foot');
?>
<form style="display: none;" action="/posts/create" class="panel" id="form">
	<div class="panel-heading">
		<span class="add trigger btn btn-default">Add</span><input class="panel-input" name="title" placeholder="Title"><span class="form_hide">&#10008</span>	
	</div>
	<div class="panel-body">
		<textarea id="trigger" name="description" class="note" placeholder="Enter your note here."></textarea>
	</div>
</form>
<?php
	foreach ($posts as $post){
		$this->load->view('partials/nav', ['title' => $post['title'], 'description' => $post['description'], 'id' => $post['id']]);
	}
	if (empty($posts)){
		echo "<button id='new' class='btn btn-primary'>New Note</button>";
	}
?>
<script>
	$(document).on('click', '#new, .add', function(){
		$('button').hide();
		$('#form').show();
	})
	$('.form_hide').click(function(){
		$('#form').hide();
	})
	$('.trigger').click(function(){
		var input = $('#form').serialize();
		$('#form')[0].reset();
		console.log(input);
		$.post(
			"/posts/create",
			input,
			function (output) {
				$('#form').hide();
				$('body').append(output);
				console.log(output);
			},
			'html'
		);
		return false;
	})
	$(document).on('click', '.delete', function(){
		var id = $(this).closest('.panel').attr('id');
		$(this).closest('.panel').remove();
		$.post("/posts/delete/"+id);
	})
	$(document).on('focusout', '.update, .title_form', function(){
		console.log('updated');
		var that = $(this).closest('form');
		var input = $(this).closest('form').serialize();
		console.log(input);
		var id = $(this).closest('.panel').attr('id');
		$.post(
			"/posts/update/"+id,
			input,
			function (output) {
				console.log(output);
				that.replaceWith(output);
			},
			'html'
		);
	})
</script>