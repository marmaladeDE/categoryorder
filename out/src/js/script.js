jQuery(document).ready(function($){
    var url = marm_categoryorder_config.url,
        stoken = marm_categoryorder_config.stoken,
        catId = marm_categoryorder_config.catId;

    $( "#sortable" ).sortable();
    $( "#sortable" ).on( "sortstop", function( event, ui ) {
        $.each( $(".marm_counter"), function(index, counterDiv)
        {
            $(counterDiv).html( index + 1 );
        });
        $.ajax({
            type: "POST",
            url: url,
            data: {
                cl: "marm_category_order",
                fnc: "marm_ajax_sort",
                stoken: stoken,
                sortedList: $('#sortable').sortable("serialize"),
                catId: catId
            }
        }).done(function( success ){
            if ( success != true ){
                $("#success").html( success );
            }
        });
    });
});