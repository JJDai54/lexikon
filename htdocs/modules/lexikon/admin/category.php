<?php
/**
 *
 * Module: Lexikon - glossary module
 * Version: v 1.00
 * Release Date: 8 May 2004
 * Author: hsalazar
 * Licence: GNU
 */

// -- General Stuff -- //
require_once __DIR__ . '/admin_header.php';
$myts = MyTextSanitizer::getInstance();
xoops_cp_header();
xoops_load('XoopsUserUtility');
$adminObject  = \Xmf\Module\Admin::getInstance();
$adminObject->displayNavigation(basename(__FILE__));
$adminObject->addItemButton(_AM_LEXIKON_CREATECAT, 'category.php?op=addcat', 'add');
$adminObject->displayButton('left');
$op = '';

/* -- Available operations -- */

function categoryDefault()
{
    $op = 'default';
    include_once XOOPS_ROOT_PATH . '/class/xoopslists.php';
    include_once XOOPS_ROOT_PATH . '/class/pagenav.php';

    $startentry = isset($_GET['startentry']) ? (int)$_GET['startentry'] : 0;
    $startcat   = isset($_GET['startcat']) ? (int)$_GET['startcat'] : 0;
    $startsub   = isset($_GET['startsub']) ? (int)$_GET['startsub'] : 0;
    $datesub    = isset($_GET['datesub']) ? (int)$_GET['datesub'] : 0;

    global $xoopsUser, $xoopsConfig, $xoopsDB, $xoopsModuleConfig, $xoopsModule, $entryID, $pathIcon16;

    $myts = MyTextSanitizer::getInstance();
    //    lx_adminMenu(1, _AM_LEXIKON_CATS);
    $result01 = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('lxcategories') . ' ');
    list($totalcategories) = $xoopsDB->fetchRow($result01);

    $result02 = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('lxentries') . ' WHERE submit = 0');
    list($totalpublished) = $xoopsDB->fetchRow($result02);

    $result03 = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('lxentries') . " WHERE submit = '1' AND request = '0' ");
    list($totalsubmitted) = $xoopsDB->fetchRow($result03);

    $result04 = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('lxentries') . " WHERE submit = '1' AND request = '1' ");
    list($totalrequested) = $xoopsDB->fetchRow($result04);

    //    echo "<table width='100%' class='outer' style=\"margin-top: 6px; clear:both;\" cellspacing='2' cellpadding='3' border='0' ><tr>";
    //    echo "<td class='odd'>" . _AM_LEXIKON_TOTALENTRIES . "</td><td align='center' class='even'>" . $totalpublished . "</td>";
    //    if ($xoopsModuleConfig['multicats'] == 1) {
    //        echo "<td class='odd'>" . _AM_LEXIKON_TOTALCATS . "</td><td align='center' class='even'>" . $totalcategories . "</td>";
    //    }
    //    echo "<td class='odd'>" . _AM_LEXIKON_TOTALSUBM . "</td><td align='center' class='even'>" . $totalsubmitted . "</td>
    //    <td class='odd'>" . _AM_LEXIKON_TOTALREQ . "</td><td align='center' class='even'>" . $totalrequested . "</td>
    //    </tr></table>
    //    <br><br>";

    if ($xoopsModuleConfig['multicats'] == 1) {
        /**
         * Code to show existing categories
         **/

        echo " <table class='outer' width='100%' border='0'>
        <tr>
        <td colspan='7' class='odd'>
        <strong>" . _AM_LEXIKON_SHOWCATS . ' (' . $totalcategories . ')' . '</strong></td></tr>';
        echo '<tr>';
        // create existing columns table //doppio
        $resultC1 = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('lxcategories') . ' ');
        list($numrows) = $xoopsDB->fetchRow($resultC1);
        $sql      = 'SELECT * FROM ' . $xoopsDB->prefix('lxcategories') . ' ORDER BY weight';
        $resultC2 = $xoopsDB->query($sql, $xoopsModuleConfig['perpage'], $startcat);

        echo "<th width='40'  align='center'><b>" . _AM_LEXIKON_ID . "</b></td>
        <th  align='center'><b>" . _AM_LEXIKON_WEIGHT . "</b></td>
        <th width='30%'  align='center'><b>" . _AM_LEXIKON_CATNAME . "</b></td>
        <th width='10'  align='center'><b>" . _AM_LEXIKON_ENTRIES . "</b></td>
        <th width='*'  align='center'><b>" . _AM_LEXIKON_DESCRIP . "</b></td>
        <th width='60'  align='center'><b>" . _AM_LEXIKON_ACTION . '</b></td>
        </tr>';

        $class = 'odd';
        if ($numrows > 0) { // That is, if there ARE columns in the system
            while (list($categoryID, $name, $description, $total, $weight, $logourl) = $xoopsDB->fetchrow($resultC2)) {
                //while ( list( $categoryID, $name, $description, $total, $weight, ) = $xoopsDB -> fetchrow( $resultC2 ) ) {
                $name = $myts->htmlSpecialChars($name);
                //                $description = $myts -> htmlSpecialChars(xoops_substr( strip_tags( $description ),0,60));
                $description = strip_tags(htmlspecialchars_decode($description));
                $modify      = "<a href='category.php?op=mod&categoryID=" . $categoryID . "'><img src=" . $pathIcon16 . "/edit.png width='16' height='16' ALT='" . _AM_LEXIKON_EDITCAT . "'></a>";
                $delete      = "<a href='category.php?op=del&categoryID=" . $categoryID . "'><img src=" . $pathIcon16 . "/delete.png  width='16' height='16' ALT='" . _AM_LEXIKON_DELETECAT . "'></a>";

                echo "<tr class='" . $class . "'>";
                $class = ($class === 'even') ? 'odd' : 'even';

                echo "
                <td  align='center'>" . $categoryID . "</td>
                <td  width='10' align='center'>" . $weight . "</td>
                <td  align='left'><a href='../category.php?categoryID=" . $categoryID . "'>" . $name . "</td>
                <td  align='left'>" . $total . "</td>
                <td  align='left'>" . $description . "</td>
                <td  align='center'> $modify $delete </td>
                </tr></div>";
            }
        } else { // that is, $numrows = 0, there's no columns yet
            echo '<tr>';
            echo "<td class='odd' align='center' colspan= '7'>" . _AM_LEXIKON_NOCATS . '</td>';
            echo '</tr></DIV>';
            $categoryID = '0';
        }
        echo "</table>\n";
        $pagenav = new XoopsPageNav($numrows, $xoopsModuleConfig['perpage'], $startcat, 'startcat');
        echo '<div style="text-align:right;">' . $pagenav->renderNav(8) . '</div>';
        echo "<br><br>\n";
        echo '</div>';
    } else {
        redirect_header('index.php', 1, sprintf(_AM_LEXIKON_SINGLECAT, ''));
    }
}

/**
 * Code to edit categories
 * @param string $categoryID
 */
function categoryEdit($categoryID = '')
{
    include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
    include_once XOOPS_ROOT_PATH . '/class/uploader.php';
    include_once XOOPS_ROOT_PATH . '/class/xoopsform/grouppermform.php';

    $weight      = 1;
    $name        = '';
    $description = '';
    $logourl     = '';

    global $xoopsUser, $xoopsConfig, $xoopsDB, $xoopsModuleConfig, $xoopsModule;

    // If there is a parameter, and the id exists, retrieve data: we're editing a column
    if ($categoryID) {
        $result = $xoopsDB->query('
                                     SELECT categoryID, name, description, total, weight,logourl
                                     FROM ' . $xoopsDB->prefix('lxcategories') . "
                                     WHERE categoryID = '$categoryID'");

        list($categoryID, $name, $description, $total, $weight, $logourl) = $xoopsDB->fetchrow($result);
        $myts = MyTextSanitizer::getInstance();
        $name = $myts->htmlSpecialChars($name);
        //permissions
        $memberHandler = xoops_getHandler('member');
        $group_list    = $memberHandler->getGroupList();
        $gpermHandler  = xoops_getHandler('groupperm');

        $groups = $gpermHandler->getGroupIds('lexikon_view', $categoryID, $xoopsModule->getVar('mid'));
        //        $groups = $groups;
        if ($xoopsDB->getRowsNum($result) == 0) {
            redirect_header('index.php', 1, _AM_LEXIKON_NOCATTOEDIT);
        }
        if ($xoopsDB->getRowsNum($result) == 0) {
            redirect_header('index.php', 1, _AM_LEXIKON_NOCATTOEDIT);
        }
        //$myts = MyTextSanitizer::getInstance();
        //        lx_adminMenu(1, _AM_LEXIKON_CATS);

        echo "<h3 style=\"color: #2F5376; margin-top: 6px; \">" . _AM_LEXIKON_CATSHEADER . '</h3>';
        $sform = new XoopsThemeForm(_AM_LEXIKON_MODCAT . ": $name", 'op', xoops_getenv('PHP_SELF'));
    } else {
        //$myts = MyTextSanitizer::getInstance();
        //        lx_adminMenu(1, _AM_LEXIKON_CATS);
        $groups = true;
        echo "<h3 style=\"color: #2F5376; margin-top: 6px; \">" . _AM_LEXIKON_CATSHEADER . '</h3>';
        $sform = new XoopsThemeForm(_AM_LEXIKON_NEWCAT, 'op', xoops_getenv('PHP_SELF'));
    }

    $sform->setExtra('enctype="multipart/form-data"');
    $sform->addElement(new XoopsFormText(_AM_LEXIKON_CATNAME, 'name', 50, 80, $name), true);

    $editor = LexikonUtility::getWysiwygForm(_AM_LEXIKON_CATDESCRIPT, 'description', $description, 7, 60);
    $sform->addElement($editor, true);
    unset($editor);

    $sform->addElement(new XoopsFormText(_AM_LEXIKON_CATPOSIT, 'weight', 4, 4, $weight), true);
    $sform->addElement(new XoopsFormHidden('categoryID', $categoryID));
    //CategoryImage
    if ($xoopsModuleConfig['useshots'] == 1) {
        //CategoryImage :: Common querys from Article module by phppp
        $image_option_tray = new XoopsFormElementTray('<b>' . _AM_LEXIKON_CATIMGUPLOAD . '</b>', '<br>');
        $image_option_tray->addElement(new XoopsFormFile('', 'userfile', ''));
        $sform->addElement($image_option_tray);
        unset($image_tray);
        unset($image_option_tray);

        $path_catimg       = "uploads/".$xoopsModule->getVar('dirname')."/categories/images";
        $image_option_tray = new XoopsFormElementTray(_AM_LEXIKON_CATIMAGE . '<br>' . _AM_LEXIKON_CATIMG_DSC . '<br>' . $path_catimg, '<br>');
        //$image_option_tray = new XoopsFormElementTray(_AM_LEXIKON_CATIMAGE.'');
        $image_array = XoopsLists::getImgListAsArray(XOOPS_ROOT_PATH . '/' . $path_catimg . '/');
        array_unshift($image_array, _NONE);

        $image_select = new XoopsFormSelect('', 'logourl', $logourl);
        $image_select->addOptionArray($image_array);
        $image_select->setExtra("onchange=\"showImgSelected('img', 'logourl', '/" . $path_catimg . "/', '', '" . XOOPS_URL . "')\"");
        $image_tray = new XoopsFormElementTray('', '&nbsp;');
        $image_tray->addElement($image_select);
        if (!empty($logourl) && file_exists(XOOPS_ROOT_PATH . '/' . $path_catimg . '/' . $logourl)) {
            $image_tray->addElement(new XoopsFormLabel('',
                                                       "<div style=\"padding: 4px;\"><img src=\"" . XOOPS_URL . '/' . $path_catimg . '/' . $logourl . "\" name=\"img\" id=\"img\" alt=\"\" /></div>"));
        } else {
            $image_tray->addElement(new XoopsFormLabel('', "<div style=\"padding: 4px;\"><img src=\"" . XOOPS_URL . '/' . $path_catimg . "/blank.gif\" name=\"img\" id=\"img\" alt=\"\" /></div>"));
        }
        $image_option_tray->addElement($image_tray);
        $sform->addElement($image_option_tray);
    }
    $sform->addElement(new XoopsFormSelectGroup(_AM_LEXIKON_CAT_GROUPSVIEW, 'groups', true, $groups, 5, true));

    $button_tray = new XoopsFormElementTray('', '');
    $hidden      = new XoopsFormHidden('op', 'addcategory');
    $button_tray->addElement($hidden);

    // No ID for column -- then it's new column, button says 'Create'
    if (!$categoryID) {
        $butt_create = new XoopsFormButton('', '', _AM_LEXIKON_CREATE, 'submit');
        $butt_create->setExtra('onclick="this.form.elements.op.value=\'addcategory\'"');
        $button_tray->addElement($butt_create);

        $butt_clear = new XoopsFormButton('', '', _AM_LEXIKON_CLEAR, 'reset');
        $button_tray->addElement($butt_clear);

        $butt_cancel = new XoopsFormButton('', '', _AM_LEXIKON_CANCEL, 'button');
        $butt_cancel->setExtra('onclick="history.go(-1)"');
        $button_tray->addElement($butt_cancel);
    } else { // button says 'Update'
        $butt_create = new XoopsFormButton('', '', _AM_LEXIKON_MODIFY, 'submit');
        $butt_create->setExtra('onclick="this.form.elements.op.value=\'addcategory\'"');
        $button_tray->addElement($butt_create);

        $butt_cancel = new XoopsFormButton('', '', _AM_LEXIKON_CANCEL, 'button');
        $butt_cancel->setExtra('onclick="history.go(-1)"');
        $button_tray->addElement($butt_cancel);
    }

    $sform->addElement($button_tray);
    $sform->display();
    unset($hidden);
    //  xoops_cp_footer();
    //  break;
}

/**
 * Code to delete existing categories
 * @param string $categoryID
 */
function categoryDelete($categoryID = '')
{
    //global $xoopsDB, $xoopsConfig;
    global $xoopsConfig, $xoopsDB, $xoopsModule;
    $idc = isset($_POST['categoryID']) ? (int)$_POST['categoryID'] : (int)$_GET['categoryID'];
    if ($idc == '') {
        $idc = $_GET['categoryID'];
    }
    if ($idc <= 0) {
        header('location: category.php');
        die();
    }

    $ok     = isset($_POST['ok']) ? (int)$_POST['ok'] : 0;
    $result = $xoopsDB->query('SELECT categoryID, name FROM ' . $xoopsDB->prefix('lxcategories') . " WHERE categoryID = $idc");
    list($categoryID, $name) = $xoopsDB->fetchrow($result);
    // confirmed, so delete
    if ($ok == 1) {
        //get all entries in the category
        $result3 = $xoopsDB->query('SELECT entryID from ' . $xoopsDB->prefix('lxentries') . " where categoryID = $idc");
        //now for each entry, delete the coments
        while (list($entryID) = $xoopsDB->fetchRow($result3)) {
            xoops_comment_delete($xoopsModule->getVar('mid'), $entryID);
            xoops_notification_deletebyitem($xoopsModule->getVar('mid'), 'term', $entryID);
        }
        $xoopsDB->query('DELETE FROM ' . $xoopsDB->prefix('lxcategories') . " WHERE categoryID='$idc'");
        $result2 = $xoopsDB->query('DELETE FROM ' . $xoopsDB->prefix('lxentries') . " WHERE categoryID = $idc");
        // remove permissions
        xoops_groupperm_deletebymoditem($xoopsModule->getVar('mid'), 'lexikon_view', $categoryID);
        xoops_groupperm_deletebymoditem($xoopsModule->getVar('mid'), 'lexikon_submit', $categoryID);
        xoops_groupperm_deletebymoditem($xoopsModule->getVar('mid'), 'lexikon_approve', $categoryID);
        xoops_groupperm_deletebymoditem($xoopsModule->getVar('mid'), 'lexikon_request', $categoryID);
        // delete notifications
        xoops_notification_deletebyitem($xoopsModule->getVar('mid'), 'global', $categoryID);
        xoops_notification_deletebyitem($xoopsModule->getVar('mid'), 'category', $categoryID);

        redirect_header('category.php', 1, sprintf(_AM_LEXIKON_CATISDELETED, $name));
    } else {
        //xoops_cp_header();
        xoops_confirm(array('op' => 'del', 'categoryID' => $categoryID, 'ok' => 1, 'name' => $name), 'category.php', _AM_LEXIKON_DELETETHISCAT . '<br><br>' . $name, _AM_LEXIKON_DELETE);
    }
}

/**
 * @param string $categoryID
 */
function categorySave($categoryID = '')
{
    include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
    include_once XOOPS_ROOT_PATH . '/class/uploader.php';
    global $xoopsUser, $xoopsConfig, $xoopsModuleConfig, $xoopsModule, $xoopsDB, $myts, $categoryID;
    //print_r ($_POST);
    $categoryID  = isset($_POST['categoryID']) ? (int)$_POST['categoryID'] : (int)$_GET['categoryID'];
    $weight      = isset($_POST['weight']) ? (int)$_POST['weight'] : (int)$_GET['weight'];
    $name        = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : htmlspecialchars($_GET['name']);
    $description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : htmlspecialchars($_GET['description']);
    $description  = htmlspecialchars($description, ENT_QUOTES);
                        
    //$description = $myts->xoopsCodeDecode($description, $allowimage = 0);
    $description = $myts->xoopsCodeDecode($myts->censorString($description), $allowimage = 1);
    $name        = $myts->addSlashes($_POST['name']);
    $logourl     = $myts->addSlashes($_POST['logourl']);
    $groups      = isset($_POST['groups']) ? $_POST['groups'] : array();
    // image upload
    $logourl       = '';
    $maxfilesize = $xoopsModuleConfig['imguploadsize'];
    $maxfilewidth  = $xoopsModuleConfig['imguploadwd'];
    $maxfileheight = $xoopsModuleConfig['imguploadwd'];
    if (!empty($_FILES['userfile']['name'])) {
        $allowed_mimetypes = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/x-png', 'image/png');
        $uploader          = new XoopsMediaUploader(XOOPS_ROOT_PATH ."/uploads/".$xoopsModule->getVar('dirname')."/categories/images/", $allowed_mimetypes, $maxfilesize, $maxfilewidth, $maxfileheight);

        if ($uploader->fetchMedia($_POST['xoops_upload_file'][0])) {
            if (!$uploader->upload()) {
                echo $uploader->getErrors();
            } else {
                echo '<h4>' . _AM_LEXIKON_FILESUCCESS . '</h4>';
                $logourl = $uploader->getSavedFileName();
            }
        } else {
            echo $uploader->getErrors();
        }
    }
    $logourl = empty($logourl) ? (empty($_POST['logourl']) ? '' : $_POST['logourl']) : $logourl;

    // Run the query and update the data
    if (!$_POST['categoryID']) {
        if ($xoopsDB->query('INSERT INTO ' . $xoopsDB->prefix('lxcategories') . " (categoryID, name, description, weight, logourl)
                                 VALUES (0, '$name', '$description', '$weight', '$logourl')")
        ) {
            $newid = $xoopsDB->getInsertId();
            // Increment author's posts count (only if it's a new definition)
            if (is_object($xoopsUser) && empty($categoryID)) {
                $memberHandler = xoops_getHandler('member');
                $uid = $xoopsUser->getVar('uid');
                            
                $submitter     = $memberHandler->getUser($uid);
                if (is_object($submitter)) {
                    $submitter->setVar('posts', $submitter->getVar('posts') + 1);
                    $res = $memberHandler->insertUser($submitter, true);
                    unset($submitter);
                }
            }
            //notification
            if (!empty($xoopsModuleConfig['notification_enabled'])) {
                if ($newid == 0) {
                    $newid = $xoopsDB->getInsertId();
                }
                global $xoopsModule;
                $notificationHandler = xoops_getHandler('notification');
                $tags                = array();
                $tags['ITEM_NAME']   = $name;
                $tags['ITEM_URL']    = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/category.php?categoryID=' . $newid;
                $notificationHandler->triggerEvent('global', 0, 'new_category', $tags);
            }
            lx_save_Permissions($groups, $categoryID, 'lexikon_view');
            redirect_header('category.php', 1, _AM_LEXIKON_CATCREATED);
        } else {
            redirect_header('index.php', 1, _AM_LEXIKON_NOTUPDATED);
        }
    } else {
        if ($xoopsDB->queryF('
                                UPDATE ' . $xoopsDB->prefix('lxcategories') . "
                                SET name = '$name', description = '$description', weight = '$weight' , logourl = '$logourl'
                                WHERE categoryID = '$categoryID'")
        ) {
            //exit;
            lx_save_Permissions($groups, $categoryID, 'lexikon_view');
            redirect_header('category.php', 1, _AM_LEXIKON_CATMODIFIED);
        } else {
            //exit;
            redirect_header('index.php', 1, _AM_LEXIKON_NOTUPDATED);
        }
    }
}
/*
Un anglicisme est un emprunt fait ? la langue anglaise par une autre langue. L'anglicisme na?t soit de l'adoption d'un mot anglais par suite d'un d?faut de traduction, m?me si un terme ?quivalent existe dans la langue du locuteur, soit d'une mauvaise traduction, comme le mot-?-mot.
*/
/**
 * Available operations
 **/

$op = 'default';
if (isset($_POST['op'])) {
    $op = $_POST['op'];
} else {
    if (isset($_GET['op'])) {
        $op = $_GET['op'];
    }
}

switch ($op) {
    case 'mod':
        $categoryID = isset($_POST['categoryID']) ? (int)$_POST['categoryID'] : (int)$_GET['categoryID'];
        categoryEdit($categoryID);
        break;

    case 'addcat':
        categoryEdit();
        break;

    case 'addcategory':
        categorySave();
        break;

    case 'del':
        categoryDelete();
        break;

    case 'default':
    default:
        categoryDefault();
        break;
}
xoops_cp_footer();
