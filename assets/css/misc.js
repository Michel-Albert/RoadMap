$(function(){var closepopover;var closepopovertimer;$(document).on("click","#savetitle",function(event){event.preventDefault();$(this).button("loading");var that=this;$.post("upload/",$(this).parent().serialize(),function(data){setTimeout(function(){$(that).text("Title saved");$(that).addClass("disabled");$(that).attr("disabled","disabled");},1000);});});$(document).on("keyup","input[name=title]",function(event){if(event.keyCode!=13){$(this).next("button").text("Save");$(this).next("button").removeClass("disabled");$(this).next("button").removeAttr("disabled");}});$(document).on("mouseenter",".links",function(){$(".links").popover({trigger:'manual',html:true,placement:'right',template:'<div class="popover" onmouseover="$(this).mouseleave(function() { $(\'.links\').popover(\'hide\'); closepopover = true; });"><div class="arrow"></div><div class="popover-inner" style="width:325px"><div class="popover-content"><p></p></div></div></div>',content:function(){return $(this).next().html();}});clearTimeout(closepopovertimer);$(this).popover('show');closepopover=true;});$(document).on("mouseleave",".links",function(){var that=this;closepopovertimer=setTimeout(function(){if(closepopover){$('.links').popover('hide');}},800);});$(document).on("mouseenter",".popover",function(){closepopover=false;});});