
  $(document).ready(function() {
	/*---------------------------------------------
		Dashboard
	---------------------------------------------*/

	$('.upload-profile-photo .file-input').change(function(){
	    var curElement = $(this).parent().parent().find('.image');
	    var reader = new FileReader();

	    reader.onload = function (e) {
	        // get loaded data and render thumbnail.
	        curElement.attr('src', e.target.result);
	    };

	    // read the image file as a data URL.
	    reader.readAsDataURL(this.files[0]);
	});

	$('.send-file .file-input').change(function(){
	    var curElement = $(this).parent().parent().find('.image');
	    var reader = new FileReader();

	    reader.onload = function (e) {
	        // get loaded data and render thumbnail.
	        curElement.attr('src', e.target.result);
	    };

	    // read the image file as a data URL.
	    reader.readAsDataURL(this.files[0]);
	});


  /*-------------------------------------
    tooltip
  -------------------------------------*/

  $('.user-number i').tooltip();

})
