	$("video").ready (function() {
			$("#titulos").slideUp(300).delay(10000).fadeIn(400);
			$("video").click(function() {
				$(this).remove();
				$("#titulo1").remove();
				$("#titulo2").remove();
			})
		})