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
            html: '<h2>' + _('mycomponent') + '</h2>',
            cls: '',
            style: {margin: '15px 0'}
        }, {
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: true,
            hideMode: 'offsets',
            items: [{
                title: _('mycomponent_items1'),
                layout: 'anchor',
                items: [{
                    html:  _('mycomponent_intro_msg1') ,
                    cls: 'panel-desc'
                }, {
                    xtype: 'button',
                    text: 'Выполнить',
                    //scope: this,
                    handler: function() {
                        runAction();                     
                    }
                }, {
                    html:  '<div class="messages-box"><p id="mycomponent_result">Нажмите на кнопку, будет результат</p></d>' ,
                }]
            },{
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



var runAction = function(){
    var url = myComponent.config.connectorUrl+'?action=mgr/item/getapi',
        action = 'item/getapi';
    //console.log(myComponent);
    console.log(url);
    Ext.Ajax.request({
        url: url,
        'dataType': 'json',
        //data: {action: action},
        success: function(response, opts) {
          console.log(response);
          console.log(response.responseText);
          myResponse = JSON.parse(response.responseText);
          myMessage = JSON.parse(myResponse.message)
          console.log(myResponse);
          console.log(myMessage);//здесь имеем собственно результат запроса к серверу
           Ext.get('mycomponent_result').update(myResponse.message);
        },
        failure: function(response, opts) {
           console.log(response);

        }
    });

    showMessage('Выполнено!');
};

var showMessage = function(mess){
    var win = new Ext.Window({
        id: 'my_window'
        , title : mess
        , width : 200
        , height: 15
        , layout: "fit"
    });
    win.show();  
};

        // Ext.onReady(function() {
        //     var title = 'Ввод данных';
        //     var msg = 'Введите какой-нибудь текст.';
        //     var myCallback = function(btn, text) {
        //         console.info('Вы нажали ' + btn);
        //         if (text) {
        //             console.info('Вы ввели '+ text);
        //         }
        //     }
        //     Ext.MessageBox.prompt(title,msg,myCallback);
        // });

    // Ext.onReady(function() {
    //     var win = new Ext.Window({
    //         id: 'my_window'
    //         , title : "Добро пожаловать в Ext JS"
    //         , width : 300
    //         , height: 150
    //         , layout: "fit"
    //       //  , autoLoad: {
    //       //      url : "b.html"
    //       //      , scripts : true
    //       //  }
    //     });
    //     win.show();
    // });
