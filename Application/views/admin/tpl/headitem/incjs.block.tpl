[{$smarty.block.parent}]

[{if $oViewConf->getTopActiveClassName() == 'marm_category_order'}]
    <script type="text/javascript" src="[{$oViewConf->getModuleUrl('marm/categoryorder', 'out/src/js/jquery-1.10.2.js')}]"></script>
    <script type="text/javascript" src="[{$oViewConf->getModuleUrl('marm/categoryorder', 'out/src/js/jquery-ui-1.10.4.min.js')}]"></script>
    <script type="text/javascript" src="[{$oViewConf->getModuleUrl('marm/categoryorder', 'out/src/js/script.js')}]"></script>
[{/if}]