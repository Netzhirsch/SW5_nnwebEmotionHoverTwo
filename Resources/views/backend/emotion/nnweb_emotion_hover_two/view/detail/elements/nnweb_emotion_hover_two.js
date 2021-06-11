//
//{block name="backend/emotion/view/detail/elements/base"}
//{$smarty.block.parent}
Ext.define('Shopware.apps.Emotion.view.detail.elements.nnwebEmotionHoverTwo', {

    extend: 'Shopware.apps.Emotion.view.detail.elements.Base',

    alias: 'widget.detail-element-emotion-components-nnweb-emotion-hover-two',

    componentCls: 'emotion--nnweb-emotion-hover-two',

    icon: ' data:image/png;base64,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',

    createPreview: function() {
        var me = this,
            preview = '',
            image = me.getConfigValue('nnwebEmotionHoverTwo_hintergrundbild'),
            position = 'center center',
            style;
        
        if (Ext.isDefined(image)) {
            style = Ext.String.format('background-image: url([0]); background-position: [1];', image, position);
            preview = Ext.String.format('<div class="x-emotion-banner-element-preview" style="[0]"></div>', style);
        }

        return preview;
    }
});
//{/block}