$( document ).ready(function() {
  	$("#login").click(function(e){
  		e.preventDefault();
		if (event.altKey) {
			// console.log(window.location.href)
			window.location.href = location.origin + "/auth/signin";
		}
	})

});