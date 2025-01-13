(function () {
   tinymce.create('tinymce.plugins.custom.btn',{
       init:function (ed,url) {
           ed.addButton('video',{
                title:'دکمه افزودن شورت کد ویدئو',
               image:url+'/tinymce-icon-image/player.png',
               onclick : function () {
                   ed.execCommand(
                       "mceInsertContent",
                       false,
                       "[free-video src=\"\"]"
                   );
               }

           });
           ed.addButton('quote',{
               // title:'دکمه افزودن شورت کد نقل قول',
               // image:url+'/tinymce-icon-image/blockquote.png',
               // text :'شورت کد نقل قول',
               // icon : ' mce-i-link',
               type:'menubutton',
               text :'شورت کدهای اختصاصی قالب',
               menu :[
                   {
                       icon:'blockquote',
                       text:'شورت کد افزون لینک نقل قول',
                       onclick : function () {
                           ed.execCommand(
                               "mceInsertContent",
                               false,
                               "[bq text=\"\" quote=\"\"]"
                           );
                       }
                       },
                   {
                       icon: '',
                       text:'شورت کد افزودن ویدیو',
                       onclick : function () {
                           ed.execCommand(
                               "mceInsertContent",
                               false,
                               "[free-video src=\"\"]"
                           );
                       }
                   },
               ],
           });
       }
   });
tinymce.PluginManager.add('video',tinymce.plugins.custom.btn);
tinymce.PluginManager.add('quote',tinymce.plugins.custom.btn);
})();

