!function(a){a.widget("ui.combobox",{_create:function(){var b=this,c=this.element.hide(),d=c.children(":selected"),e=d.val()?d.text():"",f=d.attr("class")||"",g=this.input=a("<input>").insertAfter(c).val(e).addClass("input-text").autocomplete({delay:0,minLength:0,appendTo:a(c).parent(),source:function(b,d){var e=new RegExp(a.ui.autocomplete.escapeRegex(b.term),"i");d(c.children("option").map(function(){var c=a(this).text();return!this.value||b.term&&!e.test(c)?void 0:{label:c.replace(new RegExp("(?![^&;]+;)(?!<[^<>]*)("+a.ui.autocomplete.escapeRegex(b.term)+")(?![^<>]*>)(?![^&;]+;)","gi"),"<strong>$1</strong>"),value:c,option:this}}))},select:function(c,d){a(g).addClass("send-disabled");for(var e=(a(g).parent().attr("class")||"").split(" "),f=e.length;f>0;)f--,e[f].indexOf("color-")>-1&&a(g).parent().removeClass(e[f]);a(g).parent().addClass(a(d.item.option).attr("class")||""),d.item.option.selected=!0,b._trigger("selected",c,{item:d.item.option}),a(this).hasClass("disabled")&&a(this).blur(),a(".item-form").removeClass("error"),a(".form-feedback").slideUp("fast").html(""),"archive-dropdown"==a(d.item.option).parent().attr("name")?(document.location.href=a(d.item.option).val()):"uf"==a(d.item.option).parent().attr("name")?atlantidaBlogs.ChangeState(a(d.item.option).val()):"edicoes"==a(d.item.option).parent().attr("name")&&atlantidaBlogs.ChangeEdition(a(d.item.option).val())},change:function(b,d){if(!d||!d.item){var h,e=new RegExp("^"+a.ui.autocomplete.escapeRegex(a(this).val())+"$","i"),f=!1;c.children("option").each(function(){return a(this).text().match(e)?(this.selected=f=!0,h=this,!1):void 0}),f?"archive-dropdown"==a(c).attr("name")?(document.location.href=a(h).val()):"uf"==a(c).attr("name")?atlantidaBlogs.ChangeState(a(h).val()):"edicoes"==a(c).attr("name")&&atlantidaBlogs.ChangeEdition(a(h).val()):(a(this).val(""),a(this).addClass("empty"),c.val(""),g.data("ui-autocomplete").term="")}}}).click(function(){return g.autocomplete("widget").is(":visible")?(g.autocomplete("close"),void 0):(g.autocomplete("search",""),void 0)});g.data("ui-autocomplete")._renderItem=function(b,c){return a('<li class="'+(a(c.option).attr("class")||"")+'"></li>').data("ui-autocomplete-item",c).append("<a>"+c.label+"</a>").appendTo(b)},a(g).parent().addClass(f),""==e&&a(this).addClass("empty"),a(c).hasClass("ghost-mask")&&a(g).addClass("ghost-mask"),a(c).hasClass("disabled")&&(a(g).attr("readonly","readonly"),a(g).addClass("disabled"),a(g).addClass("not-selectable")),a(c).attr("mask")&&""!=a(c).attr("mask")&&a(g).attr("mask",a(c).attr("mask")),this.button=a('<a href="javascript:;">&nbsp;</a>').insertAfter(g).button({icons:{primary:"ui-icon-triangle-1-s"},text:!1}).attr("tabIndex",-1).removeClass("ui-corner-all").addClass("ui-button-icon").removeAttr("title").click(function(){return g.autocomplete("widget").is(":visible")?(g.autocomplete("close"),void 0):(a(this).blur(),g.autocomplete("search",""),g.focus(),void 0)})},destroy:function(){this.input.remove(),this.button.remove(),this.element.show(),a.Widget.prototype.destroy.call(this)}})}(jQuery);