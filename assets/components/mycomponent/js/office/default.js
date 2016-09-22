Ext.onReady(function () {
    myComponent.config.connector_url = OfficeConfig.actionUrl;

    var grid = new myComponent.panel.Home();
    grid.render('office-mycomponent-wrapper');

    var preloader = document.getElementById('office-preloader');
    if (preloader) {
        preloader.parentNode.removeChild(preloader);
    }
});