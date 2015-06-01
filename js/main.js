//Sets jquery in work

var $ = jQuery;

jQuery(function ($) {
 
	var $container = $('.posts-content'); //The ID for the list with all the blog posts
	$container.isotope({ //Isotope options, 'item' matches the class in the PHP
		itemSelector : '.item', 
  		layoutMode : 'masonry'
	});
 
	//Add the class selected to the item that is clicked, and remove from the others
	var $optionSets = $('#filters'),
	$optionLinks = $optionSets.find('a');
 
	$optionLinks.click(function(){
	var $this = $(this);
	// don't proceed if already selected
	if ( $this.hasClass('selected') ) {
	  return false;
	}
	var $optionSet = $this.parents('#filters');
	$optionSets.find('.selected').removeClass('selected');
	$this.addClass('selected');
 
	//When an item is clicked, sort the items.
	 var selector = $(this).attr('data-filter');
	$container.isotope({ filter: selector });
 
	return false;
	});
 
});

//Laddar single post inlägg direkt på första sidan via ajax.
$(document).ready(function(){
 
        $.ajaxSetup({cache:false});
        $(".post-link").click(function(){
            var post_link = $(this).attr("href");
 
            $(".single-post-container").html("content loading");
            $(".single-post-container").load(post_link);
        return false;
        });
 
    });