//{block name="backend/Emotion/app" append}
Ext.define('Shopware.apps.nnwebEmotionHoverTwo.store.BackgroundPositionStore', {
	extend : 'Ext.data.Store',
	fields : [ {
		name : 'id',
		type : 'integer'
	}, {
		name : 'name',
		type : 'string'
	},
	{
		name : 'value',
		type : 'string'
	}],
	data : [ {
		id : 1,
		name : "Links",
		value : "nnwebEmotionHoverTwo_hintergrund_position_links"		
	}, {
		id : 2,
		name : "Mitte",
		value : "nnwebEmotionHoverTwo_hintergrund_position_mitte"
	}, {
		id : 3,
		name : "Rechts",
		value : "nnwebEmotionHoverTwo_hintergrund_position_rechts"
	}]
});

Ext.define('Shopware.apps.nnwebEmotionHoverTwo.store.HeadlineTagStore', {
	extend : 'Ext.data.Store',
	fields : [ {
		name : 'id',
		type : 'integer'
	}, {
		name : 'name',
		type : 'string'
	},
	{
		name : 'value',
		type : 'string'
	}],
	data : [ {
		id : 1,
		name : "H1",
		value : "h1"		
	}, {
		id : 2,
		name : "H2",
		value : "h2"
	}, {
		id : 3,
		name : "H3",
		value : "h3"
	}, {
		id : 4,
		name : "H3",
		value : "h3"
	}, {
		id : 5,
		name : "H4",
		value : "h4"
	}, {
		id : 6,
		name : "H5",
		value : "h5"
	}, {
		id : 7,
		name : "H6",
		value : "h6"
	}]
});

Ext.define('Shopware.apps.nnwebEmotionHoverTwo.store.TextAlignStore', {
	extend : 'Ext.data.Store',
	fields : [ {
		name : 'id',
		type : 'integer'
	}, {
		name : 'name',
		type : 'string'
	},
	{
		name : 'value',
		type : 'string'
	}],
	data : [ {
		id : 1,
		name : "Links",
		value : "left"		
	}, {
		id : 2,
		name : "Mitte",
		value : "center"
	}, {
		id : 3,
		name : "Rechts",
		value : "right"
	}, {
		id : 4,
		name : "Blocksatz",
		value : "justify"
	}]
});

Ext.define('Shopware.apps.nnwebEmotionHoverTwo.store.LinkTargetStore', {
	extend : 'Ext.data.Store',
	fields : [ {
		name : 'id',
		type : 'integer'
	}, {
		name : 'name',
		type : 'string'
	},
	{
		name : 'value',
		type : 'string'
	}],
	data : [ {
		id : 1,
		name : "Selbes Fenster",
		value : "_self"		
	}, {
		id : 2,
		name : "Neues Fenster",
		value : "_blank"
	}]
});

Ext.define('Shopware.apps.nnwebEmotionHoverTwo.store.LinkElementStore', {
	extend : 'Ext.data.Store',
	fields : [ {
		name : 'id',
		type : 'integer'
	}, {
		name : 'name',
		type : 'string'
	},
	{
		name : 'value',
		type : 'string'
	}],
	data : [ {
		id : 1,
		name : "Button",
		value : "button"		
	}, {
		id : 2,
		name : "Ganzes Element",
		value : "element"
	}]
});

Ext.define('Shopware.apps.nnwebEmotionHoverTwo.store.BoxAlignXStore', {
	extend : 'Ext.data.Store',
	fields : [ {
		name : 'id',
		type : 'integer'
	}, {
		name : 'name',
		type : 'string'
	},
	{
		name : 'value',
		type : 'string'
	}],
	data : [ {
		id : 1,
		name : "Links",
		value : "box-left"		
	}, {
		id : 2,
		name : "Mitte",
		value : "box-center-x"
	}, {
		id : 3,
		name : "Rechts",
		value : "box-right"
	},]
});

Ext.define('Shopware.apps.nnwebEmotionHoverTwo.store.BoxAlignYStore', {
	extend : 'Ext.data.Store',
	fields : [ {
		name : 'id',
		type : 'integer'
	}, {
		name : 'name',
		type : 'string'
	},
	{
		name : 'value',
		type : 'string'
	}],
	data : [ {
		id : 1,
		name : "Oben",
		value : "box-top"		
	}, {
		id : 2,
		name : "Mitte",
		value : "box-center-y"
	}, {
		id : 3,
		name : "Unten",
		value : "box-bottom"
	},]
});

Ext.define('Shopware.apps.nnwebEmotionHoverTwo.store.HoverVisibilityStore', {
	extend : 'Ext.data.Store',
	fields : [ {
		name : 'id',
		type : 'integer'
	}, {
		name : 'name',
		type : 'string'
	},
	{
		name : 'value',
		type : 'string'
	}],
	data : [ {
		id : 1,
		name : "Immer",
		value : "always"		
	}, {
		id : 2,
		name : "Beim Darüberfahren mir der Maus",
		value : "hover"
	}, {
		id : 3,
		name : "Nie",
		value : "never"
	},]
});

Ext.define('Shopware.apps.nnwebEmotionHoverTwo.store.TextboxPositionStore', {
	extend : 'Ext.data.Store',
	fields : [ {
		name : 'id',
		type : 'integer'
	}, {
		name : 'name',
		type : 'string'
	},
	{
		name : 'value',
		type : 'string'
	}],
	data : [ {
		id : 1,
		name : "Links",
		value : "left"		
	}, {
		id : 2,
		name : "Rechts",
		value : "right"
	}, {
		id : 3,
		name : "Oben",
		value : "top"
	}, {
		id : 4,
		name : "Unten",
		value : "bottom"
	}]
});

Ext.define('Shopware.apps.nnwebEmotionHoverTwo.store.HintergrundPositionStore', {
	extend : 'Ext.data.Store',
	fields : [ {
		name : 'id',
		type : 'integer'
	}, {
		name : 'name',
		type : 'string'
	},
	{
		name : 'value',
		type : 'string'
	}],
	data : [ {
		id : 1,
		name : "links oben",
		value : "left top"		
	}, {
		id : 2,
		name : "links mittig",
		value : "left center"
	}, {
		id : 3,
		name : "links unten",
		value : "left bottom"
	}, {
		id : 4,
		name : "mittig oben",
		value : "center top"
	}, {
		id : 5,
		name : "mittig mittig",
		value : "center center"
	}, {
		id : 6,
		name : "mittig unten",
		value : "center bottom"
	}, {
		id : 7,
		name : "rechts oben",
		value : "right top"
	}, {
		id : 8,
		name : "rechts mittig",
		value : "right center"
	}, {
		id : 9,
		name : "rechts unten",
		value : "right bottom"
	}]
});

Ext.define('Shopware.apps.nnwebEmotionHoverTwo.store.HoverStyleStore', {
	extend : 'Ext.data.Store',
	fields : [{
		name : 'id',
		type : 'integer'
	}, {
		name : 'name',
		type : 'string'
	},
	{
		name : 'value',
		type : 'string'
	}],
	data : [{
		id : 1,
		name : "Jupiter",
		value : "jupiter"
	},{
		id : 2,
		name : "Pluto",
		value : "pluto"
	},{
		id : 3,
		name : "Neptun",
		value : "neptun"		
	},{
		id : 4,
		name : "Ceres",
		value : "ceres"
	},{
		id : 5,
		name : "Juno",
		value : "juno"		
	},{
		id : 6,
		name : "Vesta",
		value : "vesta"
	}]
});
// {/block}
