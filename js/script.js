var video = document.getElementById('video');
video.volume = 0.2;
document.onload = function(){
	var player = document.getElementById("video_html5_api");
	document.getElementById("vidtitle").innerHTML = video.getAttribute("src")
}
