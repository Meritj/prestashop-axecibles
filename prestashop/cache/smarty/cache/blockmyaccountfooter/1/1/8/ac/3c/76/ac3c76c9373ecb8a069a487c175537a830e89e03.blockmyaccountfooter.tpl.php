<?php /*%%SmartyHeaderCode:177933992762a4c9ee9e0c78-98826757%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac3c76c9373ecb8a069a487c175537a830e89e03' => 
    array (
      0 => '/Applications/MAMP/htdocs/testremi/prestashop/prestashop/themes/default-bootstrap/modules/blockmyaccountfooter/blockmyaccountfooter.tpl',
      1 => 1556635332,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177933992762a4c9ee9e0c78-98826757',
  'variables' => 
  array (
    'link' => 0,
    'returnAllowed' => 0,
    'voucherAllowed' => 0,
    'HOOK_BLOCK_MY_ACCOUNT' => 0,
    'is_logged' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_62a4c9eeab7244_47298259',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62a4c9eeab7244_47298259')) {function content_62a4c9eeab7244_47298259($_smarty_tpl) {?>
<!-- Block myaccount module -->
<section class="footer-block col-xs-12 col-sm-4">
	<h4><a href="http://localhost:8888/testremi/prestashop/prestashop/mon-compte" title="Gérer mon compte client" rel="nofollow">Mon compte</a></h4>
	<div class="block_content toggle-footer">
		<ul class="bullet">
			<li><a href="http://localhost:8888/testremi/prestashop/prestashop/historique-commandes" title="Mes commandes" rel="nofollow">Mes commandes</a></li>
						<li><a href="http://localhost:8888/testremi/prestashop/prestashop/avoirs" title="Mes avoirs" rel="nofollow">Mes avoirs</a></li>
			<li><a href="http://localhost:8888/testremi/prestashop/prestashop/adresses" title="Mes adresses" rel="nofollow">Mes adresses</a></li>
			<li><a href="http://localhost:8888/testremi/prestashop/prestashop/identite" title="Gérer mes informations personnelles" rel="nofollow">Mes informations personnelles</a></li>
			<li><a href="http://localhost:8888/testremi/prestashop/prestashop/reduction" title="Mes bons de réduction" rel="nofollow">Mes bons de réduction</a></li>			
            		</ul>
	</div>
</section>
<!-- /Block myaccount module -->
<?php }} ?>
