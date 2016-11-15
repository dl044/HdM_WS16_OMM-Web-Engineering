// ----------------------------------------------------------------------------------------------------------- //
// File Accordion -------------------------------------------------------------------------------------------- //

// #structure_dir ausblenden bei Klick auf Ordner ohne Sub-Ordner
//------------------------------------------------------------------------------------------------------------
	var acc = document.getElementsByClassName("file_data");
	var i;
			
	for (i = 0; i < acc.length; i++) {
		acc[i].onclick = function(){
			this.classList.toggle("active_file");
			this.nextElementSibling.classList.toggle("show_file_func");
		}
	}