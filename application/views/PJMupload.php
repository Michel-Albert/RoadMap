<form name="posting_comment" id="posting_comment">
<input type="file" name="save_movie" id="movie" /> 
<input type="button" class="postbtn" id="submit_movie" value="Upload Video File" onclick = "return sendCareerData()"/>
</form>
<div id="loading"></div>

<div class="progress">
    <div class="bar"></div >
    <div class="percent">0%</div >
</div>

<div id="status"></div>
<script type="text/javascript">
function sendCareerData(a)
{
  var data = new FormData(document.getElementById('posting_comment'));
  data.append("file_m_id", a);
    var bar = $('.bar');
    var percent = $('.percent');
    var status = $('#status');
  $.ajax({
    type:"POST",
    url:"<?php echo site_url('upload/cp_upload');?>",
    data:data,
    mimeType: "multipart/form-data",
    contentType: false,
    cache: false,
    processData: false,
    beforeSend: function() {    
            $("#loading").html('Please wait....');
            },
    uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
        bar.width(percentVal);
        percent.html(percentVal);
    },
    success:function(data)
      {
         console.log(data);
      }
  });

}
</script>