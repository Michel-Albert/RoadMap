    <script>
        var image_obj;
        $(document).ready(function(){
            if(selected_menu!="")
                $("a:contains("+selected_menu+")").addClass("btn-default");
        })
        function open_image(obj)
        {           
            image_obj=obj;
            var div_str="";
            div_str+="<img class='img-responsive' style='width:100%;' src='";
            div_str+=$(obj).attr("src");
            div_str+="'/>";
            $("#max_image").html(div_str);
            $("#max_image").show();
        }
        function next_image_show()
        {
            var next_div=$(image_obj).parent().next();
            var last_div=$(image_obj).parent().parent().children().last();
            if(next_div!=last_div)
                obj=next_div.find("img");
            image_obj=obj;
            var div_str="";
            div_str+="<img class='img-responsive' style='width:100%;' src='";
            div_str+=$(obj).attr("src");
            div_str+="'/>";
            $("#max_image").html(div_str);
            $("#max_image").show();
        }
        function max_image_hide(){
            $("#max_image").hide();
        }
        function div_image_mouseenter(obj)
        {
            $(".thumbnail").find("#button_div").remove();
            var button_td_html="<div id='button_div' style='position:absolute;bottom:5%;right:5%;'>";
            button_td_html+="<button type='button' class='btn btn-warning' onclick='button_detlete_image(this);'>Delete</button></div>";
            $(obj).append(button_td_html);            
        }
        
        function product_image_mouseenter(obj)
        {
            $(".product").find("#button_div").remove();
            var button_td_html="<div id='button_div' style='position:absolute;bottom:5%;right:5%;'>";
            button_td_html+="<button type='button' class='btn btn-warning' onclick='button_detlete_image(this);'>Delete</button></div>";
            $(obj).append(button_td_html);            
        }
        function button_detlete_image(obj)
        {
            var url=$(obj).parent().parent().find("img").attr("src");
            $.post("<?php echo site_url("image/delete");?>",
            {
                url:url
            },
            function(result)
            {
                $(obj).parent().parent().remove();
            }
            ,"json"
            )
        }
    function register_validation()
    {
        $(".alert-info").html("");
        if($("#name").val().length < 5) 
        {
            $(".alert-info").html("Name length must be more than 5");
        }
        else if($("#email").val().length < 5) 
        {
            $(".alert-info").html("Email length must be more than 5");
        }
        else if($("#username").val().length < 5)
        {
            $(".alert-info").html("User name length must be more than 5");
        }
        else if($("#password").val().length < 5)
        {
            $(".alert-info").html("Password length must be more than 5");
        }
        else if($("#password").val()!=$("#confirm").val())
        {
            $(".alert-info").html("Passwords don't match");
        }
        else
        {
            $.post("<?php echo site_url("user/register_ok");?>",
            {
                name: $("#name").val(),
                email:$("#email").val(),
                username: $("#username").val(),
                password:$("#password").val(),
            },
            function(result){
                if(result=="ok")
                    window.location.href="<?php echo site_url("user/login");?>";
                else
                    $(".alert-info").html(result);
            }
            ,"json"
            );
        }   
    }
    function login_validation()
    {
        $(".alert-info").html("");
        if($("#email").val()=="") 
        {
            $(".alert-info").html("Email length must be more than 5");
        }
        else if($("#password").val()=="")
        {
            $(".alert-info").html("Passwords don't match");
        }
        else
        {
            $.post("<?php echo site_url("user/login_ok");?>",
            {
                email:$("#email").val(),
                password:$("#password").val(),
            },
            function(result){
                if(result=="ok")
                {
                    window.location.href="<?php echo site_url("image/mine");?>";
                }
                else
                {
                    $(".alert-info").html(result);
                }
            }
            ,"json"
            );
        }   
    }
    function tr_users_mouseenter(obj,i)
    {
        $(obj).parent().children().each(function(){
            $(this).children().last().html("");
        })
        var button_td_html="<button type='button' class='btn btn-warning delete' onclick='button_delete_user(this)'>Delete</button>";
        $(obj).children().last().html(button_td_html);
    }
    function button_delete_user(obj)
    {
        var username=$(obj).parent().parent().find("#td_user_name").html();
        if(confirm("Are you sure to delete this user?"))
        {
            $.post("<?php echo site_url("user/delete");?>",
            {
                username:username
            },
            function(result)
            {
//                if(result=="ok")
//                {
//                    alert(username+" has been deleted");
                    $(obj).parent().parent().remove();
//                }
//                else
//                    alert("An error has happened");
//                window.location.href="<?php echo site_url("user");?>";
            },"json")
        }
    }
    function admin_authority(obj)
    {
        var username=$(obj).parent().parent().parent().parent().find("#td_user_name").html();
        $.post("<?php echo site_url("user/authority");?>",
        {
            username:username
        },
        function(result)
        {
        },"json")
    }
    </script>