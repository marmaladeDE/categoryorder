[{include file="marm_headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

<div class="sortable_title">Artikel sortieren per Drag & Drop</div>
<div class="sortable_info">Verschieben Sie die Elemente in der Liste um eine neue Reihenfolge festzulegen.<br />Die neue Reihenfolge wird automatisch gespeichert.</div>
<div id="success"></div>
<div class="sortable_list_header">
    <span class="list_header_1">Art.Nr</span>
    <span class="list_header_2">Titel</span>
    <span class="list_header_3">Position</span>
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

</body>
</html>
