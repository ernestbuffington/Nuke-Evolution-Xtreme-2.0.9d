<?php

	//include(NUKE_BASE_DIR.'header.php');
	LinkusAdminMain();
	
	OpenTable();
$a = 0;
$result = $db->sql_query("SELECT * FROM `".$prefix."_link_us` WHERE `site_status`='3' ORDER BY `site_name`");
$numrows = $db->sql_numrows($result);
if($numrows > 0) {
  echo "<table border='0' cellpadding='2' cellspacing='5' width='100%'>";
  while($row = $db->sql_fetchrow($result)) {
    if($a == 0) { echo "<tr>"; }
    echo "<td width='50%' valign='top'>";
	
    OpenTable();
    echo "<table border='0' width='100%'>";
    echo "<tr><td width='25%' align='center' valign='top' rowspan='3'>";
    echo "<a href='modules.php?name=".$module_name."&amp;op=visit&amp;id=".$row['id']."' target='_blank'><img src='".$row['site_image']."' border='0' alt='".$row['site_name']."' title='".$row['site_name']."' height='$height' width='$width'></a><br /><br />";
    echo " <a href='".$admin_file.".php?op=approve_button&amp;id=".$row['id']."'><img src='modules/".$module_name."/images/approve.png' border='0' alt='".$lang_new[$module_name]['APPROVE']."' title='".$lang_new[$module_name]['APPROVE']."'></a>";
    echo " <a href='".$admin_file.".php?op=edit_button&amp;id=".$row['id']."'><img src='modules/".$module_name."/images/edit.png' border='0' alt='".$lang_new[$module_name]['EDIT']."' title='".$lang_new[$module_name]['EDIT']."'></a>";
    echo " <a href='".$admin_file.".php?op=delete_button&amp;id=".$row['id']."'><img src='modules/".$module_name."/images/delete.png' border='0' alt='".$lang_new[$module_name]['DELETE']."' title='".$lang_new[$module_name]['DELETE']."'></a>";
    echo "</td>\n<td width='75%' valign='top'><strong>".$lang_new[$module_name]['ADDED'].":</strong> ".formatTimestamp($row['date_added'])."</td></tr>";
	echo "<tr><td valign='top'><strong>".$lang_new[$module_name]['SUB_USERNAME']."</strong>: ".UsernameColor($row['user_name'])."</td></tr>";
	echo "<tr><td valign='top'><strong>".$lang_new[$module_name]['DESCRIPTION']."</strong>: ".set_smilies(decode_bbcode(stripslashes($row['site_description']), 1, true))."</td></tr>";
    echo "</table>";
    CloseTable();
    echo "</td>";
    $a++;
    if($a == 2) { echo "</tr>"; $a = 0; }
  }
  if($a == 1) { echo "<td width='50%'>&nbsp;</td></tr></table>"; } else { echo "</tr></table>"; }
  
} else {

  echo "<center class='title'>".$lang_new[$module_name]['SUB_NONE']."</center>\n";
  
}
	CloseTable();

?>