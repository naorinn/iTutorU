function getDays(){
	var date = new Date();
	var year = date.getFullYear();
	var month = date.getMonth();
	return new Date(year, month+1, 0).getDate();
}