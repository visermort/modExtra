myComponent.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',
        /*
         stateful: true,
         stateId: 'mycomponent-panel-home',
         stateEvents: ['tabchange'],
         getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
         */
        hideMode: 'offsets',
        items: [{
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: false,
            hideMode: 'offsets',
            items: [{
                title: _('mycomponent_items'),
                layout: 'anchor',
                items: [{
                    html: _('mycomponent_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'mycomponent-grid-items',
                    cls: 'main-wrapper',
                }]
            }]
        }]
    });
    myComponent.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(myComponent.panel.Home, MODx.Panel);
Ext.reg('mycomponent-panel-home', myComponent.panel.Home);
