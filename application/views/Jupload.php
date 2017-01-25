<img src="" id="image_to_display" class="img-responsive" alt=""/>
<form action=""<?php site_url("upload/save");?>" method="post" enctype="multipart/form-data">
    <input class="form-control"  value="POST" name="_method" id="_method" />
        <fieldset>
            <div class="form-group file">
                <input type="file" multiple="multiple" name="logofile" id="logofile" onchange="loadFile(event)">
            </div>

         .....
         </fieldset>                    
    <input type="submit" value="Upload File to Server">        
      .....
 </form>
<!--<form action="file-echo2.php" method="post" enctype="multipart/form-data">
    <input type="file" name="myfile"><br>
</form>-->

<div class="progress">
    <div class="bar"></div >
    <div class="percent">0%</div >
</div>

<div id="status"></div>
 <script>
  var loadFile = function(event) {
    var output = document.getElementById('image_to_display');
    alert(event.target.files.length);
    output.src = URL.createObjectURL(event.target.files[0]);
  };
$(function() {

    var bar = $('.bar');
    var percent = $('.percent');
    var status = $('#status');

    $('form').ajaxForm({
        beforeSend: function() {
            status.empty();
            var percentVal = '0%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
        complete: function(xhr) {
            status.html(xhr.responseText);
        }
    });
}); 

</script>