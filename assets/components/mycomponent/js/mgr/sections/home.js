myComponent.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'mycomponent-panel-home',
            renderTo: 'mycomponent-panel-home-div'
        }]
    });
    myComponent.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(myComponent.page.Home, MODx.Component);
Ext.reg('mycomponent-page-home', myComponent.page.Home);