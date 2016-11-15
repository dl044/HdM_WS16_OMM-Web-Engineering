// ----------------------------------------------------------------------------------------------------------- //
// File Upload -------------------------------------------------------------------------------------------- //

// Prüfen ob Browser Upload unterstützt
var isAdvancedUpload = function() {
  var div = document.createElement('div');
  return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
}();

//Formular identifizieren
var $form = $('.file_upload');

var $input    = $form.find('input[type="file"]'),
    $label    = $form.find('label'),
    showFiles = function(files) {
      $label.text(files.length > 1 ? ($input.attr('data-multiple-caption') || '').replace( '{count}', files.length ) : files[ 0 ].name);
    };

//Wenn Browser drag & drop unterstüzt erhält das Formular die Klasse
if (isAdvancedUpload) {
  $form.addClass('has-advanced-upload');
}

//Wenn Browser drag & drop unterstüzt
if (isAdvancedUpload) {

  var droppedFiles = false;

  $form.on('drag dragstart dragend dragover dragenter dragleave drop', function(e) {
    e.preventDefault();
    e.stopPropagation(); //Ich glaub das heißt mach nix
  })
  //Wenn Dateien per Drag in den Browser gezogen werden Klasse is-dragover hinzufügen
  .on('dragover dragenter', function() {
    $form.addClass('is-dragover');
  })
  //Klasse is-dragover bei Drop oder Drafleave wieder entfernen
  .on('dragleave dragend drop', function() {
    $form.removeClass('is-dragover');
  })
  //Liste von Daten die per drag and Drop in den Browser gezogen wurden
  .on('drop', function(e) {
    droppedFiles = e.originalEvent.dataTransfer.files; // the files that were dropped
  	showFiles( droppedFiles );
  });

}

$input.on('change', function(e) {
  showFiles(e.target.files);
});



//Wenn absenden
$form.on('submit', function(e) {

	// Mehreres absenden verhinder durch Prüfen ob klasse is-uploading vorhanden ist
	if ($form.hasClass('is-uploading')) return false;
	
	//Klasse is-uploading hinzufügen
	$form.addClass('is-uploading').removeClass('is-error');

	if (isAdvancedUpload) {
		e.preventDefault();
		
		var ajaxData = new FormData($form.get(0));
		
		if (droppedFiles) {
			$.each( droppedFiles, function(i, file) {
				ajaxData.append( $input.attr('name'), file);
			});
		}
		
		$.ajax({
			url: $form.attr('action'),
			type: $form.attr('method'),
			data: ajaxData,
			dataType: 'json',
			cache: false,
			contentType: false,
			processData: false,
			complete: function() {
				$form.removeClass('is-uploading');

			},
			success: function(data) {
				$form.addClass( data.success == true ? 'is-success' : 'is-error' );
				if (!data.success) $errorMsg.text(data.error);
			},
			error: function() {
				// Log the error, show an alert, whatever works for you
			}
		});
    } else {
    // ajax for legacy browsers
  }
});