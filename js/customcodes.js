// JavaScript Document
(function() {
    tinymce.create('tinymce.plugins.qrcode', {
        init : function(ed, url) {
            ed.addButton('qrcode', {
                title : 'QR Bar Code',
                image : url+'/qrcode_icon.jpg',
                onclick : function() {
                     ed.selection.setContent('[qrcode pix=120]' + ed.selection.getContent() + '[/qrcode]');
 
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('qrcode', tinymce.plugins.qrcode);
})();