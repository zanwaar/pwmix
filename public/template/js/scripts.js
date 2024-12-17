$(document).ready(function(){
    
    function getTimeRemaining(endtime) {
		var t = Date.parse(endtime) - Date.parse(new Date());
		var seconds = Math.floor((t / 1000) % 60);
		var minutes = Math.floor((t / 1000 / 60) % 60);
		var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
		var days = Math.floor(t / (1000 * 60 * 60 * 24));
		return {
			'total': t,
			'days': days,
			'hours': hours,
			'minutes': minutes,
			'seconds': seconds
		};
	}
	
	function initializeClock(id, endtime) {
		var clock = document.getElementById(id);
		var daysSpan = clock.querySelector('.days');
		var hoursSpan = clock.querySelector('.hours');
		var minutesSpan = clock.querySelector('.minutes');
		var secondsSpan = clock.querySelector('.seconds');
	
		function updateClock() {
			var t = getTimeRemaining(endtime);
	
			daysSpan.innerHTML = t.days;
			hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
			minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
			secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);
	
			if (t.total <= 0) {
				clearInterval(timeinterval);
			}
		}
	
		updateClock();
		var timeinterval = setInterval(updateClock, 1000);
	}
	
	var deadline = "January 01 2018 00:00:00 GMT+0300"; 
	var deadline = new Date(Date.parse('Sat Sep 09 2022 20:59:59 GMT+0300 (Москва, стандартное время)') + 24 * 60 * 60 * 1000); // for endless timer
	initializeClock('countdown', deadline);
	
	
	if($(".main-clans-slider").length > 0)
    {
        $(".main-clans-slider").slick({
            dots: false,
            vertical: true,
            slidesToShow: 5,
            slidesToScroll: 5
        });
    }

    $('.page-account').MVisionToggleClass({	
		classButton: 'show-form-btn',
		toggleClassButton: 'active',
		dataButtonAttr: 'data-open-tab',
		classBox: 'content-forms__item',
		toggleClassBox: 'active',
		dataBoxAttr: 'data-name-tab',
        defaultElement: true,
		defaultIndexElement: 0,
		ancoreLinks: true,
	});


    $('.page-features').MVisionToggleClass({	
		classButton: 'show-feature-btn',
		toggleClassButton: 'active',
		dataButtonAttr: 'data-open-tab',
		classBox: 'show-feature-box',
		toggleClassBox: 'active',
		dataBoxAttr: 'data-name-tab',
        defaultElement: true,
		defaultIndexElement: 1,
		ancoreLinks: true,
	});

});


