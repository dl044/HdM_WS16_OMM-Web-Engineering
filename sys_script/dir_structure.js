// ----------------------------------------------------------------------------------------------------------- //
// Navigation ------------------------------------------------------------------------------------------------ //

jQuery(document).ready(function(test) {

// #structure_dir ausblenden bei Klick auf Ordner ohne Sub-Ordner
//------------------------------------------------------------------------------------------------------------
	jQuery('#dir_structure ul li.no_sub_dir a').click(function(ed3){
	//jQuery('#dir_structure').click(function(ed3){
		ed3.preventDefault();
		jQuery("#dir_structure ul").addClass("hide_dir_structure");
    
	});

// Klasse hinzufügen/entfernen zum ein-/ausblenden von Sub-Ordner
//------------------------------------------------------------------------------------------------------------
  jQuery('#dir_structure ul li.sub_dir a.dir').click(function(e3){
    
    if(jQuery(this).parent().hasClass( "close_sub_dir" )){
       jQuery(this).parent().removeClass( "close_sub_dir" );
    }else {
      jQuery(this).parent().addClass( "close_sub_dir" );  
    }
    
  });

// Funktion Zurück-Button
//------------------------------------------------------------------------------------------------------------
  jQuery('li.back_li a').click(function(e5){
    
    e5.preventDefault();
    jQuery(this).closest('.close_sub_dir').removeClass( "close_sub_dir" );
    
  });

// Funktion Ornderverzeichnis anzeigen
//------------------------------------------------------------------------------------------------------------
  /*jQuery('#toggleMenu').click(function(xy1){
    
    xy1.preventDefault();
    jQuery( "nav ul.firstlevel" ).toggleClass( "closeMainNav" );
    jQuery( "#toggleMenu" ).toggleClass( "closeToggle" );
    jQuery('nav ul.firstlevel li.sub.closeSubNav').removeClass( "closeSubNav" );
    jQuery( "main" ).toggleClass( "displayNone" );
    jQuery( "footer" ).toggleClass( "displayNone" );

  });*/

  
});

/*jQuery( window ).resize(function(a2) {
  
  jQuery( "nav ul.firstlevel" ).removeClass( "closeMainNav" );
  jQuery( "#toggleMenu" ).removeClass( "closeToggle" );
  jQuery('nav ul.firstlevel li.sub.closeSubNav').removeClass( "closeSubNav" );
  jQuery( "main" ).removeClass( "displayNone" );
  
});*/



