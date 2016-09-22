var myComponent = function (config) {
    config = config || {};
    myComponent.superclass.constructor.call(this, config);
};
Ext.extend(myComponent, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('mycomponent', myComponent);

myComponent = new myComponent();