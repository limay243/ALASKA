class Signal{
		constructor(){
			var redAlert = document.getElementById('signalCom');
			redAlert.addEventListener("clik", alerted.bind(this));
			alertComment = false;
		}
	alerted(e){
		if(isset(alertComment)) {
			$("#signalCom").css('color','red');
		}
	}
}

new Signal();