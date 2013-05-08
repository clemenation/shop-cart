/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(".btn-news").fancybox({
    'transitionIn'		: 'none',
	'transitionOut'		: 'none',
	'titlePosition' 	: 'over',
    'scrolling'	: 'yes',
    'padding'   : 0,
    'type' : 'iframe',
    'width' : '50%',
    'height' : '60%',
    'onComplete' : function(){
        no_border_opacity();	
        $('#fancybox-outer').css({
            'background':'none',
            'border-radius':0
        });
    }
});