//Sets jquery in work

var $ = jQuery;

//Laddar single post inlägg direkt på första sidan via ajax.
$(document).ready(function(){

	$.ajaxSetup({
    cache:false,
    async:false
  });
	$(".post-link").click(function(){
		var post_link = $(this).attr("href");
    $(".single-post-container").html("");
    $(".single-post-container").load(post_link);
    $(".single-post-container").bPopup({
            fadeSpeed: 'slow', //can be a string ('slow'/'fast') or int
            followSpeed: 1500, //can be a string ('slow'/'fast') or int
            modalColor: 'black'
            });
		return false;

	});

  $(".gallery-icon a").click(function(){
    var post_link = $(this).attr("href");
    console.log(post_link);
    $('.attachment-big').attr('src', post_link);


    return false;

  });

  // init Isotope
  var $grid = $('.posts-content').isotope({
  	itemSelector: '.item', 
  	layoutMode : 'horizontal'
  });

  // store filter for each group
  var filters = {};

  $('.filters').on( 'click', '.button', function() {
  	var $this = $(this);
    // get group key
    var $buttonGroup = $this.parents('.button-group');
    var filterGroup = $buttonGroup.attr('data-filter-group');
    // set filter for group
    filters[ filterGroup ] = $this.attr('data-filter');
    // combine filters
    var filterValue = concatValues( filters );
    // set filter for Isotope
    $grid.isotope({ filter: filterValue });
});


  // change is-checked class on buttons
  $('.button-group').each( function( i, buttonGroup ) {
  	var $buttonGroup = $( buttonGroup );

	$buttonGroup.on( 'click', 'button', function() {
	$buttonGroup.find('.is-checked').removeClass('is-checked');
	$( this ).addClass('is-checked');
  	});
  });

});

// flatten object by concatting values
function concatValues( obj ) {
	var value = '';
	for ( var prop in obj ) {
		value += obj[ prop ];
	}
	return value;
}


