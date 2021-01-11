$(document).ready(function() {
    $('.bar_custom').click(function() {
        $('.mobile_menu_1').animate({ right: '0%' }, 'fast');
        $('.layout_custom').animate({ top: '0%', right: '0%' }, 'fast');
    });
    $('.layout_custom').click(function() {
        $('.mobile_menu_1').animate({ right: '-100%' }, 'fast');
        $('.layout_custom').animate({ top: '-100%', right: '100%' }, 'fast');
    });
    $('.bar_custom_2').click(function() {
        $('.mobile_menu_2').animate({ left: 0 }, 'fast');
        $('.layout2').animate({ right: 0, top: 0 }, 'fast');
    });
    $('.layout2').click(function() {
        $('.mobile_menu_2').animate({ left: '-100%' }, 'fast');
        $('.layout2').animate({ right: '-100%', top: '-100%' }, 'fast');
    });
});