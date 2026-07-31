//************ Title Bar Show********************//

var rev = "fwd";
function titlebar(val)
{
	var msg  = "Best University Bhopal | Top University in Bhopal | RKDF University Bhopal";
	var res = " ";
	var speed = 0;
	var pos = val;

	document.title = msg;
}

titlebar(0);


$(document).ready(function() {
	$('#slider').nivoSlider();
	var active_color = '#000'; // Colour of user provided text
	var inactive_color = '#888'; // Colour of default text
	$('input.captchaText').val("Enter the charectors...");
	$('input.captchaText').css("color", inactive_color);
    $("input.text").css("color", inactive_color);
    var default_values = new Array();
	$("input.text").focus(function(){
        if (!default_values[this.id]) {
            default_values[this.id] = this.value;
        }
        if (this.value == default_values[this.id]) {
            this.value = '';
            this.style.color = active_color;
        }
        $(this).blur(function(){
            if (this.value == '') {
                this.style.color = inactive_color;
                this.value = default_values[this.id];
            }
        });
    });	
    $("input.captchaText").focus(function(){
        if (this.value == 'Enter the charactors...') {
            this.value = '';
            this.style.color = active_color;
        }
        $(this).blur(function(){
            if (this.value == '') {
                this.style.color = inactive_color;
                this.value = 'Enter the charactors...';
            }
        });
    });
	$(".browse").append('<input type="text" class="br-box"></input><span class="brBtn">Upload CV</span>');
	$(".cv-up").css({'position': 'absolute', 'opacity': '0', 'top':'-6px'})
	$(".browse .br-box, .browse .brBtn").click(function () {
		$(".browse .cv-up").trigger('click');
	});
	$('.browse .cv-up').change(function() {
		var str=$(this).val();
		$('.browse .br-box').val(str);
	});
	$('#mainNav li').hover(
		function(){ jQuery(this).find('.dropdown').fadeIn(300); },
		function(){ jQuery(this).find('.dropdown').fadeOut(200); }
	);
	$("#newsBox").jCarouselLite({
		vertical: true,
		hoverPause:true,
		visible: 2,
		auto:3000,
		speed:1000
	});
	
	
});

