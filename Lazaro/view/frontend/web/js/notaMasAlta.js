define(['jquery'], function($) {
    'use strict';
    return function(config, element) {
        
        $(element).click(function(){
            alert(config.nombre + ' ' + config.apellido + ' con la nota: '+ config.nota);
        });

    }
});