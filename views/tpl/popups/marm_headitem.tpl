<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    
    <title>[{ $title }]</title>
    <meta http-equiv="Content-Type" content="text/html; charset=[{$charset}]">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
    
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script>
        $(document).ready(function(){
            $( "#sortable" ).sortable();
            $( "#sortable" ).on( "sortstop", function( event, ui ) {
                $.each( $(".marm_counter"), function(index, counterDiv)
                {
                    $(counterDiv).html( index + 1 );
                });
                $.ajax({
                        type: "GET",
                        url: "[{$oViewConf->getSelfLink()}]",
                        data: {
                            cl: "marm_category_order",
                            fnc: "marm_ajax_sort",
                            stoken: "[{$oView->getSToken()}]",
                            sortedList: $('#sortable').sortable("serialize"),
                            catId: "[{$edit->oxcategories__oxid->value}]"
                        }
                }).done(function( success ){
                        if ( success != true ){
                            $("#success").html( success );
                        }
                  });
            });
        });
    </script>
    
    <style>
        body { padding: 0 15px; background-color:#e7eaed; font-family: arial; font-size: 13px; }
        #sortable { list-style-type: none; margin: 0; padding: 0; width: 70%; line-height: 18px; }
        #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; min-height: 18px; background: #FFFFFF; cursor: default; }
        #sortable li:last-child { margin-bottom: 30px !important; }
        #sortable li > span { position: absolute; margin-left: -1.3em; }
        .sortable_title { font-weight: bold; margin: 20px 5px 10px; }
        .order_item_artnum { margin: 0 0 0 -5px !important; display: inline; float: left; padding: 0 8px 0 8px; min-height: 22px; min-width: 70px; }
        .order_item_title { display: inline; }
        .marm_counter { float: right; padding-left: 16px; }
        .sortable_info { padding-left: 5px; }
        .sortable_list_header { width: 70%; padding: 15px 0 3px 5px; }
        .list_header_1 { margin-left: 23px; }
        .list_header_2 { margin-left: 175px; }
        .list_header_3 { float: right; padding-right: 13px; }
        #success { color: red; margin-left: 5px; }
    </style>

</head>
<body>
