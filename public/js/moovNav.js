class Moov{
	constructor(){
		$(".nav-logo h2"); 
	}

	MoovNav(){
			if($_SESSION['pseudo'] == true){
			$('.nav-logo h2').css({'position': 'relative', 'left':'30%', 'color': 'red'});
		}
	}
}
new Moov();