<?php
if(count($data))
{
    for($i=0;$i<count($data);$i++)
    {
        if($i % 4 == 0) echo "<div class='row' id='image_store'>";
        echo "<div class='col-md-3 portfolio-item thumbnail' id='image_div_".$i."' onmouseenter='div_image_mouseenter(this)'>";
        echo "<img class='img-responsive' style='width:100%;' src='".$data[$i]["url"]."' onclick='open_image(this)'/>";
        echo "</div>";
        if($i % 4 == 3) echo "</div>";
    }
}
else
{
    ?>
<img class='img-responsive' 
     style='width:100%;' 
     src='<?php echo base_url();?>assets/images/homepage.png'
/>
<?php
}
?>
<div id="max_image" style="position:absolute;top:5px;left:5px;right:5;display: none;" onclick="next_image_show();" ondblclick="max_image_hide();"></div>