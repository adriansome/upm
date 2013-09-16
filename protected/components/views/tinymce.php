<script type="text/javascript" src="<?php echo $this->tinymce; ?>/tinymce.min.js"></script>

<?php
if(isset($this->model))
	echo CHtml::activeTextArea($this->model, $this->attribute, $this->htmlOptions);
else
	echo CHtml::textArea($this->name, $this->value, $this->htmlOptions);
?>

<script>
$(document).ready(function() {
	tinymce.init(
		{ 
			selector: "textarea.tinymce",
			theme: "modern",
			width: 680,
			height: 300,
			plugins: [
				"advlist autolink link image lists charmap print preview hr anchor pagebreak", 
				"searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking", 
				"table contextmenu directionality emoticons paste textcolor responsivefilemanager"
			], 
			toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect", 
			toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor | print preview code ", 
			image_advtab: true , 
			external_filemanager_path:"<?php echo $this->filemanager; ?>/", 
			filemanager_title:"Responsive Filemanager", 
			external_plugins: {
				"filemanager" : "<?php echo $this->filemanager; ?>/plugin.min.js"
			}
		}
	);
});
</script>