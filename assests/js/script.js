var currentPlaylist = [];

var shufflePlaylist = [];
var tempPlaylist = [];
//var currentTime;
var audioElement;

var mouseDown = false;

var currentIndex = 0;

var repeat = false;

var shuffle = false;

var userLoggedIn;

var timer;

$(document).click(function(click){
	var target = $(click.target);

	if(!target.hasClass("item") && !target.hasClass("optionsButton")){
		hideOptionMenu();
	}
});

$(window).scroll(function(){
	hideOptionMenu();
});

$(document).on("change", "select.playlist", function(){
	var playlistId = $(this).val();
	var songId = $(this).prev(".songId").val();

	console.log("Playlist Id:" + playlistId);
	console.log("song Id:" + songId);
});

function openPage(url) {

	if(timer !=  null){
		clearTimeout(timer);
	}
	if(url.indexOf("?") == -1) {
		url = url + "?";
	}

	var encodedUrl = encodeURI(url + "&userLoggedIn=" + userLoggedIn);
	$("#mainContent").load(encodedUrl);
	$("body").scrollTop(0);
	history.pushState(null, null, url); // no url changing in the address bar when navigating...

} 

function createPlaylist(){
	var alert1 = prompt("Please Enter your Playlist Name");

	if(alert1 != null){
		$.post("includes/handlers/ajax/createPlaylist.php", {name: alert1, username: userLoggedIn })
		.done(function(error){
			// Do Something when Ajax returns

			if(error != ""){
				alert(error);
				return;
			}

			openPage("yourMusic.php");

		});
	}

}

function hideOptionMenu(){
	var menu = $(".optionMenu");

	if(menu.css("display")!= "none"){
		menu.css("display", "none");
	}
}

function showOptionsMenu(button){

	var songId = $(button).prevAll(".songId").val();

	var menu =$(".optionMenu");
	var menuWidth = menu.width();
	menu.find(".songId").val(songId);

	var scrollTop = $(window).scrollTop(); // DIstance from top of windows to top of document

	var elementOffset = $(button).offset().top; // Distance from top of document

	var top = elementOffset - scrollTop;

	var left = $(button).position().left;

	menu.css({"top": top + "px", "left": left - menuWidth + "px", "display":"inline"});

}

function deletePlaylist(playlistId){

	var alert2 = confirm("Are You Sure You want to Delete Playlist?");

	if(alert2 == true){
		$.post("includes/handlers/ajax/deletePlaylist.php", { playlistId:  playlistId })
		.done(function(error){
			// Do Something when Ajax returns

			if(error != ""){
				alert(error);
				return;
			}

			openPage("yourMusic.php");

		});console.log("Delete Playlist");
	}

}

function formatTimeDuration(seconds){
	var time = Math.round(seconds); // decimals
	var minutes = Math.floor(time/60); //Rounding off...
	var seconds = time - (minutes * 60);

	var extraZero = (seconds < 10) ? "0" : "";

	return minutes + ":" + extraZero + seconds;
}

function playFirstSong(){
	setTrack(tempPlaylist[0], tempPlaylist,true);
}

function updateTimeProgressBar(audio) {
	$(".progressTime.current").text(formatTimeDuration(audio.currentTime));
	$(".progressTime.remaining").text(formatTimeDuration(audio.duration - audio.currentTime));

	var progress = audio.currentTime / audio.duration * 100;
	$(".playbackBar .progress").css("width", progress + "%");
}

function updateVolumeProgressBar(audio){

	var volume = audio.volume * 100;
	$(".volumeBar .progress").css("width", volume + "%");

}


function Audio() {
	// body...
	this.currentlyPlaying;
	this.audio = document.createElement('audio');

	this.audio.addEventListener("ended", function(){
		nextSong();
	});

	this.audio.addEventListener("canplay", function(){
		//this means the object to which event is called on...
		var duration = formatTimeDuration(this.duration);
		$(".progressTime.remaining").text(duration);
	});

	this.audio.addEventListener("timeupdate", function(){
		if(this.duration) {
			updateTimeProgressBar(this);
		}
	});


	this.audio.addEventListener("volumechange", function(){
		updateVolumeProgressBar(this);
	});


	// this.setTrack = function(src){
	// 	//this.currentlyPlaying = track;
	// 	this.audio.src = src;
	// }
	
	// For Update Plays Testing...Down One.Commented above one..

	this.setTrack = function(track){
		this.currentlyPlaying = track;
		this.audio.src = track.path;
	}

	this.play = function(){
		this.audio.play();
	}

	this.pause = function() {
		this.audio.pause();
	}

	this.setTime = function(seconds){
		this.audio.currentTime = seconds;
	}
}