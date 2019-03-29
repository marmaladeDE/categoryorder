[{$smarty.block.parent}]

[{if $oViewConf->getTopActiveClassName() == 'marm_category_order'}]
    <link rel="stylesheet" href="[{$oViewConf->getModuleUrl('marm/categoryorder', 'out/src/css/jquery-ui-1.10.4.min.css')}]">
    <link rel="stylesheet" href="[{$oViewConf->getModuleUrl('marm/categoryorder', 'out/src/css/style.css')}]">
[{/if}]