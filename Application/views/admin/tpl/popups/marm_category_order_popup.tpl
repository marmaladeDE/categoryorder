[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

<div class="sortable_title">[{oxmultilang ident="MARM_CATEGORYORDER_POPUP_HEADLINE"}]</div>
<div class="sortable_info">[{oxmultilang ident="MARM_CATEGORYORDER_POPUP_INFO"}]</div>
<div id="success"></div>
<div class="sortable_list_header">
    <span class="list_header_1">[{oxmultilang ident="MARM_CATEGORYORDER_POPUP_LIST_ARTNR"}]</span>
    <span class="list_header_2">[{oxmultilang ident="MARM_CATEGORYORDER_POPUP_LIST_TITLE"}]</span>
    <span class="list_header_3">[{oxmultilang ident="MARM_CATEGORYORDER_POPUP_LIST_POS"}]</span>
</div>

<ul id="sortable">
[{assign var=ArticleCounter value=1}]
[{foreach from=$oArticleList item=oArticle }]
    <li id="ID_[{$oArticle->oxarticles__oxid->value}]" class="ui-state-default">
        <span class="ui-icon ui-icon-arrowthick-2-n-s">
        </span>
        <div>
            <div class="marm_counter">[{$ArticleCounter}]</div>
            <div class="order_item_artnum">[{$oArticle->oxarticles__oxartnum->value}]</div>
            <div class="order_item_title">[{$oArticle->oxarticles__oxtitle->value}]</div>
        </div>
    </li>
[{ assign var=ArticleCounter value=$ArticleCounter+1}]    
[{/foreach}]
</ul>

<script>
    var marm_categoryorder_config = {
        url: "[{$oViewConf->getSelfLink()}]",
        stoken: "[{$oView->getSToken()}]",
        catId: "[{$edit->oxcategories__oxid->value}]"
    };
</script>

</div>
</body>
</html>
