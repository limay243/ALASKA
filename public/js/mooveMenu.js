class MooveMenu{

	constructor(){
		var envoyer = false;
		var nav = $('.nav-menu nav navbar-nav');

		var btnReza = document.getElementById('envoyer');
    	$('#envoyer').click(this.moove.bind(this));
	}

	moove(){
		if(envoyer == true){
        	$('.nav-menu nav navbar-nav').css('color','red');
        	console.log(MooveMenu);
		}
	}
}
new MooveMenu();