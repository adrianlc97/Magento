define(['jquery'], function($) {
    'use strict';
    return function(config, element) {
        
        $(element).click(function(){
            $(".notas").toggle();
        });

    }
});