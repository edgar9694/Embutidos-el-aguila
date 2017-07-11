

;(function(){
	//variable que nos ayudara a saber si esta activo el menu en la parte de abajo de la
	let sticky = false
	let currentPosition = 0

	$('#sticky-navigation').removeClass("hidden")
	$('#logo').removeClass("hidden")
	$('#sticky-navigation').slideUp(0)
	$('#logo').slideUp(0)
	checkScroll()

	$("#menu-opener").on("click", toggleNav);

	$(".menu-link").on("click", toggleNav);

	$(window).scroll(checkScroll)

	function checkScroll(){
		//imprime cuanto es que ha bajado el usuario del top
		const inBottom = isInBottom();


		if(inBottom && !sticky){
			//Mostrar la navegacion sticky
			sticky = true;
			stickNavigation();
		}
		if(!inBottom && sticky){
			//Ocultar la navegacion sticky
			//console.log("Regresar la navegacion")
			sticky = false;
			unStickNavigation();
		}
	}

	function toggleNav(){
		$("#responsive-nav ul").toggleClass("active")
		$("#menu-opener").toggleClass("glyphicon-menu-hamburger")
	};

	function stickNavigation(){
		$('#description').addClass('fixed').removeClass('absolute')
		$('#navigation').slideUp("fast")
		$('#logo').slideDown("fast")
		$('#sticky-navigation').slideDown("fast")
	}
	function unStickNavigation(){
		$('#description').removeClass('fixed').addClass('absolute')
		$('#navigation').slideDown("fast")
		$('#logo').slideUp("fast")
		$('#sticky-navigation').slideUp("fast")

	}


	//revisa si ya se llego al final de la ventana
	function isInBottom(){
		const $description = $("#description");
		const descriptionHeight = $description.height();

		return $(window).scrollTop() > $(window).height() - (descriptionHeight * 2);
	}

})()
