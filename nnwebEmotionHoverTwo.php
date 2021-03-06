<?php
namespace nnwebEmotionHoverTwo;

use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\ActivateContext;
use Shopware\Components\Plugin\Context\DeactivateContext;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UninstallContext;
use Shopware\Components\Plugin\Context\UpdateContext;
use Exception;
use Doctrine\Common\Collections\ArrayCollection;

class nnwebEmotionHoverTwo extends Plugin {
	private $pluginname = 'nnwebEmotionHoverTwo';

	public static function getSubscribedEvents() {
		return [
				'Enlight_Controller_Action_PostDispatchSecure_Widgets_Emotion' => 'extendsEmotionTemplates',
				'Enlight_Controller_Action_PostDispatchSecure_Backend_Emotion' => 'onPostDispatchBackendEmotion',
				'Theme_Compiler_Collect_Plugin_Less' => 'addLessFiles'
		];
	}

	public function install(InstallContext $context) {
		$this->registerEmotionElement();
		$context->scheduleClearCache(InstallContext::CACHE_LIST_ALL);
	}

	public function activate(ActivateContext $context) {
		$context->scheduleClearCache(InstallContext::CACHE_LIST_ALL);
	}

	public function update(UpdateContext $context) {
		$context->scheduleClearCache(InstallContext::CACHE_LIST_ALL);
	}
	
	public function deactivate(DeactivateContext $context) {
		$context->scheduleClearCache(InstallContext::CACHE_LIST_ALL);
	}
	
	public function uninstall(UninstallContext $context) {
		$context->scheduleClearCache(UninstallContext::CACHE_LIST_ALL);
	}
	
	private function registerEmotionElement() {
		$emotionComponentInstaller = $this->container->get('shopware.emotion_component_installer');
		
		$element = $emotionComponentInstaller->createOrUpdate($this->getName(), $this->pluginname, [
			'name' => 'Hover-Banner',
			'template' => 'component_nnweb_emotion_hover_two',
			'xtype' => 'emotion-components-nnweb-emotion-hover-two',
			'cls' => 'nnweb-emotion-hover-two'
		]);
		
		// Hintergrund
		$element->createDisplayField([
			'name' => 'hintergrund',
			'defaultValue' => 'Hintergrund',
			'supportText' => '',
			'allowBlank' => true
		]);
		
		$element->createMediaField([
			'name' => $this->pluginname . '_hintergrundbild',
			'fieldLabel' => 'Hintergrundbild',
			'supportText' => 'Bitte w??hlen Sie ein Bild aus der Media-Verwaltung.',
			'allowBlank' => true,
			'translatable' => true,
			'valueField' => 'path'
		]);
		
		$element->createComboBoxField([
			'fieldLabel' => 'Position',
			'name' => $this->pluginname . '_hintergrundposition',
			'supportText' => 'Sie k??nnen hier die Hintergrundposition festlegen.',
			'allowBlank' => false,
			'store' => 'Shopware.apps.nnwebEmotionHoverTwo.store.HintergrundPositionStore',
			'queryMode' => 'local',
			'displayField' => 'name',
			'valueField' => 'value',
			'defaultValue' => 'center center'
		]);
		
		// Hover Effekt
		$element->createDisplayField([
			'name' => 'hover',
			'defaultValue' => 'Effekt',
			'supportText' => '',
			'allowBlank' => true
		]);
		
		$element->createComboBoxField([
			'fieldLabel' => 'Hover-Effekt',
			'name' => $this->pluginname . '_style',
			'supportText' => 'Sie k??nnen hier den Effekt beim Dar??berfahren mit der Maus festlegen.',
			'allowBlank' => false,
			'store' => 'Shopware.apps.nnwebEmotionHoverTwo.store.HoverStyleStore',
			'queryMode' => 'local',
			'displayField' => 'name',
			'valueField' => 'value',
			'defaultValue' => 'jupiter'
		]);
		
		// ??berschrift
		$element->createDisplayField([
			'name' => 'ueberschrift',
			'defaultValue' => '??berschrift',
			'supportText' => '',
			'allowBlank' => true
		]);
		
		$element->createCheckboxField([
			'name' => $this->pluginname . '_ueberschrift_anzeigen',
			'fieldLabel' => 'Anzeigen'
		]);
		
		$element->createComboBoxField([
			'fieldLabel' => 'HTML-Tag',
			'name' => $this->pluginname . '_ueberschrift_tag',
			'supportText' => 'Sie k??nnen hier den HTML-Tag, der f??r die ??berschrift genutzt wird, eingeben.',
			'allowBlank' => false,
			'store' => 'Shopware.apps.nnwebEmotionHoverTwo.store.HeadlineTagStore',
			'queryMode' => 'local',
			'displayField' => 'name',
			'valueField' => 'value',
			'defaultValue' => 'h2'
		]);
		
		$element->createTextField([
			'name' => $this->pluginname . '_ueberschrift_text',
			'fieldLabel' => '??berschrift',
			'defaultValue' => '??berschrift',
			'supportText' => 'Sie k??nnen hier eine ??berschrift eingeben.',
			'allowBlank' => true,
			'translatable' => true
		]);
		
		$element->createTextField([
			'name' => $this->pluginname . '_ueberschrift_hintergrundfarbe',
			'fieldLabel' => 'Hintergrundfarbe',
			'defaultValue' => '#000000',
			'supportText' => 'Geben Sie einen Hintergrund an. Zum Beispiel #000000 f??r schwarz.',
			'allowBlank' => true,
			'helpTitle' => 'Weitere M??glichkeiten',
			'helpText' => 'Probieren sie auch Werte aus wie "purple", "linear-gradient(#909,#606)", "rgba(0,0,0,0.8)" oder "transparent".'
		]);
		
		$element->createTextField([
			'name' => $this->pluginname . '_ueberschrift_schriftfarbe',
			'fieldLabel' => 'Schriftfarbe',
			'defaultValue' => '#FFFFFF',
			'supportText' => 'Geben Sie eine Schriftfarbe im Hex-Format an an. Zum Beispiel #FFFFFF f??r wei??.',
			'allowBlank' => true
		]);
		
		$element->createTextField([
			'name' => $this->pluginname . '_ueberschrift_schriftgroesse',
			'fieldLabel' => 'Schriftgr????e',
			'defaultValue' => '20px',
			'supportText' => 'Geben Sie eine Schriftgr????e an. Zum Beispiel 20px oder 2vw.',
			'allowBlank' => true
		]);
		
		$element->createTextField([
			'name' => $this->pluginname . '_ueberschrift_cls',
			'fieldLabel' => 'CSS-Klassen',
			'defaultValue' => '',
			'supportText' => 'Mehrere Klassen k??nnen mit einem Leerzeichen getrennt hinzugef??gt werden.',
			'allowBlank' => true
		]);
		
		// Text
		$element->createDisplayField([
			'name' => 'text',
			'defaultValue' => 'Text',
			'supportText' => '',
			'allowBlank' => true
		]);
		
		$element->createCheckboxField([
			'name' => $this->pluginname . '_text_anzeigen',
			'fieldLabel' => 'Anzeigen'
		]);
		
		$element->createTextAreaField([
			'name' => $this->pluginname . '_text_text',
			'fieldLabel' => 'Text',
			'defaultValue' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.',
			'supportText' => 'Sie k??nnen hier einen Text eingeben',
			'allowBlank' => true,
			'translatable' => true
		]);
		
		$element->createTextField([
			'name' => $this->pluginname . '_text_hintergrundfarbe',
			'fieldLabel' => 'Hintergrundfarbe',
			'defaultValue' => '#000000',
			'supportText' => 'Geben Sie einen Hintergrund an. Zum Beispiel #000000 f??r schwarz.',
			'allowBlank' => true,
			'helpTitle' => 'Weitere M??glichkeiten',
			'helpText' => 'Probieren sie auch Werte aus wie "purple", "linear-gradient(#909,#606)", "rgba(0,0,0,0.8)" oder "transparent".'
		]);
		
		$element->createTextField([
			'name' => $this->pluginname . '_text_schriftfarbe',
			'fieldLabel' => 'Schriftfarbe',
			'defaultValue' => '#FFFFFF',
			'supportText' => 'Geben Sie eine Schriftfarbe im Hex-Format an an. Zum Beispiel #FFFFFF f??r wei??.',
			'allowBlank' => true
		]);
		
		$element->createTextField([
			'name' => $this->pluginname . '_text_schriftgroesse',
			'fieldLabel' => 'Schriftgr????e',
			'defaultValue' => '12px',
			'supportText' => 'Geben Sie eine Schriftgr????e an. Zum Beispiel 20px oder 2vw.',
			'allowBlank' => true
		]);
		
		$element->createTextField([
			'name' => $this->pluginname . '_text_cls',
			'fieldLabel' => 'CSS-Klassen',
			'defaultValue' => '',
			'supportText' => 'Mehrere Klassen k??nnen mit einem Leerzeichen getrennt hinzugef??gt werden.',
			'allowBlank' => true
		]);
		
		// Button
		$element->createDisplayField([
			'name' => 'button',
			'defaultValue' => 'Button',
			'supportText' => '',
			'allowBlank' => true
		]);
		
		$element->createCheckboxField([
			'name' => $this->pluginname . '_button_anzeigen',
			'fieldLabel' => 'Anzeigen'
		]);
		
		$element->createTextField([
			'name' => $this->pluginname . '_button_text',
			'fieldLabel' => 'Text',
			'defaultValue' => 'Button',
			'supportText' => 'Sie k??nnen hier einen Text eingeben',
			'allowBlank' => true,
			'translatable' => true
		]);
		
		$element->createTextField([
			'name' => $this->pluginname . '_button_hintergrundfarbe',
			'fieldLabel' => 'Hintergrundfarbe',
			'defaultValue' => '#000000',
			'supportText' => 'Geben Sie einen Hintergrund an. Zum Beispiel #000000 f??r schwarz.',
			'allowBlank' => true,
			'helpTitle' => 'Weitere M??glichkeiten',
			'helpText' => 'Probieren sie auch Werte aus wie "purple", "linear-gradient(#909,#606)", "rgba(0,0,0,0.8)" oder "transparent".'
		]);
		
		$element->createTextField([
			'name' => $this->pluginname . '_button_schriftfarbe',
			'fieldLabel' => 'Schriftfarbe',
			'defaultValue' => '#FFFFFF',
			'supportText' => 'Geben Sie eine Schriftfarbe im Hex-Format an an. Zum Beispiel #FFFFFF f??r wei??.',
			'allowBlank' => true
		]);
		
		$element->createTextField([
			'name' => $this->pluginname . '_button_schriftgroesse',
			'fieldLabel' => 'Schriftgr????e',
			'defaultValue' => '12px',
			'supportText' => 'Geben Sie eine Schriftgr????e an. Zum Beispiel 20px oder 2vw.',
			'allowBlank' => true
		]);
		
		$element->createTextField([
			'name' => $this->pluginname . '_button_link',
			'fieldLabel' => 'Link',
			'defaultValue' => '',
			'supportText' => 'Sie k??nnen hier einen Hyperlink definieren.',
			'allowBlank' => true,
			'translatable' => true
		]);
		
		$element->createField([
			'name' => $this->pluginname . '_button_link_artikel',
			'fieldLabel' => 'Link auf Artikel',
			'xtype' => 'emotion-components-fields-article',
			'supportText' => 'Wird hier ein Artikel ausgew??hlt, wird der obige Link ??berschrieben.',
			'allowBlank' => true
		]);
		
		$element->createComboBoxField([
			'fieldLabel' => 'Link ??ffnen in',
			'name' => $this->pluginname . '_button_link_target',
			'supportText' => 'Sie k??nnen hier festlegen, wo der Link ge??ffnet wird.',
			'allowBlank' => false,
			'store' => 'Shopware.apps.nnwebEmotionHoverTwo.store.LinkTargetStore',
			'queryMode' => 'local',
			'displayField' => 'name',
			'valueField' => 'value',
			'defaultValue' => '_self'
		]);
		
		$element->createComboBoxField([
			'fieldLabel' => 'Verlinkung liegt auf',
			'name' => $this->pluginname . '_button_link_element',
			'supportText' => 'Sie k??nnen hier festlegen, welches Element verlinkt wird.',
			'allowBlank' => false,
			'store' => 'Shopware.apps.nnwebEmotionHoverTwo.store.LinkElementStore',
			'queryMode' => 'local',
			'displayField' => 'name',
			'valueField' => 'value',
			'defaultValue' => 'button'
		]);
		
		$element->createTextField([
			'name' => $this->pluginname . '_button_cls',
			'fieldLabel' => 'CSS-Klassen',
			'defaultValue' => '',
			'supportText' => 'Mehrere Klassen k??nnen mit einem Leerzeichen getrennt hinzugef??gt werden.',
			'allowBlank' => true
		]);
	}

	public function addLessFiles(\Enlight_Event_EventArgs $args) {
		$less = new \Shopware\Components\Theme\LessDefinition(array(), array(
				__DIR__ . '/Resources/views/frontend/_public/src/less/all.less'
		), __DIR__);
		
		return new ArrayCollection(array(
				$less
		));
	}

	public function extendsEmotionTemplates(\Enlight_Event_EventArgs $args) {
		$controller = $args->getSubject();
		$view = $controller->View();
		$view->addTemplateDir(__DIR__ . '/Resources/views/frontend/');
	}

	public function onPostDispatchBackendEmotion(\Enlight_Controller_ActionEventArgs $args) {
		$controller = $args->getSubject();
		$view = $controller->View();
		$view->addTemplateDir(__DIR__ . '/Resources/views/');
		$view->extendsTemplate('backend/emotion/nnweb_emotion_hover_two/view/detail/elements/nnweb_emotion_hover_two.js');
		$view->extendsTemplate('backend/emotion/nnweb_emotion_hover_two/nnweb_emotion_hover_two_store.js');
	}
}