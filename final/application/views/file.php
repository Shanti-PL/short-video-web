<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload Multiple files</title>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dropzone/dropzone.min.css">
	<style>
		body {
			background: #f7f7f7;
			font-family: 13px/20px normal Helvetica, Arial, sans-serif;
		}

		.dropzone {
			background: #fff;
			border: 2px dashed #ddd;
			border-radius: 5px;
		}

		.dz-message {
			color: #999;
		}

		.dz-message:hover {
			color: #464646;
		}

		.dz-message h3 {
			font-size: 200%;
			margin-bottom: 15px;
		}
	</style>
</head>
<body>
	<br>
	<script async src="https://cse.google.com/cse.js?cx=c86c8e3d539f75ab4"></script>
	<div class="gcse-search"></div>
	<br>
	
	<div id="content">
		<div id="my-dropzone" class="dropzone">
			<div class="dz-message">
				<h3>Drop files here</h3> or <strong>click</strong> to upload
			</div>
		</div>
	</div>

	<script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/dropzone/dropzone.min.js"></script>
	<script>
		Dropzone.autoDiscover = false;
		var myDropzone = new Dropzone("#my-dropzone", {
			url: "<?php echo site_url("upload/do_upload") ?>",
			acceptedFiles: "image/*",
			addRemoveLinks: true,
			removedfile: function(file) {
				var name = file.name;

				$.ajax({
					type: "post",
					url: "<?php echo site_url("upload/remove") ?>",
					data: { file: name },
					dataType: 'html'
				});

				// remove the thumbnail
				var previewElement;
				return (previewElement = file.previewElement) != null ? (previewElement.parentNode.removeChild(file.previewElement)) : (void 0);
			},
			init: function() {
				var me = this;
				$.get("<?php echo site_url("upload/list_files") ?>", function(data) {
					// if any files already in server show all here
					if (data.length > 0) {
						$.each(data, function(key, value) {
							var mockFile = value;
							me.emit("addedfile", mockFile);
							me.emit("thumbnail", mockFile, "<?php echo base_url(); ?>uploads/" + value.name);
							me.emit("complete", mockFile);
						});
					}
				});
			}
		});
	</script>
</body>
</html>




















