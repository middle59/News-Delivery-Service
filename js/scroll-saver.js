"use strict";

//Scroll-Saver.js
//Last Update: 2-18-15
//Saves the current position on screen and allows it to be loaded
//Refreshes will keep you at the same point on the page rather than replace you to the top

//Set & Get Cookie -- w3schools.com

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
} 

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) != -1) return c.substring(name.length,c.length);
    }
    return "";
} 

function saveScrollPos()
{
	var x = document.documentElement.scrollLeft?document.documentElement.scrollLeft:document.body.scrollLeft;
	var y = document.documentElement.scrollTop?document.documentElement.scrollTop:document.body.scrollTop;
	var scrollPoint = x+","+y
	setCookie("PagePosition", scrollPoint, 1)
}

function loadScrollPos()
{
	var scrollPoint = getCookie("PagePosition")
	if(scrollPoint)
	{
		var points = scrollPoint.split(",")
		//assuming two points in array
		window.scrollTo(parseInt(points[0]),parseInt(points[1]))
	}
}

