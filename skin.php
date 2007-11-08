<?php if (!defined('PmWiki')) exit();
/*
 * PmWiki Blix skin
 * Version 1.0.0  (7-Nov-07)
 * @requires PmWiki 2.2
 *
 * Examples at: http://pmwiki.com/Cookbook/Blix and http://skins.solidgone.com/
 * Copyright (c) 2007 David Gilbert
 * Dual licensed under the MIT and GPL licenses:
 *    http://www.opensource.org/licenses/mit-license.php
 *    http://www.gnu.org/licenses/gpl.html
 */
global $FmtPV;
$FmtPV['$SkinName'] = '"Blix"';
$FmtPV['$SkinVersion'] = '"1.0.0"';

## Default color scheme
global $SkinColor;
if (isset($_GET['color'])) {
	$SkinColor = $_GET['color'];
} else {
	SDV($SkinColor, 'spring');
}

global $TitleBg, $SkinDirUrl;
SDV($TitleBg,($SkinColor=='autumn' ? 'gradient_gold.png' : 'header_bg.jpg') );
$FmtPV['$TitleBg'] = '"' . $SkinDirUrl . '/images/backgrounds/' . $TitleBg . '"';

## Add a custom page storage location
global $PageStorePath, $WikiLibDirs;
$PageStorePath = dirname(__FILE__)."/wikilib.d/{\$FullName}";
$where = count($WikiLibDirs);
if ($where>1) $where--;
array_splice($WikiLibDirs, $where, 0, array(new PageStore($PageStorePath)));

## Override pmwiki styles otherwise they will override styles declared in css
global $HTMLStylesFmt;
$HTMLStylesFmt['pmwiki'] = '';

## Define a link stye for new page links
global $LinkPageCreateFmt;
SDV($LinkPageCreateFmt, "<a class='createlinktext' href='\$PageUrl?action=edit'>\$LinkText</a>");


##  The following lines make additional editing buttons appear in the
##  edit page for subheadings, lists, tables, etc.
global $EnableGUIButtons, $GUIButtons, $GUIButtonDirUrlFmt;
SDV($EnableGUIButtons, 1);
$GUIButtonDirUrlFmt = $SkinDirUrl.'/images/guiedit';
$GUIButtons['h2'] = array(100, '\\n!! ', '\\n', '$[Heading]',
                    '$GUIButtonDirUrlFmt/text_heading_2.png"$[Heading Level 2]"');
$GUIButtons['h3'] = array(110, '\\n!!! ', '\\n', '$[Subheading]',
                    '$GUIButtonDirUrlFmt/text_heading_3.png"$[Subheading Level 3]"');

$GUIButtons['separator1'] = array(190, '', '', '', '$GUIButtonDirUrlFmt/separator.png');
$GUIButtons['strong'] = array(200, "'''", "'''", '$[Bold]',
                  '$GUIButtonDirUrlFmt/text_bold.png"$[Bold]"',
                  '$[ak_strong]');
$GUIButtons['em'] = array(210, "''", "''", '$[Italic]',
                  '$GUIButtonDirUrlFmt/text_italic.png"$[Italic]"',
                  '$[ak_em]');
$GUIButtons['strike'] = array(220, "(-", "-)", '$[Strikethrough]',
                  '$GUIButtonDirUrlFmt/text_strikethrough.png"$[Strikethrough]"',
                  '$[ak_em]');
$GUIButtons['sup'] = array(224, "'^", "^'", '$[Superscript]',
                  '$GUIButtonDirUrlFmt/text_superscript.png"$[Superscript]"');
$GUIButtons['sub'] = array(225, "'_", "_'", '$[Subscript]',
                  '$GUIButtonDirUrlFmt/text_subscript.png"$[Subscript]"');
$GUIButtons['big'] = array(230, "'+", "+'", '$[Big text]',
                  '$GUIButtonDirUrlFmt/text_big.png"$[Big text]"');
$GUIButtons['small'] = array(240, "'-", "-'", '$[Small text]',
                  '$GUIButtonDirUrlFmt/text_small.png"$[Small text]"');

$GUIButtons['separator2'] = array(290, '', '', '', '$GUIButtonDirUrlFmt/separator.png');
$GUIButtons['ol'] = array(300, '\\n# ', '\\n', '$[Ordered list]',
                    '$GUIButtonDirUrlFmt/text_list_bullets.png"$[Ordered (numbered) list]"');
$GUIButtons['ul'] = array(310, '\\n* ', '\\n', '$[Unordered list]',
                    '$GUIButtonDirUrlFmt/text_list_numbers.png"$[Unordered (bullet) list]"');
$GUIButtons['hr'] = array(320, '\\n----\\n', '', '',
                    '$GUIButtonDirUrlFmt/text_horizontalrule.png"$[Horizontal rule]"');
$GUIButtons['table'] = array(330,
                      '(:table border=1 width=100%:)\\n(:cell:)\\n\\n(:cell:)\\n\\n(:cell:)\\n\\n(:cellnr:)\\n\\n(:cell:)\\n\\n(:cell:)\\n\\n(:tableend:)', '', '',
                    '$GUIButtonDirUrlFmt/table_add.png"$[Table]"');

$GUIButtons['separator3'] = array(390, '', '', '', '$GUIButtonDirUrlFmt/separator.png');
$GUIButtons['center'] = array(400, '%25center%25', '', '',
                  '$GUIButtonDirUrlFmt/text_align_center.png"$[Center]"');
$GUIButtons['right'] = array(410, '%25right%25', '', '',
                  '$GUIButtonDirUrlFmt/text_align_right.png"$[Right justified]"');
$GUIButtons['indent'] = array(420, '\\n->', '\\n', '$[Indented text]',
                    '$GUIButtonDirUrlFmt/text_indent.png"$[Indented text]"');
$GUIButtons['outdent'] = array(430, '\\n-<', '\\n', '$[Hanging indent]',
                  '$GUIButtonDirUrlFmt/text_indent_remove.png"$[Hanging indent]"');

$GUIButtons['separator4'] = array(490, '', '', '', '$GUIButtonDirUrlFmt/separator.png');
$GUIButtons['pagelink'] = array(500, '[[', ']]', '$[Page link]',
                  '$GUIButtonDirUrlFmt/house_link.png"$[Link to internal page]"');
$GUIButtons['extlink'] = array(510, '[[', ']]', 'http:// | $[link text]',
                  '$GUIButtonDirUrlFmt/world_link.png"$[Link to external page]"');
$GUIButtons['attach'] = array(520, 'Attach:', '', 'file.ext | $[link text]',
                  '$GUIButtonDirUrlFmt/photo_link.png"$[Attach a file or image]"');
$GUIButtons['thumb'] = array(530, '\%thumb\%[[Attach:', ' | Attach:image.jpg&quot;description&quot;]]', 'image.jpg',
                  '$GUIButtonDirUrlFmt/photos.png"$[Attach an image as a thumbnail]"');

$GUIButtons['separator5'] = array(590, '', '', '', '$GUIButtonDirUrlFmt/separator.png');
#$GUIButtons['page_edit'] = array(610, '\\n(:skidooTabEdit:)\\n', '', '',
#                  '$GUIButtonDirUrlFmt/edit.gif"$[Markup used within a page to place an edit icon.]"');
$GUIButtons['author'] = array(640, '~~~', '', '',
                  '$GUIButtonDirUrlFmt/text_signature.png"$[Add author name]"');
$GUIButtons['authordate'] = array(650, '~\'\'~~~~\'\' ', '', '',
                  '$GUIButtonDirUrlFmt/time_add.png"$[Add author name and date]"');
