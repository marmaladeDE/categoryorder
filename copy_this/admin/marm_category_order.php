<?php

/**
* Drag&Drop sorting in category
*
* Copyright (c) 2013 marmalade GmbH
* E-mail: mail@marmalade.de
* http://www.marmalade.de
*
* Permission is hereby granted, free of charge, to any person obtaining a copy
* of this software and associated documentation files (the "Software"), to
* deal in the Software without restriction, including without limitation the
* rights to use, copy, modify, merge, publish, distribute, sublicense, and/or
* sell copies of the Software, and to permit persons to whom the Software is
* furnished to do so, subject to the following conditions:
*
* The above copyright notice and this permission notice shall be included in
* all copies or substantial portions of the Software.
*
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
* IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
* FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
* AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
* LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
* FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
* IN THE SOFTWARE.
*/

/**
 * Controller for the admin view and the PopUp
 */
class marm_category_order extends oxAdminDetails
{
    public function render()
    {
        parent::render();

        $this->_aViewData['edit'] = $oCategory = oxNew( 'oxcategory' );

        // resetting
        oxSession::setVar( 'neworder_sess', null );

        $soxId = $this->getEditObjectId();

        if ( $soxId != "-1" && isset( $soxId)) {
            // load object
            $oCategory->load( $soxId );
            
            $oArticleList = oxnew( 'oxarticlelist' );
            $oArticleList->loadCategoryArticles( $soxId, array() );
            $this->_aViewData['oArticleList'] = $oArticleList;
            //Disable editing for derived items
            if ( $oCategory->isDerived() ) {
                $this->_aViewData['readonly'] = true;
            }
        }
        if ( oxConfig::getParameter("aoc") ) {
            return "marm_category_order_popup.tpl";
        }
        return "marm_category_order.tpl";
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
        //$success = 'false';
        
        $sortedList = oxConfig::getParameter("sortedList");
        $catId = oxConfig::getParameter("catId");
        
        $newsortedList = explode('&', str_replace('ID[]=', '', $sortedList));
        $result = count($newsortedList);
        
        //DB verbindung            
        $oDb = oxDb::getDb();
        
        for($i = 0; $i < $result; $i++)
        {
            //SQL erstellen
            $saveSortList = "update oxobject2category set oxpos = '".$i."' where oxobjectid = '".$newsortedList[$i]."' and oxcatnid = '".$catId."'";
            //SQL ausfuehren
            $oDb->execute( $saveSortList );
        }  
    }
    
    public function getSToken()
    {
        return $this->getSession()->getSessionChallengeToken();
    }
}