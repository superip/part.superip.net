$( document ).ready( function() {
    wow = new WOW({
        animateClass: 'animated',
        offset:       100,
        callback:     function(box) {
        }
    });
    wow.init();
        
});

//$(window).load(function(){
//    var a=$("#bo_gall .gall_img img").outerHeight();
//    $("#bo_gall .gall_img span").css("line-height",a+'px');
//});
window.onload = function(){$(window).resize();
	var a=$("#bo_gall .gall_img img").outerHeight();
    $("#bo_gall .gall_img span").css("line-height",a+'px');

	$(window).resize();
}