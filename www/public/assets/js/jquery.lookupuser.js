(function( $ ) {
 	//dependent on typeahead


    $.fn.lookUpUser = function(typeAheadDataSrc, doCallback) {
 		
 		// console.log('lookUpUser', this)
 		$input = this.find('input');
 		$submit = this.find('.btn');

 		console.log($input, $submit);

  		//$('.typeahead').typeahead({
		// 		prefetch: '/allusers'
		// 	});

		$input
		.typeahead({
			prefetch: typeAheadDataSrc
		});
		.keypress(function(e){
			var code = e.keyCode || e.which;
			if(code == 13) { //Enter keycode
				e.preventDefault();
				doCallback();

			}
		})

		$submit.click(function(e){
			e.preventDefault();
			doCallback();
		})
 
    };
 
}( jQuery ));


