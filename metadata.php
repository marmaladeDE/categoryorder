<?php

/**
 * Metadata version
 */
$sMetadataVersion = '1.1';
 
/**
 * Module information
 */
$aModule = array(
    'id'           => 'marm/categoryorder',
    'title'        => 'marmalade :: Drag&Drop Artikelsortierung',
    'description'  => array(
        'de'            => 'Sortieren Sie die Artikel einer Kategorie per Drag & Drop.',
        'en'            => 'Sort the products of a category in backend via drag & drop.',
    ),
    'thumbnail'    => 'marmalade.jpg',
    'version'      => '1.0.1',
    'author'       => 'Konstantin Kuznetsov',
    'url'          => 'http://www.marmalade.de',
    'email'        => 'support@marmalade.de',
    'extend'       => array(),
    'files'        => array(
        'marm_category_order' => 'marm/categoryorder/controllers/admin/marm_category_order.php',
    ),
    'templates'    => array(
        'marm_category_order.tpl'       => 'marm/categoryorder/views/tpl/marm_category_order.tpl',
        'marm_category_order_popup.tpl' => 'marm/categoryorder/views/tpl/popups/marm_category_order_popup.tpl',
        'marm_headitem.tpl'             => 'marm/categoryorder/views/tpl/popups/marm_headitem.tpl',
    ),
);