// //load more js

// //https://rudrastyh.com/wordpress/load-more-posts-ajax.html

// jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error

// 	//more button
// 	$('.rm_loadmore').click(function(){
 
// 		var button = $(this),
// 		    data = {
// 			'action': 'loadmore',
// 			'query': rm_loadmore_params.posts, // that's how we get params from wp_localize_script() function
// 			'page' : rm_loadmore_params.current_page
// 		};
 
// 		$.ajax({ // you can also use $.post here
// 			url : rm_loadmore_params.ajaxurl, // AJAX handler
// 			data : data,
// 			type : 'POST',
// 			// beforeSend : function ( xhr ) {
// 			// 	button.text('Loading...'); // change the button text, you can also add a preloader image
// 			// },
// 			success : function( data ){
// 				if( data ) { 
// 					$('.article-container .row').hide();
// 					$('.article-container').append(data); // insert new posts
// 					rm_loadmore_params.current_page++;

// 					console.log(rm_loadmore_params.current_page);
 
// 					if ( rm_loadmore_params.current_page == rm_loadmore_params.max_page ) 
// 						button.remove(); // if last page, remove the button
 
// 					// you can also fire the "post-load" event here if you use a plugin that requires it
// 					// $( document.body ).trigger( 'post-load' );
// 				} else {
// 					button.remove(); // if no data, remove the button as well
// 				}
// 			}
// 		});
// 	});

// 	//prev button
// 	$('.rm_loadprev').click(function(){
 
// 		var button = $(this),
// 		    data = {
// 			'action': 'loadmore',
// 			'query': rm_loadmore_params.posts, // that's how we get params from wp_localize_script() function
// 			'page' : rm_loadmore_params.current_page
// 		};
 
// 		$.ajax({ // you can also use $.post here
// 			url : rm_loadmore_params.ajaxurl, // AJAX handler
// 			data : data,
// 			type : 'POST',
// 			// beforeSend : function ( xhr ) {
// 			// 	button.text('Loading...'); // change the button text, you can also add a preloader image
// 			// },
// 			success : function( data ){
// 				if( data ) { 
// 					$('.article-container .row').hide();
// 					$('.article-container').append(data); // insert new posts
// 					rm_loadmore_params.current_page--;

// 					console.log(rm_loadmore_params.current_page);
 
// 					if ( rm_loadmore_params.current_page == 1 ) 
// 						button.remove(); // if first page, remove the button
 
// 					// you can also fire the "post-load" event here if you use a plugin that requires it
// 					// $( document.body ).trigger( 'post-load' );
// 				} else {
// 					button.remove(); // if no data, remove the button as well
// 				}
// 			}
// 		});
// 	});

// });