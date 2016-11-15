// ----------------------------------------------------------------------------------------------------------- //
// Navigation ------------------------------------------------------------------------------------------------ //

jQuery(document).ready(function(test) {

// #structure_dir ausblenden bei Klick auf Ordner ohne Sub-Ordner
//------------------------------------------------------------------------------------------------------------
	jQuery('#user_management_open').click(function(um1){
	//jQuery('#dir_structure').click(function(ed3){
		um1.preventDefault();
		jQuery("#user_management").toggleClass("show_user_management");
		jQuery("#user_management_open").toggleClass("show_user_management_open");
    
	});
  
});