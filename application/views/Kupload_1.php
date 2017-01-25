<?php
//require_once '../lib/Kendo/Autoload.php';
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//    $type = $_GET['type'];
//
//    if ($type == 'save') {
//        $files = $_FILES['files'];
//        // Save the uploaded files
//        /*
//        for ($index = 0; $index < count($files['name']); $index++) {
//            $file = $files['tmp_name'][$index];
//            if (is_uploaded_file($file)) {
//                move_uploaded_file($file, './' . $files['name'][$index]);
//            }
//        }
//        */
//    } else if ($type == 'remove') {
//        $fileNames = $_POST['fileNames'];
//        // Delete uploaded files
//        /*
//        for ($index = 0; $index < count($fileNames); $index++) {
//            unlink('./' . $fileNames[$index]);
//        }
//        */
//    }
//
//    // Return an empty string to signify success
//    echo '';
//
//    exit;
//}

//require_once '../include/header.php';
?>
<style>
        .dropZoneElement {
            z-index: 0;
            position: absolute;
            display: inline-block;
            background-color: transparent;
            width: 100%;
            height: 100%;
            left:0px;
            top:0px;
            text-align: center;
        }

        .textWrapper {
/*            position: absolute;
            top: 50%;
            transform: translateY(-50%);*/
            width: 100%;
            font-size: 24px;
            line-height: 1.2em;
            font-family: Arial,Helvetica,sans-serif;
            color: #000;
        }

        .dropImageHereText {
            color: #c7c7c7;
            text-transform: uppercase;
            font-size: 12px;
        }

        .product {
            float: left;
            position: relative;
            margin: 0 10px 10px 0;
            z-index: 100;
            padding: 0;
        }
        .product img {
            width: 110px;
            height: 110px;
        }

        .wrapper:after {
            content: ".";
            display: block;
            height: 0;
            clear: both;
            visibility: hidden;
        }
    </style>
    
<?php
$images=['.jpg', ',jpeg', '.png', '.bmp', '.gif', 'mp4'];
$upload = new \Kendo\UI\Upload('files[]');
$upload->async(array(
        'saveUrl' => site_url("upload/save"),
        'removeUrl' => site_url("upload/remove"),
        'autoUpload' => true,
        'removeField' => 'fileNames[]'
       ))
	   ->validation(array(
		'allowedExtensions'=>$images
		))
	   ->showFileList(false)
	   ->dropZone('.dropZoneElement')
	   ->success('onSuccess');

echo $upload->render();
?>
<div id="example" class="k-content">
    <div class="demo-section k-content wide">
        <div class="wrapper">
            <div id="products" style="text-align:center;background-color:transparent;"></div>
            <div class="dropZoneElement">
                <div class="textWrapper">
                <p><span>+</span>Add Image</p>
                <p class="dropImageHereText">
                </p>
                </div>
            </div>
         </div>
    </div>
</div>
<script type="text/x-kendo-template" id="template">
	<div class="product">
		<img src="<?php echo base_url();?>assets/content/web/foods/#= name #" alt="#: name # image" />
	</div>       
</script>

<script>
    function onSuccess(e) {
        if (e.operation == "upload") {
            for (var i = 0; i < e.files.length; i++) {
                var file = e.files[i].rawFile;

                if (file) {
                    var reader = new FileReader();

                    reader.onloadend = function () {
                        $("<div class='product' onmouseenter='product_image_mouseenter(this)'><img src=" + this.result + " style='height:150px;width:auto;'/></div>").appendTo($("#products"));
                    };

                    reader.readAsDataURL(file);
                }
            }
        }
    }
</script>
