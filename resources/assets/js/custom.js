(function($) {
    bsCustomFileInput.init();
    var table = $('#data_table').DataTable({
        'aoColumnDefs': [{
            'bSortable': false,
            'aTargets': ['nosort']
        }],
        "scrollX": true
    });
    $(window).bind('contextmenu', false);
})(jQuery);
