define(['jquery', 'core/notification','core/ajax'],
       function($, notification, ajax) {

    function Ajaxcall() {
        this.value = "ajax ok";
    };
    
    Ajaxcall.prototype.loadsettings = function(itemid, txtareaupdate) {

        //var test = 1;
        var promises = ajax.call([{
            methodname: 'mod_testtest_loadsettings',
            args: {itemid: itemid},
            //done: console.log("ajax done")
            fail: notification.exception
        }]);
        promises[0].then(function(data) {
            console.log(data[0].content); //data contains webservice answer
            txtareaupdate(data[0].content);
        });
    };
    
    Ajaxcall.prototype.updatesettings = function(itemid, data2update1) {

        var promises = ajax.call([{
            methodname: 'mod_testtest_updatesettings',
            args: {itemid: itemid, data2update: data2update1},
            //done: console.log("ajax done"),
            fail: notification.exception
        }]);
        promises[0].then(function(data) {
            console.log(data[0].content); //data contains webservice answer
        });
    };    
    
    return Ajaxcall;
});
    