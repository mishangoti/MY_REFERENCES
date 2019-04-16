/*
 *
 *
 *
 *
 *
 *
 *
 */

function giveAreaOfSquare(sizeofside){
	var Area = Math.pow(sizeofside, 2);
	return Area;
} 

function giveAreaOfCercle(radius){
	var pi = 3.14;
	var Area = pi*radius*radius;
	return Area;
}

function covertDaysIntoMonthsAndDays(days){
	var months = days / 30;
	var day = days % 30;

	var result = Math.round(months)+' Months - '+Math.round(days)+' Days';
	return result;
}