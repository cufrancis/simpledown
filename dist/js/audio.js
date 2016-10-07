var http_request = false;
//XMLHttpRequest对象实例化
function send_request( url ) {
    http_request = false;
    if( window.XMLHttpRequest ) {
        http_request = new XMLHttpRequest();
        if( http_request.overrideMimeType) {
            http_request.overrideMimeType('text/xml');
        }
    } else if(window.ActiveXObject) {
        try {
            http_request = new ActiveXObject("Msxml2.XMLHTTP");
        } catch( e ) {
            try {
                http_request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch( e ) {}
        }
    }

    if( !http_request ) {  //异常处理
        window.alert( "不能创建XMLHttpRequest对象实例." );
        return false;
    }
    //指定响应处理函数
    http_request.onreadystatechange = processRequest;
    http_request.open('GET',url,true);
    http_request.send(null);
}
//处理服务器返回的信息  指定的响应函数
function processRequest() {
    if( http_request.readyState == 4 ) { //信息已经返回
        if( http_request.status == 200 ) { //页面正常
            SendMusic( http_request.responseText );
        } else { //页面有问题
            alert( "你所请求的页面有异常." );
        }
    }
}
/**
 * Simple Music Player v1.0
 * By dolphin, http://hbdx.cc, http://weibo.com/dolphin836, 2013/10/09
 */

function SendMusic( song ) {
	var mEngine = new Music( song ),
	m_play   = document.getElementById("jplayer_play"),
    m_pause  = document.getElementById("jplayer_pause"),
    m_switch = document.getElementById("jplayer_next"),
	m_sound  = document.getElementById("jplayer_vmin"),
	m_seek   = document.getElementById("seekbar"),
	m_setsound  = document.getElementById("jpalyer_v_wrap"),
	m_soundcon  = document.getElementById("soundcontorl");
	m_play.onclick = function(){
        mEngine.toPlay("play");
    };
    m_pause.onclick = function(){
        mEngine.toPlay("pause");
    };
    m_switch.onclick = function(){
        mEngine.toSwitch();
    };//换歌
	m_sound.onclick = function(){
        mEngine.toSound();
    };
	m_soundcon.onmouseover = function(){
		mEngine.toShow();
	};
	m_soundcon.onmouseout  = function(){
		mEngine.toHide();
	};
    m_seek.onclick = function(event){
        var activeProgress = getSongProgress(event);
        mEngine.songProgressAdjust(activeProgress);
    };
    m_setsound.onclick = function(event){
        var realVolume = VolumeChangeProcess(event);
        mEngine.volumeControlStrip(realVolume);
    };
	mEngine.toPlay("play");
}

function Music( song ){
    this.musicPlayer     = document.getElementById("playing");
    this.musicPlayer.src = Home + song;
}

Music.prototype.toShow = function() {
	var	seek  = document.getElementById("seekbar");
	var wrap  = document.getElementById("jpalyer_v_wrap");
	var vbar  = document.getElementById("jplayer_vbar");
	seek.style.width = "340px";
	wrap.style.width = "60px";
	vbar.style.display = "block";
};

Music.prototype.toHide = function() {
	var	seek  = document.getElementById("seekbar");
	var wrap  = document.getElementById("jpalyer_v_wrap");
	var vbar  = document.getElementById("jplayer_vbar");
	seek.style.width = "400px";
	wrap.style.width = "0px";
	vbar.style.display = "none";
};

Music.prototype.songProgressAdjust = function(time) {
	this.musicPlayer.currentTime = time;
};

Music.prototype.volumeControlStrip = function(realVolume){
	var msound = 1 - realVolume;
    this.musicPlayer.volume = msound;
	if( msound > 0) {
		if(hasClass(soundicon,"mute")) {
			removeClass(soundicon,"mute");
		}
	} else {
		if(!hasClass(soundicon,"mute")) {
			addClass(soundicon,"mute");
		}		
	}
};

Music.prototype.toPlay = function(toPlay){
	var m_play   = document.getElementById("jplayer_play");
	var m_pause  = document.getElementById("jplayer_pause");
	var m_image  = document.getElementById("image");
	var i_play  = document.getElementById("i_play");
    if(toPlay === "play"){
		var timer;
        this.musicPlayer.play();	
		this.playProgress("play");
        hide(m_play);
        show(m_pause);

		timer = setTimeout(function(){
			var t_time = document.getElementById("tt");
			var alltime = timeAll();
			t_time.innerHTML = timeDispose( alltime );
		},2000);
    }
    if(toPlay === "pause"){
        this.musicPlayer.pause();
		this.playProgress("pause");
        show(m_play);
        hide(m_pause);
    }

};

Music.prototype.playProgress = function(playSwitch){
	var m_progress  = document.getElementById("progress");
	var timer,timeall,currenttime,showtime,songSchedule = 0;
    if(playSwitch === "play"){
		timer = setInterval(
		function(){
			var mPlayer = document.getElementById("playing");
			var m_time  = document.getElementById("pt");
			var seekbar = document.getElementById("seekbar");
			var str     = seekbar.style.width;
			var leng    = str.substring(0,3);
            currenttime = currentTime();
			timeall = timeAll();
			songSchedule = (currenttime/timeall)*leng;
			showtime = timeDispose(currenttime);
			m_time.innerHTML = showtime;
            m_progress.style.width = songSchedule + "px";
            if(mPlayer.ended){
                clearInterval(timer);
                m_progress.style.width = 0;
                document.getElementById("jplayer_next").click();
            }
        },1000);
    }
    if(playSwitch === "pause"){
		clearInterval(timer);
    }
};
//---------------------------------------------------【随机切歌】
Music.prototype.toSwitch = function() {
    send_request( Home + 'music/random' );
};

Music.prototype.toSound = function() {
	var soundicon = document.getElementById("soundicon");
	var vamount   = document.getElementById("vamount");
	if(hasClass(soundicon,"mute")) {
		removeClass(soundicon,"mute");
		this.musicPlayer.volume = 1.0;
		vamount.style.width = "100%";
	} else {
		addClass(soundicon,"mute");
		this.musicPlayer.volume = 0.0;
		vamount.style.width = "0px";
	}
};

function show(element){
    element.style.display = "inline";
}
function hide(element){
    element.style.display = "none";
}

function timeAll(){
    var mPlayer = document.getElementById("playing");
    if(mPlayer.currentTime != 0){
        return mPlayer.duration;
    }else{
        return 0;
    }
}

function currentTime(){
    var mPlayer = document.getElementById("playing");
    return mPlayer.currentTime;
}

function timeDispose(number) {
	var minute = parseInt(number / 60);
	var second = parseInt(number % 60);
	minute = minute >= 10 ? minute : "0" + minute;
	second = second >= 10 ? second : "0" + second;
	return minute + ":" + second;
}

function ShowInfo(name,singer,image) {
	var name_m  = document.getElementById("s-title");
	var song_m  = document.getElementById("s-artist");
	var image_m = document.getElementById("image");
	name_m.innerHTML = name;
	song_m.innerHTML = "歌手：" + singer;
	image_m.style.background = "url("+ image +") no-repeat";
}

function hasClass(element,className){
    var classNum = element.className.split(" "),
        result;
    for(var i=0;i<classNum.length;i++){
        if(classNum[i] === className){
            result = true;
            break;
        }else{
            result = false;
        }
    }
    return result;
}

function addClass(element,className){
    if(!hasClass(element,className)){
        element.className += " " + className;
    }
}

function removeClass(element,className){
    if(hasClass(element,className)){
        var classNum = element.className.split(" ");
        for(var i=0;i<classNum.length;i++){
            if(classNum[i] === className){
                classNum.splice(i,1);
                element.className = classNum.join(" ");
                break;
            }
        }
    }
}

function VolumeChangeProcess(event){
    var progressBP,realVolume;
    var coord = coordinate(event);
	var offsetCoord_X = coord.coord_X;
    progressBP = progressBarPercentage(60,offsetCoord_X);
    volumeSize(progressBP);
    realVolume = parseInt((100 - progressBP) / 10) / 10;
    return realVolume;
}

function volumeSize(size){
    var volumeSizeColor = document.getElementById("vamount");
    volumeSizeColor.style.width = size + "%";	
}

function getSongProgress(event){
    var mplayer = document.getElementById("playing"),progressBP,SongProgress;
    var coord = coordinate(event),offsetCoord_X = coord.coord_X;
    songScheduleChange(offsetCoord_X);
    progressBP = progressBarPercentage(400,offsetCoord_X) / 100;
    SongProgress = progressBP * mplayer.duration;
    return SongProgress;
}

function songScheduleChange(size){
    var progressRateColor = document.getElementById("progress");
    progressRateColor.style.width = size + "px";
}

function progressBarPercentage(totalLength,actLage){
    var Result = (parseInt(actLage) / parseInt(totalLength)) * 100;
    return Math.ceil(Result);
}

function coordinate(e){
  var o = window.event || e,
      coord,
      coord_X,
      coord_Y;

  coord_X = (o.offsetX === undefined) ? getOffset(o).X : o.offsetX;
  coord_Y = (o.offsetY === undefined) ? getOffset(o).Y : o.offsetY;
  coord = { "coord_X" : coord_X , "coord_Y" : coord_Y };
  return coord;
}
function getOffset(e){
  var target = e.target,
      eventCoord,
      pageCoord,
      offsetCoord;

  pageCoord = getPageCoord(target);

  eventCoord = {
    X : window.pageXOffset + e.clientX,
    Y : window.pageYOffset + e.clientY
  };

  offsetCoord = {
    X : eventCoord.X - pageCoord.X,
    Y : eventCoord.Y - pageCoord.Y
  };
  return offsetCoord;
}
function getPageCoord(element){
  var coord = { X : 0, Y : 0 };

  while (element){
    coord.X += element.offsetLeft;
    coord.Y += element.offsetTop;
    element = element.offsetParent;
  }
  return coord;
}



