<?php
/* $Id$*/
/* Steve Kitchen */
/* Up front menu for language file maintenance */

include ('includes/session.inc');

$title = _('UTILITY PAGE') . ' ' . _('that helps maintain language files');

include('includes/header.inc');

/* check if we have gettext - we're useless without it ... */

if (!function_exists('gettext')){
	prnMsg (_('gettext is not installed on this system') . '. ' . _('You cannot use the language files without it'),'error');
	exit;
}

if (!is_writable('./locale/' . $_SESSION['Language'])) {
	prnMsg(_('You do not have write access to the required files please contact your system administrator'),'error');
}
else
{
	echo '<p><a href="' . $rootpath . '/Z_poRebuildDefault.php">'.  _('Rebuild the System Default Language File') . '</a></p>';
	echo '<p><a href="' . $rootpath . '/Z_poAddLanguage.php">' . _('Add a New Language to the System') .'</a></p>';
	echo '<p><a href="' . $rootpath . '/Z_poEditLangHeader.php">'. _('Edit a Language File Header') . '</a></p>';
	echo '<p><a href="' . $rootpath . '/Z_poEditLangModule.php">'. _('Edit a Language File Module') . '</a></p>';
	echo '<p><a href="' . $rootpath . '/Z_poEditLangRemaining.php">'. _('Edit Remaining Strings For This Language') . '</a></p>';
	echo '<p><a href="' . $rootpath . '/locale/'.$_SESSION['Language'].'/LC_MESSAGES/messages.po">'. _('Download messages.po file') . '</a></p>';
	echo '<p><a href="' . $rootpath . '/locale/'.$_SESSION['Language'].'/LC_MESSAGES/messages.mo">'. _('Download messages.mo file') . '</a></p>';
}

include('includes/footer.inc');

?>