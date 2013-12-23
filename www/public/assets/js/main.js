$( document ).ready(function() {
  	$("#login").click(function(e){
		if (event.altKey) {
  			e.preventDefault();
			// console.log(window.location.href)
			window.location.href = location.origin + "/auth/signin";
		}
	})

});