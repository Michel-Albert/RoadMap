<!DOCTYPE html>
<?php
//    $site_BASE_URL_PATH= substr(site_url(),0, strlen(site_url())-9);
//    define("BASE_URL_PATH", $site_BASE_URL_PATH."assets".DIRECTORY_SEPARATOR);   
//    define("UPLOAD_URL", $site_BASE_URL_PATH."uploadedImage".DIRECTORY_SEPARATOR);
    $assets_url= base_url()."assets".DIRECTORY_SEPARATOR;
    $upload_url= base_url()."uploadedImage".DIRECTORY_SEPARATOR;
?>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>epvpImg: Don't read the site title, upload images!</title>
        <meta name="description" content="Image upload site dedicated to the world famous elitepvpers bulletin board.">
        <!-- Bootstrap CSS Toolkit styles -->
        <script type="text/javascript" async="" src="<?php echo $assets_url;?>css/ga.js"></script>
        <script async="" src="<?php echo $assets_url;?>css/cloudflare.min.js"></script>
        <script type="text/javascript">
            //<![CDATA[
            try {
                if (!window.CloudFlare) {
                    var CloudFlare = [{verbose: 0, p: 0, byc: 0, owlid: "cf", bag2: 1, mirage2: 0, oracle: 0, paths: {cloudflare: "/cdn-cgi/nexp/dok3v=1613a3a185/"}, atok: "d80c094e43bd54f2b670e504a490f2f0", petok: "44e864922475375949f380b08ab143a6637bbbf2-1482945668-1800", adblock: 1, betok: "11e1fa2234cbd4ddcc05921506e93a00cda6dd00-1482945668-120", zone: "epvpimg.com", rocket: "0", apps: {"ga_key": {"ua": "UA-28042874-2", "ga_bs": "2"}}}];
                    !function (a, b) {
                        a = document.createElement("script"), b = document.getElementsByTagName("script")[0], a.async = !0, a.src = "//ajax.cloudflare.com/cdn-cgi/nexp/dok3v=f2befc48d1/cloudflare.min.js", b.parentNode.insertBefore(a, b)
                    }()
                }
            } catch (e) {
            }
            ;
            //]]>
        </script>
        <link rel="stylesheet" href="<?php echo $assets_url;?>css/bootstrap.min.css">
        <!-- Generic page styles -->
        <link rel="stylesheet" href="<?php echo $assets_url;?>css/style.css">
        <!-- Bootstrap styles for responsive website layout, supporting different screen sizes -->
        <link rel="stylesheet" href="<?php echo $assets_url;?>css/bootstrap-responsive.min.css">
        <!-- Bootstrap CSS fixes for IE6 -->
        <!--[if lt IE 7]><link rel="stylesheet" href="css/bootstrap-ie6.min.css"><![endif]-->
        <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
        <link rel="stylesheet" href="<?php echo $assets_url;?>css/jquery.fileupload-ui.css">
        <!-- Shim to make HTML5 elements usable in older Internet Explorer versions -->
        <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <script type="text/javascript">
            /* <![CDATA[ */
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-28042874-2']);
            _gaq.push(['_trackPageview']);

            (function () {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();

            (function (b) {
                (function (a) {
                    "__CF"in b && "DJS"in b.__CF ? b.__CF.DJS.push(a) : "addEventListener"in b ? b.addEventListener("load", a, !1) : b.attachEvent("onload", a)
                })(function () {
                    "FB"in b && "Event"in FB && "subscribe"in FB.Event && (FB.Event.subscribe("edge.create", function (a) {
                        _gaq.push(["_trackSocial", "facebook", "like", a])
                    }), FB.Event.subscribe("edge.remove", function (a) {
                        _gaq.push(["_trackSocial", "facebook", "unlike", a])
                    }), FB.Event.subscribe("message.send", function (a) {
                        _gaq.push(["_trackSocial", "facebook", "send", a])
                    }));
                    "twttr"in b && "events"in twttr && "bind"in twttr.events && twttr.events.bind("tweet", function (a) {
                        if (a) {
                            var b;
                            if (a.target && a.target.nodeName == "IFRAME")
                                a:{
                                    if (a = a.target.src) {
                                        a = a.split("#")[0].match(/[^?=&]+=([^&]*)?/g);
                                        b = 0;
                                        for (var c; c = a[b]; ++b)
                                            if (c.indexOf("url") === 0) {
                                                b = unescape(c.split("=")[1]);
                                                break a
                                            }
                                    }
                                    b = void 0
                                }
                            _gaq.push(["_trackSocial", "twitter", "tweet", b])
                        }
                    })
                })
            })(window);
            /* ]]> */
        </script><style type="text/css">.cf-hidden { display: none; } .cf-invisible { visibility: hidden; }</style>
    </head>
    <body>

        <div class="container">
            <div style="text-align:center;padding:80px 0 35px 0;">
                <img src="<?php echo $assets_url;?>css/logo.png" alt="">
            </div>
            <!-- The file upload form used as target for the file upload widget -->
            <form id="fileupload" action="<?php echo site_url("upload/do_upload");?>" method="POST" enctype="multipart/form-data">
                <table align="center" width="470">
                    <tbody><tr>
                            <td>
                                <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                <div class="fileupload-buttonbar">
                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                    <span class="btn btn-success fileinput-button">
                                        <span><i class="icon-plus icon-white"></i> Add images...</span>
                                        <input type="file" name="images[]" accept="image/*" multiple="">
                                    </span>
                                    <button type="submit" class="btn btn-primary start">
                                        <i class="icon-upload icon-white"></i> Start upload
                                    </button>
                                    <button type="reset" class="btn btn-warning cancel">
                                        <i class="icon-ban-circle icon-white"></i> Cancel upload
                                    </button>
                                    <button type="button" class="btn btn-danger delete">
                                        <i class="icon-trash icon-white"></i> Delete
                                    </button>
                                    <input type="checkbox" class="toggle">
                                    <!-- The global progress information -->
                                    <div class="fileupload-progress fade">
                                        <!-- The global progress bar -->
                                        <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                            <div class="bar" style="width:0%;"></div>
                                        </div>
                                        <!-- The extended global progress information -->
                                        <div class="progress-extended">&nbsp;</div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody></table>
                <!-- The loading indicator is shown during image processing -->
                <div class="fileupload-loading"></div>
                <br>
                <!-- The table listing the files available for upload/download -->
                <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
            </form>
            <div style="text-align: center">
                <div style="padding-bottom: 25px;color:yellow;">
                    Drag &amp; Drop images here...
                </div>
                <br>
                <img id="jump" src="<?php echo $assets_url;?>css/arrow.png" alt="" style="padding-bottom: 35px">
                <br>
                <img src="<?php echo $assets_url;?>css/hole.png" alt="" style="padding-bottom: 20px">
            </div>
        </div>

        <!-- The template to display files available for upload -->
        <script id="template-upload" type="text/x-tmpl">
            {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-upload fade">
            <td class="preview"><span class="fade"></span></td>
            <td class="name">{%=file.name%}</td>
            <td class="size">{%=o.formatFileSize(file.size)%}</td>
            {% if (file.error) { %}
            <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
            {% } else if (o.files.valid && !i) { %}
            <td>
            <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" style="width:0%;"></div></div>
            </td>
            <td class="start">{% if (!o.options.autoUpload) { %}
            <button class="btn btn-primary">
            <i class="icon-upload icon-white"></i> {%=locale.fileupload.start%}
            </button>
            {% } %}</td>
            {% } else { %}
            <td colspan="2"></td>
            {% } %}
            <td class="cancel">{% if (!i) { %}
            <button class="btn btn-warning">
            <i class="icon-ban-circle icon-white"></i> {%=locale.fileupload.cancel%}
            </button>
            {% } %}</td>
            </tr>
            {% } %}
        </script>
        <!-- The template to display files available for download -->
        <script id="template-download" type="text/x-tmpl">
            {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-download fade">
            {% if (file.error) { %}
            <td></td>
            <td class="name">{%=file.name%}</td>
            <td class="size">{%=o.formatFileSize(file.size)%}</td>
            <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
            {% } else { %}
            <td class="preview">{% if (file.thumbnail_url) { %}
            <a href="{%=file.url%}" title="{%=file.name%}"><img width="80" src="{%=file.thumbnail_url%}"></a>
            {% } %}</td>
            <td class="name">
            <a href="{%=file.url%}" title="{%=file.name%}">{%=file.name%}</a>
            <hr>
            {% if (file.deleteid) { %}
            <div class="control-group">
            <div class="controls">
            <div class="input-prepend">
            <form class="form-inline" style="margin:0">
            <input type="hidden" name="alphaid" value="{%=file.alphaid%}">
            <input type="hidden" name="deleteid" value="{%=file.deleteid%}">
            <span class="add-on"><i class="icon-pencil"></i></span>
            <input class="span3" id="prependedInput" size="16" maxlength="128" type="text" name="title" placeholder="Add some title..." autocomplete="off">
            <button class="btn disabled" id="savetitle" data-loading-text="loading..." data-complete-text="Title saved" disabled>Save</button>
            </form>
            </div>
            </div>
            </div>
            {% } %}
            <div class="control-group">
            <div class="controls">
            <div class="input-prepend">
            <span class="add-on"><i class="icon-share-alt"></i></span>
            <input class="span3 links" id="prependedInput" size="16" type="text" value="{%=file.url%}" onfocus="this.select();">

            <div id="linkspopovercontent" style="display:none">


            <div class="control-group">
            <label class="control-label" for="prependedInput">Direct Link (email &amp; IM)</label>
            <div class="controls">
            <div class="input-prepend">
            <span class="add-on"><i class="icon-share-alt"></i></span>
            <input class="span3" id="prependedInput" size="16" type="text" value="<?php echo $upload_url;?>{%=file.alphaid%}{%=file.extension%}" onfocus="this.select();">
            </div>
            </div>
            </div>				
            <div class="control-group">
            <label class="control-label" for="prependedInput">Linked BB-Code (forums)</label>
            <div class="controls">
            <div class="input-prepend">
            <span class="add-on"><i class="icon-share-alt"></i></span>
            <input class="span3" id="prependedInput" size="16" type="text" value="[URL=<?php echo $upload_url;?>{%=file.alphaid%}][IMG]<?php echo $upload_url;?>{%=file.alphaid%}{%=file.extension%}[/IMG][/URL]" onfocus="this.select();">
            </div>
            </div>
            </div>
            <div class="control-group">
            <label class="control-label" for="prependedInput">HTML (websites)</label>
            <div class="controls">
            <div class="input-prepend">
            <span class="add-on"><i class="icon-share-alt"></i></span>
            <input class="span3" id="prependedInput" size="16" type="text" value="&lt;a href=&quot;<?php echo $upload_url;?>{%=file.alphaid%}&quot;&gt;&lt;img src=&quot;<?php echo $upload_url;?>{%=file.alphaid%}{%=file.extension%}&quot; alt=&quot;&quot; title=&quot;Hosted by epvpimg.com&quot; /&gt;&lt;/a&gt;" onfocus="this.select();">
            </div>
            </div>
            </div>
            </div>

            </div>
            </div>
            </div>
            </td>
            <td class="size">{%=o.formatFileSize(file.size)%}</td>
            <td colspan="2"></td>
            {% } %}
            <td class="delete">
            <button class="btn btn-danger" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}">
            <i class="icon-trash icon-white"></i> {%=locale.fileupload.destroy%}
            </button>
            <input type="checkbox" name="delete" value="1">
            </td>
            </tr>
            {% } %}
        </script>

        <script src="<?php echo $assets_url;?>css/jquery.min.js"></script>
        <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
        <script src="<?php echo $assets_url;?>css/jquery.ui.widget.js"></script>
        <!-- The Templates plugin is included to render the upload/download listings -->
        <script src="<?php echo $assets_url;?>css/tmpl.min.js"></script>
        <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
        <script src="<?php echo $assets_url;?>css/load-image.min.js"></script>
        <!-- The Canvas to Blob plugin is included for image resizing functionality -->
        <script src="<?php echo $assets_url;?>css/canvas-to-blob.min.js"></script>
        <!-- Bootstrap JS and Bootstrap Image Gallery are not required, but included for the demo -->
        <script src="<?php echo $assets_url;?>css/bootstrap.min.js"></script>
        <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
        <script src="<?php echo $assets_url;?>css/jquery.iframe-transport.js"></script>
        <!-- The basic File Upload plugin -->
        <script src="<?php echo $assets_url;?>css/jquery.fileupload.js"></script>
        <!-- The File Upload file processing plugin -->
        <script src="<?php echo $assets_url;?>css/jquery.fileupload-fp.js"></script>
        <!-- The File Upload user interface plugin -->
        <script src="<?php echo $assets_url;?>css/jquery.fileupload-ui.js"></script>
        <!-- The localization script -->
        <script src="<?php echo $assets_url;?>css/locale.js"></script>
        <!-- The main application script -->
        <script src="<?php echo $assets_url;?>css/main.js"></script>
        <script src="<?php echo $assets_url;?>css/misc.js"></script>
        <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
        <!--[if gte IE 8]><script src="js/cors/jquery.xdr-transport.js"></script><![endif]-->
        <script type="text/javascript">/* <![CDATA[ */(function (d, s, a, i, j, r, l, m, t) {
                try {
                    l = d.getElementsByTagName('a');
                    t = d.createElement('textarea');
                    for (i = 0; l.length - i; i++) {
                        try {
                            a = l[i].href;
                            s = a.indexOf('/cdn-cgi/l/email-protection');
                            m = a.length;
                            if (a && s > -1 && m > 28) {
                                j = 28 + s;
                                s = '';
                                if (j < m) {
                                    r = '0x' + a.substr(j, 2) | 0;
                                    for (j += 2; j < m && a.charAt(j) != 'X'; j += 2)
                                        s += '%' + ('0' + ('0x' + a.substr(j, 2) ^ r).toString(16)).slice(-2);
                                    j++;
                                    s = decodeURIComponent(s) + a.substr(j, m - j)
                                }
                                t.innerHTML = s.replace(/</g, '&lt;').replace(/>/g, '&gt;');
                                l[i].href = 'mailto:' + t.value
                            }
                        } catch (e) {
                        }
                    }
                } catch (e) {
                }
            })(document);/* ]]> */</script> 
    </body></html>