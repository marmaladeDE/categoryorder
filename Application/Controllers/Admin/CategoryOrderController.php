<?php
namespace Marmalade\CategoryOrder\Application\Controllers\Admin;


use OxidEsales\Eshop\Application\Controller\Admin\AdminController;
use OxidEsales\Eshop\Application\Model\ArticleList;
use OxidEsales\Eshop\Application\Model\Category;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Exception\DatabaseException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;

class CategoryOrderController extends AdminController
{
    /**
     * @inheritdoc
     * @throws \OxidEsales\Eshop\Core\Exception\SystemComponentException
     */
    public function render()
    {
        parent::render();

        /** @var Category $oCategory */
        $this->_aViewData['edit'] = $oCategory = oxNew( Category::class );

        // resetting
        Registry::getSession()->setVariable( 'neworder_sess', null );

        $soxId = $this->getEditObjectId();

        if ( $soxId != "-1" && isset( $soxId)) {
            // load object
            $oCategory->load( $soxId );

            /** @var ArticleList $oArticleList */
            $oArticleList = oxNew( ArticleList::class );
            $oArticleList->loadCategoryArticles( $soxId, array() );
            $this->_aViewData['oArticleList'] = $oArticleList;
            //Disable editing for derived items
            if ( $oCategory->isDerived() ) {
                $this->_aViewData['readonly'] = true;
            }
        }

        /** @var Request $request */
        $request = Registry::get(Request::class);
        if ( $request->getRequestParameter("aoc") ) {
            return "marm/categoryorder/categoryorder_popup.tpl";
        }

        return "marm/categoryorder/categoryorder.tpl";
    }


    /**
     * Function to sort the List to the Database.
     * You'll get allways the full list, so first remove everything,
     * then write the full new list.
     *
     * return string $success true|false
     */
    public function marm_ajax_sort()
    {
        /** @var Request $request */
        $request = Registry::get(Request::class);

        $success = '';

        $sortedList = $request->getRequestParameter("sortedList");
        $catId = $request->getRequestParameter("catId");

        $newsortedList = explode('&', str_replace('ID[]=', '', $sortedList));
        $result = count($newsortedList);

        //DB Verbindung
        $oDb = DatabaseProvider::getDb();

        for($i = 0; $i < $result; $i++)
        {
            try {
                //SQL erstellen
                $saveSortList = "update oxobject2category set oxpos = '".$i."' where oxobjectid = '".$newsortedList[$i]."' and oxcatnid = '".$catId."'";
                //SQL ausfuehren
                $oDb->execute( $saveSortList );

                $success = true;
            } catch (DatabaseException $e) {
                $success .= "<br>Fehler: " . $e->getMessage() . ".";
                break;
            }
        }

        exit($success);
    }

    /**
     * @return string
     */
    public function getSToken()
    {
        return $this->getSession()->getSessionChallengeToken();
    }
}