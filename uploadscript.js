function uploadButton() {
		$('#image_file').trigger('click');
		console.log("i clicked the button");
		var form = document.forms['upload_f'];
		console.log(form);
};