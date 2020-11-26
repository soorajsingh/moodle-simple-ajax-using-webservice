define(['jquery', 'mod_testtest/ajaxcalls'
    ],
    function($, Ajaxcalls
    ) {

    return {
        Init: function(itemid) {
            //console.log(itemid);
            console.log(this);
            $('#testcontent').
                    append('<textarea rows="4" cols="10" id="textarea1"></textarea>').
                    trigger("create");

            $('#testcontent').
                    append('<button id="testbutton1" class="btn btn-default" title="read">Read</button>').
                    trigger("create");
            $('#testbutton1').click(function () {
                var ajaxx = require("mod_testtest/ajaxcalls");
                var ajax1 = new ajaxx();
                var content = "default";
                var txtareaupdate = function(content){
                    $('#textarea1').val(content);
                };
                ajax1.loadsettings(itemid, txtareaupdate);
                
            });    
            
            $('#testcontent').append('<button id="testbutton2" class="btn btn-default" title="read">Write</button>').
                    trigger("create");
            $('#testbutton2').click(function () {
                var ajaxx = require("mod_testtest/ajaxcalls");
                var ajax2 = new ajaxx();
                var content = $('#textarea1').val();
                ajax2.updatesettings(itemid, content); 
            });                
        }
    };
});
