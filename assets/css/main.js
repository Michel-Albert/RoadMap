$(function(){'use strict';$('#fileupload').fileupload();$('#fileupload').fileupload('option','redirect',window.location.href.replace(/\/[^\/]*$/,'/cors/result.html?%s'));if(window.location.hostname==='blueimp.github.com'){$('#fileupload').fileupload('option',{url:'//jquery-file-upload.appspot.com/',maxFileSize:5000000,acceptFileTypes:/(\.|\/)(gif|jpe?g|png)$/i,process:[{action:'load',fileTypes:/^image\/(gif|jpeg|png)$/,maxFileSize:20000000},{action:'resize',maxWidth:1440,maxHeight:900},{action:'save'}]});if($.support.cors){$.ajax({url:'//jquery-file-upload.appspot.com/',type:'HEAD'}).fail(function(){$('<span class="alert alert-error"/>').text('Upload server currently unavailable - '+
new Date()).appendTo('#fileupload');});}}else{$('#fileupload').fileupload('option',{maxFileSize:10485760,acceptFileTypes:/(\.|\/)(gif|jpe?g|png)$/i,sequentialUploads:true});$('#fileupload').each(function(){var that=this;$.getJSON(this.action,function(result){if(result&&result.length){$(that).fileupload('option','done').call(that,null,{result:result});}});});}});