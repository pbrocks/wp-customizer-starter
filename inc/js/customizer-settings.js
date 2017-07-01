jQuery(function($) {
 
	$.ajax({
		method: 'GET',
		url: CUSTMIZR.api.url,
		beforeSend: function ( xhr ) {
			xhr.setRequestHeader( 'X-WP-Nonce', CUSTMIZR.api.nonce );
		}
	}).then( function ( r ) {
		if( r.hasOwnProperty( 'industry' ) ){
			$( '#industry' ).val( r.industry );
		}
 
		if( r.hasOwnProperty( 'amount' ) ){
			$( '#amount' ).val( r.amount );
		}
	});
 
	$( '#customizer-starter-form' ).on( 'submit', function (e) {
		e.preventDefault();
		var data = {
			amount: $( '#amount' ).val(),
			industry: $( '#industry' ).val()
		};
 
		$.ajax({
			method: 'POST',
			url: CUSTMIZR.api.url,
			beforeSend: function ( xhr ) {
				xhr.setRequestHeader('X-WP-Nonce', CUSTMIZR.api.nonce);
			},
			data:data
		}).then( function (r) {
			$( '#feedback' ).html( '<p>' + CUSTMIZR.strings.saved + '</p>' );
		}).error( function (r) {
			var message = CUSTMIZR.strings.error;
			if( r.hasOwnProperty( 'message' ) ){
				message = r.message;
			}
			$( '#feedback' ).html( '<p>' + message + '</p>' );
 
		})
	})
});