$(function(){
   $('#file_upload').uploadify({
       'swf'    :   SCOPE.uploadify.swf,
       'uploader'    :   SCOPE.image_upload,
       'buttonText'    :   '图片上传',
       'fileObjName'    :   'file',
       'fileTypeExts'    :   '*.gif; *.jpg; *.png',
       'onUploadSuccess'    :   function(file, data, response){
           if(response){
               obj = JSON.parse(data);
               $('#upload_org_code_img').attr('src', obj.data);
               $('#file_upload_image').attr('value', obj.data);
               $('#upload_org_code_img').show();
           }
       }
   });
});