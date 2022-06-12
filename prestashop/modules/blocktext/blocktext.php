<?php

if (!defined('_PS_VERSION_'))
	exit;

class BlockText extends Module{

    public function __construct()
	{
		$this->name = 'blocktext';
		$this->tab = 'blocktext';
		$this->version = '0.10.1';
		$this->author = 'PrestaShop';
		$this->need_instance = 0;

		$this->bootstrap = true;
		parent::__construct();

		$this->displayName = $this->l('Block Text');
		$this->description = $this->l('Adds a text block.');
		$this->ps_versions_compliancy = array('min' => '1.6', 'max' => '1.6.99.99');

		$this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

        if (!Configuration::get('BLOCKTEXTCONFIG')) {
            $this->warning = $this->l('No name provided');
        }
	}

	public function install()
{
    return parent::install()
	&& $this->registerHook('leftColumn')
        && $this->registerHook('header');
		Configuration::updateValue('BLOCKTEXT', 'my friend');

}

public function getContent()
{
    $output = '';

    // this part is executed only when the form is submitted
    if (Tools::isSubmit('submit' . $this->name)) {
        // retrieve the value set by the user
        $configValue = (string) Tools::getValue('BLOCKTEXT_CONFIG');

        // check that the value is valid
        if (empty($configValue) || !Validate::isGenericName($configValue)) {
            // invalid value, show an error
            $output = $this->displayError($this->l('Invalid Configuration value'));
        } else {
            // value is ok, update it and display a confirmation message
            Configuration::updateValue('BLOCKTEXT_CONFIG', $configValue);
            $output = $this->displayConfirmation($this->l('Settings updated'));
        }
    }

    // display any message, then the form
    return $output . $this->displayForm();
}

public function displayForm()
{
    // Init Fields form array
    $form = [
        'form' => [
            'legend' => [
                'title' => $this->l('Settings'),
            ],
            'input' => [
                [
                    'type' => 'text',
                    'label' => $this->l('Text configuration'),
                    'name' => 'BLOCKTEXT_CONFIG',
                    'size' => 20,
                    'required' => true,
                ],
            ],
            'submit' => [
                'title' => $this->l('Save'),
                'class' => 'btn btn-default pull-right',
            ],
        ],
    ];

    $helper = new HelperForm();

    // Module, token and currentIndex
    $helper->table = $this->table;
    $helper->name_controller = $this->name;
    $helper->token = Tools::getAdminTokenLite('AdminModules');
    $helper->currentIndex = AdminController::$currentIndex . '&' . http_build_query(['configure' => $this->name]);
    $helper->submit_action = 'submit' . $this->name;

    // Default language
    $helper->default_form_language = (int) Configuration::get('PS_LANG_DEFAULT');

    // Load current value into the form
    $helper->fields_value['BLOCKTEXT_CONFIG'] = Tools::getValue('BLOCKTEXT_CONFIG', Configuration::get('BLOCKTEXT_CONFIG'));

    return $helper->generateForm([$form]);
}

public function hookDisplayLeftColumn($params)
{
	$this->context->smarty->assign([
		'blocktext_name' => Configuration::get('BLOCKTEXT'),
		'blocktext_link' => $this->context->link->getModuleLink('blocktext', 'display')
	]);

	return $this->display(__FILE__, 'blocktext.tpl');
}

public function hookDisplayRightColumn($params)
{
	return $this->hookDisplayLeftColumn($params);
}

public function hookActionFrontControllerSetMedia()
{
	$this->context->controller->registerStylesheet(
		'mymodule-style',
		$this->_path.'views/css/blocktext.css',
		[
			'media' => 'all',
			'priority' => 1000,
		]
	);

	$this->context->controller->registerJavascript(
		'mymodule-javascript',
		$this->_path.'views/js/blocktext.js',
		[
			'position' => 'bottom',
			'priority' => 1000,
		]
	);
}

}