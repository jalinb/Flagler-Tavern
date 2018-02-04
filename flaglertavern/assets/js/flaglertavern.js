jQuery(document).ready(function ($) {

	// Top Navigation Shrink
	$(document).on("scroll", function(){
		if
      ($(document).scrollTop() > 40){
		  $(".sticky-nav").addClass("shrink");
		  $(".header-logo").addClass("logo-shrink");
		}
		else
		{
			$(".sticky-nav").removeClass("shrink");
			$(".header-logo").removeClass("logo-shrink");
		}
	});
    // END Top Navigation Shrink




    // Parallax Home Page
    //Sign
    var parallaxItem = $('.sign-img')[0];
  
    var sign = $('.sign-img');
    var offset = sign.offset();
 
    $('.home-slider-wrap').mousemove(function (e) {
      parallax(e, parallaxItem);
    });

    function parallax(e, target) {
        var x = (offset.left) - (e.pageX) / 150;
        var y = (210) - (e.pageY) / 150;

        $(target).offset({
          top: y,
          left: x,
        });
    };
  
    // Building
    var parallaxItem2 = $('.home-slider-wrap')[0];
  
    var building = $('.home-slider-wrap').css('background-position-x');
 
    $('.home-slider-wrap').mousemove(function (e) {
        parallax2(e, parallaxItem2);
    });

    function parallax2(e, target2) {
      if ( window.innerWidth >= 1760 ) {
        var x = ($(window).width() - (1760)) - (e.pageX) / 50;
      } else if ( window.innerWidth > 1760 ){
        var x = ((1760) - ($(window).width()))- (e.pageX) / 50;
      }
        var y = e.pageY / 50;

        $('.home-slider-wrap').css('background-position-x', x);
        $('.home-slider-wrap').css('background-position-y', y);
    };
    // END Parallax Home Page




    // Parallax The Bounty Page
    function drinkParallax() {
      // Drink
      var parallaxItem = $('.drink-img')[0];

      var drink = $('.drink-img');
      var offset = drink.offset();

      $('.bounty-wrap').mousemove(function (e) {
        parallax(e, parallaxItem);
      });

      function parallax(e, target) {
          var x = (offset.left) - (e.pageX) / 100;
          var y = (230) - (e.pageY) / 100;

          $(target).offset({
            top: y,
            left: x,
          });
      };
    }
  
    function backgroundParallax() {
      // Background
      var parallaxItem2 = $('.bounty-wrap')[0];

      var background = $('.bounty-wrap').css('background-position-x');

      $('.bounty-wrap').mousemove(function (e) {
          parallax2(e, parallaxItem2);
      });

      function parallax2(e, target2) {
        if ( window.innerWidth >= 1016 ) {
          var x = ($(window).width() - (1016)) / 2 - (e.pageX) / 150;
        } else if ( window.innerWidth > 1016 ){
          var x = ((1050) - ($(window).width())) - (e.pageX) / 150;
        }
          var y = e.pageY / 150;

          $('.bounty-wrap').css('background-position-x', x);
          $('.bounty-wrap').css('background-position-y', y);
      };
    }
  
    // Run Parallax Functions
    drinkParallax();
    backgroundParallax();
    // END Parallax The Bounty Page




    // Weather Undergroud Tide API  
    $.ajax({
        method: 'GET',
        dataType : "jsonp",
        url : "https://api.wunderground.com/api/d6fadca18738e4ec/tide/q/FL/New_Smyrna_Beach.json",

        success : function(parsed_json) {
            // high tide
            var ht_hour = parsed_json['tide']['tideSummary']['1']['date']['hour'];
            var ht_min = parsed_json['tide']['tideSummary']['1']['date']['min'];
            var ht_time = ht_hour + ":" + ht_min;

            ht_time = ht_time.split(':'); // convert to array

            // fetch
            var ht_hours = Number(ht_time[0]);
            var ht_minutes = Number(ht_time[1]);

            // calculate
            var ht_timeValue;

            if (ht_hours > 0 && ht_hours <= 12) {
              ht_timeValue= "" + ht_hours;
            } else if (ht_hours > 12) {
              ht_timeValue= "" + (ht_hours - 12);
            } else if (ht_hours == 0) {
              ht_timeValue= "12";
            }
             
            ht_timeValue += (ht_minutes < 10) ? ":0" + ht_minutes : ":" + ht_minutes;  // get minutes
            ht_timeValue += (ht_hours >= 12) ? " PM" : " AM";  // get AM/PM
            high_tide = ht_timeValue;



            // low tide
            var lt_hour = parsed_json['tide']['tideSummary']['3']['date']['hour'];
            var lt_min = parsed_json['tide']['tideSummary']['3']['date']['min'];
            var lt_time = lt_hour + ":" + lt_min;

            lt_time = lt_time.split(':'); // convert to array

            // fetch
            var lt_hours = Number(lt_time[0]);
            var lt_minutes = Number(lt_time[1]);

            // calculate
            var lt_timeValue;

            if (lt_hours > 0 && lt_hours <= 12) {
              lt_timeValue= "" + lt_hours;
            } else if (lt_hours > 12) {
              lt_timeValue= "" + (lt_hours - 12);
            } else if (lt_hours == 0) {
              lt_timeValue= "12";
            }
             
            lt_timeValue += (lt_minutes < 10) ? ":0" + lt_minutes : ":" + lt_minutes;  // get minutes
            lt_timeValue += (lt_hours >= 12) ? " PM" : " AM";  // get AM/PM
            low_tide = lt_timeValue;



            // add to page
            $("#high-tide").append(high_tide);
            $("#low-tide").append(low_tide);
        }

    });
    // END Weather Undergroud Tide API




    // Weather Module
    $.ajax({
        url: "http://api.openweathermap.org/data/2.5/weather?zip=32168,us&appid=7a132beab8a5d216823ce7bd02132777",
        dataType : "json",
        type: "GET", 

        success: function(json) {
            var temp = Math.round(json.main.temp * 9/5 - 459.67);
            var windSpeed = Math.round(json.wind.speed * 25/11)
            var windDegree = json.wind.deg;
          
            if (windDegree>11.25 && windDegree<33.75){
                windDegree = 'NNE';
            }else if (windDegree>33.75 && windDegree<56.25){
                windDegree = 'ENE';
            }else if (windDegree>56.25 && windDegree<78.75){
                windDegree = 'E';
            }else if (windDegree>78.75 && windDegree<101.25){
                windDegree = 'ESE';
            }else if (windDegree>101.25 && windDegree<123.75){
                windDegree = 'ESE';
            }else if (windDegree>123.75 && windDegree<146.25){
                windDegree = 'SE';
            }else if (windDegree>146.25 && windDegree<168.75){
                windDegree = 'SSE';
            }else if (windDegree>168.75 && windDegree<191.25){
                windDegree = 'S';
            }else if (windDegree>191.25 && windDegree<213.75){
                windDegree = 'SSW';
            }else if (windDegree>213.75 && windDegree<236.25){
                windDegree = 'SW';
            }else if (windDegree>236.25 && windDegree<258.75){
                windDegree = 'WSW';
            }else if (windDegree>258.75 && windDegree<281.25){
                windDegree = 'W';
            }else if (windDegree>281.25 && windDegree<303.75){
                windDegree = 'WNW';
            }else if (windDegree>303.75 && windDegree<326.25){
                windDegree = 'NW';
            }else if (windDegree>326.25 && windDegree<348.75){
                windDegree = 'NNW';
            }else{
                windDegree = 'N'; 
            }

            $('#city-weather-temperature').html(temp + '° F');
            $('#city-title').html(json.name);
            $('#city-weather-wind span').html(windDegree + ' ' + windSpeed + 'mph ');
            $('#city-weather-description').html(json.weather[0].description);
            $('i#city-weather-icon').attr('class', 'owf owf-' + json.weather[0].id + ' owf-4x');
        },
        error: function(xhr, status, errorThrown) {
          //do something if there was an error. Right now it will just show the default values in the html
        }
    });
    // END Weather Module




    // Google Timezone API (For swapping out the building image at night)
    var lat = 29.0387527
    var long = -80.8975305
    var apikey = 'AIzaSyAdyeoP-G6O3Q-wvBEUhMl0TGaY2e8TJa8'
    var targetDate = new Date() // Current date/time of user computer
    var timestamp = targetDate.getTime()/1000 + targetDate.getTimezoneOffset() * 60

    $.ajax({
        url:"https://maps.googleapis.com/maps/api/timezone/json?location=" + lat + "," + long + "&timestamp=" + timestamp + "&key=" + apikey + "&sensor=false",
    })

    .done(function(response) {
        if(response.timeZoneId != null){

          var dst = (response.dstOffset) * 1000
          var raw = (response.rawOffset) * 1000
          var offsets = dst + raw
          // Current time
          var finalTime = new Date(timestamp * 1000 + offsets)
          // Current hour in military time
          var hours = (finalTime).getHours()

          $('#flagler-tavern-time').html(finalTime)
          
          // If the hour is great than 19
          if(hours <= 6 || hours >= 19) {
            $('.home #masthead').css('background', '#132939')
            $('.home .navigation-top').css('background', '#132939')
            $('.home-slider-wrap').css('background', 'url("http://flaglertavern.com/wp-content/themes/flaglertavern/assets/images/backgrounds/flagler-tavern-building-bg-night.jpg")')
            $('.home-slider-wrap').css('background-position', 'bottom center')
            $('.home-slider-wrap .sign-img').attr('src', 'http://flaglertavern.com/wp-content/themes/flaglertavern/assets/images/flagler-tavern-sign-night.png')
            $('.home-slider-wrap').removeClass('day-slider');
            $('.home-slider-wrap').addClass('night-slider');
          }
        }
    });
    // END Google Timezone API
  



}); // End jQuery




// BEGIN JAVASCRITPT

// YouTube Place Holder
document.addEventListener("DOMContentLoaded",
    function() {
        var div, n,
            v = document.getElementsByClassName("youtube-player");
        for (n = 0; n < v.length; n++) {
            div = document.createElement("div");
            div.setAttribute("data-id", v[n].dataset.id);
            div.innerHTML = labnolThumb(v[n].dataset.id);
            div.onclick = labnolIframe;
            v[n].appendChild(div);
        }
    });

function labnolThumb(id) {
    var thumb = '<img src="https://i.ytimg.com/vi/ID/hqdefault.jpg">',
        play = '<div class="play"></div>';
    return thumb.replace("ID", id) + play;
}

function labnolIframe() {
    var iframe = document.createElement("iframe");
    var embed = "https://www.youtube.com/embed/ID?autoplay=1&rel=0";
    iframe.setAttribute("src", embed.replace("ID", this.dataset.id));
    iframe.setAttribute("frameborder", "0");
    iframe.setAttribute("allowfullscreen", "1");
    this.parentNode.replaceChild(iframe, this);
}