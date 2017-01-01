jQuery(document).ready(function($) {

    function PopupCenter(url, title, w, h) {
        // Fixes dual-screen position                         Most browsers      Firefox
        var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
        var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

        var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
        var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

        var left = ((width / 2) - (w / 2)) + dualScreenLeft;
        var top = ((height / 2) - (h / 2)) + dualScreenTop;
        var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

        // Puts focus on the newWindow
        if (window.focus) {
            newWindow.focus();
        }
    }

    function PopUpShare() {

        var shareWrap = $('.wp-socialight-wrapper');

        shareWrap.delay(3300).queue(function(next) {
          $(this).addClass("active-share");
          next();
        });

        var shareNet = $('.socialIcon a:not(".ban_popup")');

        shareNet.click(function(e) {
            e.preventDefault();
            var href = $(this).attr('href');
            var title = $(this).attr('title');
            PopupCenter(href, title, 500, 300);
        });
    }


    function countNetworks() {
        var shareWrap = $('.wp-socialight-wrapper-list .socialIcon').length;
        $('.socialIcon').width((100 / shareWrap)+'%');
    }

    countNetworks();
    PopUpShare();
});