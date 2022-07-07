$(function() {
    "use strict"; // Start of use strict
    //back to top
    $('body').append('<div id="toTop" class="btn back-top"><span class="fa fa-arrow-up"></span></div>');
    $('body').on("scroll", function () {
        if ($(this).scrollTop() !== 0) {
            $('#toTop').fadeIn();
        } else {
            $('#toTop').fadeOut();
        }
    });
    $('#toTop').on("click", function () {
        $("html, body").animate({scrollTop: 0}, 600);
        return false;
    });



 $('.lobidrag').lobiPanel({
    // reload: {
    //     icon: 'fa fa-refresh'
    // },
    reload:false,
    changeStyle:false,
    sortable: true,
    editTitle: {
        icon: 'fa fa-pencil',
        icon2: 'fa fa-save'
    },
    unpin: {
        icon: 'fa fa-arrows'
    },
    minimize: {
        icon: 'fa fa-chevron-up',
        icon2: 'fa fa-chevron-down'
    },
    close: {
        icon: 'fa fa-times'
    },
    expand: {
        icon: 'fa fa-expand',
        icon2: 'fa fa-compress'
    }
});
    


    $('.lobidisable').lobiPanel({
        reload: false,
        close: false,
        editTitle: false,
        sortable: true,
        unpin: {
        icon: 'fa fa-arrows'
    },
    minimize: {
        icon: 'fa fa-chevron-up',
        icon2: 'fa fa-chevron-down'
    },
    // close: {
    //     icon: 'fa fa-times'
    // },
    expand: {
        icon: 'fa fa-expand',
        icon2: 'fa fa-compress'
    }
    });
    //search
    // $('a[href="#search"]').on('click', function(event) {
    //     event.preventDefault();
    //     $('#search').addClass('open');
    //     $('#search > form > input[type="search"]').focus();
    // });
    // $('#search, #search button.close').on('click keyup', function(event) {
    //     if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
    //         $(this).removeClass('open');
    //     }
    // });
    //Datepicker
   



})