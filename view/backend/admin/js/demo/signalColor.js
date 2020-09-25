class Signal{
		constructor(){
			this.redAlert = document.getElementById('signalCom');
			redAlert.addEventListener('click', this.alerted.bind(this));
			alertComment = false;
		}
	alerted(){
		if(isset(alertComment)) {
			$("#signalCom").css('color','red');
		}
	}
}
new Signal();