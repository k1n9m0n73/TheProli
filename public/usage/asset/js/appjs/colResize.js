var ResizeHandler = function () {
    /**
     * @var int panel_width Used by the collapser to know where to go
     *                      back to when uncollapsing the panel
     */
    this.panel_width = 0;
    /**
     * @var string left Used to provide support for RTL languages
     */
    this.left = $('html').attr('dir') == 'ltr' ? 'left' : 'right';
    /**
     * Adjusts the width of the navigation panel to the specified value
     *
     * @param int pos Navigation width in pixels
     *
     * @return void
     */
    this.setWidth = function (pos) {
        var $resizer = $('#pma_navigation_resizer');
        var resizer_width = $resizer.width();
        var $collapser = $('#pma_navigation_collapser');
        $('#pma_navigation').width(pos);
        $('body').css('margin-' + this.left, pos + 'px');
        $("#floating_menubar, #pma_console")
            .css('margin-' + this.left, (pos + resizer_width) + 'px');
        $resizer.css(this.left, pos + 'px');
        if (pos === 0) {
            $collapser
                .css(this.left, pos + resizer_width)
                .html(this.getSymbol(pos))
                .prop('title', PMA_messages.strShowPanel);
        } else {
            $collapser
                .css(this.left, pos)
                .html(this.getSymbol(pos))
                .prop('title', PMA_messages.strHidePanel);
        }
        setTimeout(function () {
            $(window).trigger('resize');
        }, 4);
    };
    /**
     * Returns the horizontal position of the mouse,
     * relative to the outer side of the navigation panel
     *
     * @param int pos Navigation width in pixels
     *
     * @return void
     */
    this.getPos = function (event) {
        var pos = event.pageX;
        var windowWidth = $(window).width();
        var windowScroll = $(window).scrollLeft();
        pos = pos - windowScroll;
        if (this.left != 'left') {
            pos = windowWidth - event.pageX;
        }
        if (pos < 0) {
            pos = 0;
        } else if (pos + 100 >= windowWidth) {
            pos = windowWidth - 100;
        } else {
            this.panel_width = 0;
        }
        return pos;
    };
    /**
     * Returns the HTML code for the arrow symbol used in the collapser
     *
     * @param int width The width of the panel
     *
     * @return string
     */
    this.getSymbol = function (width) {
        if (this.left == 'left') {
            if (width === 0) {
                return '&rarr;';
            } else {
                return '&larr;';
            }
        } else {
            if (width === 0) {
                return '&larr;';
            } else {
                return '&rarr;';
            }
        }
    };
    /**
     * Event handler for initiating a resize of the panel
     *
     * @param object e Event data (contains a reference to resizeHandler)
     *
     * @return void
     */
    this.mousedown = function (event) {
        event.preventDefault();
        $(document)
            .bind('mousemove', {'resize_handler': event.data.resize_handler},
                $.throttle(event.data.resize_handler.mousemove, 4))
            .bind('mouseup', {'resize_handler': event.data.resize_handler},
                event.data.resize_handler.mouseup);
        $('body').css('cursor', 'col-resize');
    };
    /**
     * Event handler for terminating a resize of the panel
     *
     * @param object e Event data (contains a reference to resizeHandler)
     *
     * @return void
     */
    this.mouseup = function (event) {
        $('body').css('cursor', '');
        $.cookie('pma_navi_width', event.data.resize_handler.getPos(event));
        $('#topmenu').menuResizer('resize');
        $(document)
            .unbind('mousemove')
            .unbind('mouseup');
    };
    /**
     * Event handler for updating the panel during a resize operation
     *
     * @param object e Event data (contains a reference to resizeHandler)
     *
     * @return void
     */
    this.mousemove = function (event) {
        event.preventDefault();
        var pos = event.data.resize_handler.getPos(event);
        event.data.resize_handler.setWidth(pos);
        if ($('.sticky_columns').length !== 0) {
            handleAllStickyColumns();
        }
    };
    /**
     * Event handler for collapsing the panel
     *
     * @param object e Event data (contains a reference to resizeHandler)
     *
     * @return void
     */
    this.collapse = function (event) {
        event.preventDefault();
        var panel_width = event.data.resize_handler.panel_width;
        var width = $('#pma_navigation').width();
        if (width === 0 && panel_width === 0) {
            panel_width = 240;
        }
        event.data.resize_handler.setWidth(panel_width);
        event.data.resize_handler.panel_width = width;
    }
}