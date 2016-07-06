var winOrigin = window.location.origin;
var winPath = window.location.pathname.split('/');
var newPathname = winOrigin + "/" + winPath[1] + "/";

(function($) {

	'use strict';
	
	/*
	Navigation - Left Menu
	*/
    var group_item = $('li.list-group-item');
	var origin = window.location.origin;
	var pathname = window.location.pathname;
	var lochref = origin+pathname;
	
    group_item.each(function() {
        var href = $(this).parent('a').attr('href');
		
        if (href === lochref) {
			var panel_default = $(this).closest("div.panel-default");
			var panel_heading = panel_default.find("div.panel-heading");
			
			$(this).addClass('active');
			panel_heading.addClass('active');
        }
    });
	
	/*
	Flot: Bars
	*/
	if (document.getElementById("page_member_chart") != null) {
		(function() {
			var plot = $.plot('#flotBars', [flotBarsData], {
				colors: ['#8CC9E8'],
				series: {
					bars: {
						show: true,
						barWidth: 0.8,
						align: 'center'
					}
				},
				xaxis: {
					mode: 'categories',
					tickLength: 0
				},
				grid: {
					hoverable: true,
					clickable: true,
					borderColor: 'rgba(0,0,0,0.1)',
					borderWidth: 1,
					labelMargin: 15,
					backgroundColor: 'transparent'
				},
				tooltip: true,
				tooltipOpts: {
					content: '%y',
					shifts: {
						x: -10,
						y: 20
					},
					defaultTheme: false
				}
			});
		})();
	}
    
    // TinyMCE
    tinymce.init({
        mode: "specific_textareas",
        editor_selector: "mceEditor",
        forced_root_block: false,
        content_style: ".mce-content-body  {font-size: 14px; font-family: 'Open Sans', sans-serif;}",
        height: 250,
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks",
            "insertdatetime table contextmenu paste"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });

}).apply(this, [jQuery]);

function goBack() {
    window.history.back();
}