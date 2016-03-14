/**
* select2.js
* Copyright 2012 Igor Vaynberg
* http://www.apache.org/licenses/LICENSE-2.0.txt
*/(function(e){typeof e.fn.each2=="undefined"&&e.fn.extend({each2:function(t){var n=e([0]),r=-1,i=this.length;while(++r<i&&(n.context=n[0]=this[r])&&t.call(n[0],r,n)!==!1);return this}})})(jQuery),function(e,t){"use strict";function n(e){return e&&typeof e=="string"?e.replace("&","&amp;"):e}function r(e,t){var n=0,r=t.length,i;if(typeof e=="undefined")return-1;if(e.constructor===String){for(;n<r;n+=1)if(e.localeCompare(t[n])===0)return n}else for(;n<r;n+=1){i=t[n];if(i.constructor===String){if(i.localeCompare(e)===0)return n}else if(i===e)return n}return-1}function i(e,n){return e===n?!0:e===t||n===t?!1:e===null||n===null?!1:e.constructor===String?e.localeCompare(n)===0:n.constructor===String?n.localeCompare(e)===0:!1}function s(t,n){var r,i,s;if(t===null||t.length<1)return[];r=t.split(n);for(i=0,s=r.length;i<s;i+=1)r[i]=e.trim(r[i]);return r}function o(e){return e.outerWidth()-e.width()}function u(n){var r="keyup-change-value";n.bind("keydown",function(){e.data(n,r)===t&&e.data(n,r,n.val())}),n.bind("keyup",function(){var i=e.data(n,r);i!==t&&n.val()!==i&&(e.removeData(n,r),n.trigger("keyup-change"))})}function a(n){n.bind("mousemove",function(n){var r=e.data(document,"select2-lastpos");(r===t||r.x!==n.pageX||r.y!==n.pageY)&&e(n.target).trigger("mousemove-filtered",n)})}function f(e,t){var n;return function(){window.clearTimeout(n),n=window.setTimeout(t,e)}}function l(e){var t=!1,n;return function(){return t===!1&&(n=e(),t=!0),n}}function c(e,t){var n=f(e,function(e){t.trigger("scroll-debounced",e)});t.bind("scroll",function(e){r(e.target,t.get())>=0&&n(e)})}function h(e){e.preventDefault(),e.stopPropagation()}function p(t){if(!N){var n=t[0].currentStyle||window.getComputedStyle(t[0],null);N=e("<div></div>").css({position:"absolute",left:"-10000px",top:"-10000px",display:"none",fontSize:n.fontSize,fontFamily:n.fontFamily,fontStyle:n.fontStyle,fontWeight:n.fontWeight,letterSpacing:n.letterSpacing,textTransform:n.textTransform,whiteSpace:"nowrap"}),e("body").append(N)}return N.text(t.val()),N.width()}function d(e,t,n){var r=e.toUpperCase().indexOf(t.toUpperCase()),i=t.length;if(r<0){n.push(e);return}n.push(e.substring(0,r)),n.push("<span class='select2-match'>"),n.push(e.substring(r,r+i)),n.push("</span>"),n.push(e.substring(r+i,e.length))}function v(t){var n,r=0,i=null,s=t.quietMillis||100;return function(o){window.clearTimeout(n),n=window.setTimeout(function(){r+=1;var n=r,s=t.data,u=t.transport||e.ajax,a=t.type||"GET";s=s.call(this,o.term,o.page,o.context),null!==i&&i.abort(),i=u.call(null,{url:t.url,dataType:t.dataType,data:s,type:a,success:function(e){if(n<r)return;var i=t.results(e,o.page);o.callback(i)}})},s)}}function m(t){var n=t,r,i=function(e){return""+e.text};return e.isArray(n)||(i=n.text,e.isFunction(i)||(r=n.text,i=function(e){return e[r]}),n=n.results),function(t){var r=t.term,s={};if(r===""){t.callback({results:n});return}s.results=e(n).filter(function(){return t.matcher(r,i(this))}).get(),t.callback(s)}}function g(n){return e.isFunction(n)?n:function(r){var i=r.term,s={results:[]};e(n).each(function(){var e=this.text!==t,n=e?this.text:this;(i===""||r.matcher(i,n))&&s.results.push(e?this:{id:this,text:this})}),r.callback(s)}}function y(t){return e.isFunction(t)?t():t}function b(t,n){var r=function(){};return r.prototype=new t,r.prototype.constructor=r,r.prototype.parent=t.prototype,r.prototype=e.extend(r.prototype,n),r}if(window.Select2!==t)return;var w,E,S,x,T,N;w={TAB:9,ENTER:13,ESC:27,SPACE:32,LEFT:37,UP:38,RIGHT:39,DOWN:40,SHIFT:16,CTRL:17,ALT:18,PAGE_UP:33,PAGE_DOWN:34,HOME:36,END:35,BACKSPACE:8,DELETE:46,isArrow:function(e){e=e.which?e.which:e;switch(e){case w.LEFT:case w.RIGHT:case w.UP:case w.DOWN:return!0}return!1},isControl:function(e){e=e.which?e.which:e;switch(e){case w.SHIFT:case w.CTRL:case w.ALT:return!0}return e.metaKey?!0:!1},isFunctionKey:function(e){return e=e.which?e.which:e,e>=112&&e<=123}},T=function(){var e=1;return function(){return e++}}(),e(document).delegate("*","mousemove",function(t){e.data(document,"select2-lastpos",{x:t.pageX,y:t.pageY})}),e(document).ready(function(){e(document).delegate("*","mousedown touchend",function(n){var r=e(n.target).closest("div.select2-container").get(0),i;r?e(document).find("div.select2-container-active").each(function(){this!==r&&e(this).data("select2").blur()}):(r=e(n.target).closest("div.select2-drop").get(0),e(document).find("div.select2-drop-active").each(function(){this!==r&&e(this).data("select2").blur()})),r=e(n.target),i=r.attr("for"),"LABEL"===n.target.tagName&&i&&i.length>0&&(r=e("#"+i),r=r.data("select2"),r!==t&&(r.focus(),n.preventDefault()))})}),E=b(Object,{bind:function(e){var t=this;return function(){e.apply(t,arguments)}},init:function(n){var r,i,s=".select2-results";this.opts=n=this.prepareOpts(n),this.id=n.id,n.element.data("select2")!==t&&n.element.data("select2")!==null&&this.destroy(),this.enabled=!0,this.container=this.createContainer(),this.body=l(function(){return n.element.closest("body")}),n.element.attr("class")!==t&&this.container.addClass(n.element.attr("class")),this.container.css(y(n.containerCss)),this.container.addClass(y(n.containerCssClass)),this.opts.element.data("select2",this).hide().after(this.container),this.container.data("select2",this),this.dropdown=this.container.find(".select2-drop"),this.dropdown.css(y(n.dropdownCss)),this.dropdown.addClass(y(n.dropdownCssClass)),this.dropdown.data("select2",this),this.results=r=this.container.find(s),this.search=i=this.container.find("input.select2-input"),i.attr("tabIndex",this.opts.element.attr("tabIndex")),this.resultsPage=0,this.context=null,this.initContainer(),this.initContainerWidth(),a(this.results),this.dropdown.delegate(s,"mousemove-filtered",this.bind(this.highlightUnderEvent)),c(80,this.results),this.dropdown.delegate(s,"scroll-debounced",this.bind(this.loadMoreIfNeeded)),e.fn.mousewheel&&r.mousewheel(function(e,t,n,i){var s=r.scrollTop(),o;i>0&&s-i<=0?(r.scrollTop(0),h(e)):i<0&&r.get(0).scrollHeight-r.scrollTop()+i<=r.height()&&(r.scrollTop(r.get(0).scrollHeight-r.height()),h(e))}),u(i),i.bind("keyup-change",this.bind(this.updateResults)),i.bind("focus",function(){i.addClass("select2-focused"),i.val()===" "&&i.val("")}),i.bind("blur",function(){i.removeClass("select2-focused")}),this.dropdown.delegate(s,"click",this.bind(function(t){e(t.target).closest(".select2-result-selectable:not(.select2-disabled)").length>0?(this.highlightUnderEvent(t),this.selectHighlighted(t)):this.focusSearch(),h(t)})),this.dropdown.bind("click mouseup mousedown",function(e){e.stopPropagation()}),e.isFunction(this.opts.initSelection)&&(this.initSelection(),this.monitorSource()),n.element.is(":disabled")&&this.disable()},destroy:function(){var e=this.opts.element.data("select2");e!==t&&(e.container.remove(),e.dropdown.remove(),e.opts.element.removeData("select2").unbind(".select2").show())},prepareOpts:function(r){var o,u,a;o=r.element,o.get(0).tagName.toLowerCase()==="select"&&(this.select=u=r.element),r.separator=r.separator||",",u&&e.each(["id","multiple","ajax","query","createSearchChoice","initSelection","data","tags"],function(){if(this in r)throw new Error("Option '"+this+"' is not allowed for Select2 when attached to a <select> element.")}),r=e.extend({},{populateResults:function(i,s,o){var u,a,f,l,c=this.opts.id;u=function(i,s,a){var f,l,h,p,d,v,m,g,y;for(f=0,l=i.length;f<l;f+=1)h=i[f],p=c(h)!==t,d="children"in h&&h.children.length>0,v=e("<li></li>"),v.addClass("select2-results-dept-"+a),v.addClass("select2-result"),v.addClass(p?"select2-result-selectable":"select2-result-unselectable"),d&&v.addClass("select2-result-with-children"),m=e("<div></div>"),m.addClass("select2-result-label"),y=r.formatResult(h,m,o),y!==t&&m.html(n(y)),v.append(m),d&&(g=e("<ul></ul>"),g.addClass("select2-result-sub"),u(h.children,g,a+1),v.append(g)),v.data("select2-data",h),s.append(v)},u(s,i,0)}},e.fn.select2.defaults,r),typeof r.id!="function"&&(a=r.id,r.id=function(e){return e[a]}),u?(r.query=this.bind(function(n){var r={results:[],more:!1},i=n.term,s,u,a;a=function(e,t){var r;e.is("option")?n.matcher(i,e.text(),e)&&t.push({id:e.attr("value"),text:e.text(),element:e.get()}):e.is("optgroup")&&(r={text:e.attr("label"),children:[],element:e.get()},e.children().each2(function(e,t){a(t,r.children)}),r.children.length>0&&t.push(r))},s=o.children(),this.getPlaceholder()!==t&&s.length>0&&(u=s[0],e(u).text()===""&&(s=s.not(u))),s.each2(function(e,t){a(t,r.results)}),n.callback(r)}),r.id=function(e){return e.id}):"query"in r||("ajax"in r?r.query=v(r.ajax):"data"in r?r.query=m(r.data):"tags"in r&&(r.query=g(r.tags),r.createSearchChoice=function(e){return{id:e,text:e}},r.initSelection=function(t,n){var o=[];e(s(t.val(),r.separator)).each(function(){var t=this,n=this,s=r.tags;e.isFunction(s)&&(s=s()),e(s).each(function(){if(i(this.id,t))return n=this.text,!1}),o.push({id:t,text:n})}),n(o)}));if(typeof r.query!="function")throw"query function not defined for Select2 "+r.element.attr("id");return r},monitorSource:function(){this.opts.element.bind("change.select2",this.bind(function(e){this.opts.element.data("select2-change-triggered")!==!0&&this.initSelection()}))},triggerChange:function(t){t=t||{},t=e.extend({},t,{type:"change",val:this.val()}),this.opts.element.data("select2-change-triggered",!0),this.opts.element.trigger(t),this.opts.element.data("select2-change-triggered",!1),this.opts.element.click()},enable:function(){if(this.enabled)return;this.enabled=!0,this.container.removeClass("select2-container-disabled")},disable:function(){if(!this.enabled)return;this.close(),this.enabled=!1,this.container.addClass("select2-container-disabled")},opened:function(){return this.container.hasClass("select2-dropdown-open")},positionDropdown:function(){var t=this.container.offset(),n=this.container.outerHeight(),r=this.container.outerWidth(),i=this.dropdown.outerHeight(),s=e(window).scrollTop()+document.documentElement.clientHeight,o=t.top+n,u=o+i<=s,a=t.top-i>=this.body().scrollTop(),f=this.dropdown.hasClass("select2-drop-above"),l,c;f?(l=!0,!a&&u&&(l=!1)):(l=!1,!u&&a&&(l=!0)),l?(o=t.top-i,this.container.addClass("select2-drop-above"),this.dropdown.addClass("select2-drop-above")):(this.container.removeClass("select2-drop-above"),this.dropdown.removeClass("select2-drop-above")),c={top:o,left:t.left,width:r},this.dropdown.css(c)},shouldOpen:function(){var e;return this.opened()?!1:(e=jQuery.Event("open"),this.opts.element.trigger(e),!e.isDefaultPrevented())},clearDropdownAlignmentPreference:function(){this.container.removeClass("select2-drop-above"),this.dropdown.removeClass("select2-drop-above")},open:function(){return this.shouldOpen()?(window.setTimeout(this.bind(this.opening),1),!0):!1},opening:function(){this.clearDropdownAlignmentPreference(),this.search.val()===" "&&this.search.val(""),this.dropdown.addClass("select2-drop-active"),this.container.addClass("select2-dropdown-open").addClass("select2-container-active"),this.updateResults(!0),this.dropdown[0]!==this.body().children().last()[0]&&this.dropdown.detach().appendTo(this.body()),this.dropdown.show(),this.ensureHighlightVisible(),this.positionDropdown(),this.focusSearch()},close:function(){if(!this.opened())return;this.clearDropdownAlignmentPreference(),this.dropdown.hide(),this.container.removeClass("select2-dropdown-open").removeClass("select2-container-active"),this.results.empty(),this.clearSearch(),this.opts.element.trigger(jQuery.Event("close"))},clearSearch:function(){},ensureHighlightVisible:function(){var t=this.results,n,r,i,s,o,u,a;r=this.highlight();if(r<0)return;if(r==0){t.scrollTop(0);return}n=t.find(".select2-result-selectable"),i=e(n[r]),s=i.offset().top+i.outerHeight(),r===n.length-1&&(a=t.find("li.select2-more-results"),a.length>0&&(s=a.offset().top+a.outerHeight())),o=t.offset().top+t.outerHeight(),s>o&&t.scrollTop(t.scrollTop()+(s-o)),u=i.offset().top-t.offset().top,u<0&&t.scrollTop(t.scrollTop()+u)},moveHighlight:function(t){var n=this.results.find(".select2-result-selectable"),r=this.highlight();while(r>-1&&r<n.length){r+=t;var i=e(n[r]);if(i.hasClass("select2-result-selectable")&&!i.hasClass("select2-disabled")){this.highlight(r);break}}},highlight:function(t){var n=this.results.find(".select2-result-selectable").not(".select2-disabled");if(arguments.length===0)return r(n.filter(".select2-highlighted")[0],n.get());t>=n.length&&(t=n.length-1),t<0&&(t=0),n.removeClass("select2-highlighted"),e(n[t]).addClass("select2-highlighted"),this.ensureHighlightVisible()},countSelectableResults:function(){return this.results.find(".select2-result-selectable").not(".select2-disabled").length},highlightUnderEvent:function(t){var n=e(t.target).closest(".select2-result-selectable");if(n.length>0&&!n.is(".select2-highlighted")){var r=this.results.find(".select2-result-selectable");this.highlight(r.index(n))}else n.length==0&&this.results.find(".select2-highlighted").removeClass("select2-highlighted")},loadMoreIfNeeded:function(){var e=this.results,t=e.find("li.select2-more-results"),n,r=-1,i=this.resultsPage+1,s=this,o=this.search.val(),u=this.context;if(t.length===0)return;n=t.offset().top-e.offset().top-e.height(),n<=0&&(t.addClass("select2-active"),this.opts.query({term:o,page:i,context:u,matcher:this.opts.matcher,callback:this.bind(function(n){s.opts.populateResults.call(this,e,n.results,{term:o,page:i,context:u}),n.more===!0?(t.detach().appendTo(e.children(":last")).text(s.opts.formatLoadMore(i+1)),window.setTimeout(function(){s.loadMoreIfNeeded()},10)):t.remove(),s.positionDropdown(),s.resultsPage=i})}))},updateResults:function(r){function s(){a.scrollTop(0),u.removeClass("select2-active"),c.positionDropdown()}function o(e){a.html(n(e)),s()}var u=this.search,a=this.results,f=this.opts,l,c=this;if(r!==!0&&(this.showSearchInput===!1||!this.opened()))return;u.addClass("select2-active");if(f.maximumSelectionSize>=1){l=this.data();if(e.isArray(l)&&l.length>=f.maximumSelectionSize){o("<li class='select2-selection-limit'>"+f.formatSelectionTooBig(f.maximumSelectionSize)+"</li>");return}}if(u.val().length<f.minimumInputLength){o("<li class='select2-no-results'>"+f.formatInputTooShort(u.val(),f.minimumInputLength)+"</li>");return}this.resultsPage=1,f.query({term:u.val(),page:this.resultsPage,context:null,matcher:f.matcher,callback:this.bind(function(l){var h;this.context=l.context===t?null:l.context,this.opts.createSearchChoice&&u.val()!==""&&(h=this.opts.createSearchChoice.call(null,u.val(),l.results),h!==t&&h!==null&&c.id(h)!==t&&c.id(h)!==null&&e(l.results).filter(function(){return i(c.id(this),c.id(h))}).length===0&&l.results.unshift(h));if(l.results.length===0){o("<li class='select2-no-results'>"+f.formatNoMatches(u.val())+"</li>");return}a.empty(),c.opts.populateResults.call(this,a,l.results,{term:u.val(),page:this.resultsPage,context:null}),l.more===!0&&(a.children().filter(":last").append("<li class='select2-more-results'>"+n(f.formatLoadMore(this.resultsPage))+"</li>"),window.setTimeout(function(){c.loadMoreIfNeeded()},10)),this.postprocessResults(l,r),s()})})},cancel:function(){this.close()},blur:function(){this.close(),this.container.removeClass("select2-container-active"),this.dropdown.removeClass("select2-drop-active"),this.search[0]===document.activeElement&&this.search.blur(),this.clearSearch(),this.selection.find(".select2-search-choice-focus").removeClass("select2-search-choice-focus")},focusSearch:function(){window.setTimeout(this.bind(function(){this.search.focus(),this.search.val(this.search.val())}),10)},selectHighlighted:function(){var e=this.highlight(),t=this.results.find(".select2-highlighted").not(".select2-disabled"),n=t.closest(".select2-result-selectable").data("select2-data");n&&(t.addClass("select2-disabled"),this.highlight(e),this.onSelect(n))},getPlaceholder:function(){return this.opts.element.attr("placeholder")||this.opts.element.attr("data-placeholder")||this.opts.element.data("placeholder")||this.opts.placeholder},initContainerWidth:function(){function n(){var n,r,i,s,o;if(this.opts.width==="off")return null;if(this.opts.width==="element")return this.opts.element.outerWidth()===0?"auto":this.opts.element.outerWidth()+"px";if(this.opts.width==="copy"||this.opts.width==="resolve"){n=this.opts.element.attr("style");if(n!==t){r=n.split(";");for(s=0,o=r.length;s<o;s+=1){i=r[s].replace(/\s/g,"").match(/width:(([-+]?([0-9]*\.)?[0-9]+)(px|em|ex|%|in|cm|mm|pt|pc))/);if(i!==null&&i.length>=1)return i[1]}}return this.opts.width==="resolve"?(n=this.opts.element.css("width"),n.indexOf("%")>0?n:this.opts.element.outerWidth()===0?"auto":this.opts.element.outerWidth()+"px"):null}return e.isFunction(this.opts.width)?this.opts.width():this.opts.width}var r=n.call(this);r!==null&&this.container.attr("style","width: "+r)}}),S=b(E,{createContainer:function(){var t=e("<div></div>",{"class":"select2-container"}).html(["    <a href='javascript:void(0)' class='select2-choice'>","   <span></span><abbr class='select2-search-choice-close' style='display:none;'></abbr>","   <div><b></b></div>","</a>","    <div class='select2-drop select2-offscreen'>","   <div class='select2-search'>","       <input type='text' autocomplete='off' class='select2-input'/>","   </div>","   <ul class='select2-results'>","   </ul>","</div>"].join(""));return t},opening:function(){this.search.show(),this.parent.opening.apply(this,arguments),this.dropdown.removeClass("select2-offscreen")},close:function(){if(!this.opened())return;this.parent.close.apply(this,arguments),this.dropdown.removeAttr("style").addClass("select2-offscreen").insertAfter(this.selection).show()},focus:function(){this.close(),this.selection.focus()},isFocused:function(){return this.selection[0]===document.activeElement},cancel:function(){this.parent.cancel.apply(this,arguments),this.selection.focus()},initContainer:function(){var e,t=this.container,n=this.dropdown,r=!1;this.selection=e=t.find(".select2-choice"),this.search.bind("keydown",this.bind(function(e){if(!this.enabled)return;if(e.which===w.PAGE_UP||e.which===w.PAGE_DOWN){h(e);return}if(this.opened())switch(e.which){case w.UP:case w.DOWN:this.moveHighlight(e.which===w.UP?-1:1),h(e);return;case w.TAB:case w.ENTER:this.selectHighlighted(),h(e);return;case w.ESC:this.cancel(e),h(e);return}else{if(e.which===w.TAB||w.isControl(e)||w.isFunctionKey(e)||e.which===w.ESC)return;this.open();if(e.which===w.ENTER)return}})),this.search.bind("focus",this.bind(function(){this.selection.attr("tabIndex","-1")})),this.search.bind("blur",this.bind(function(){this.opened()||this.container.removeClass("select2-container-active"),window.setTimeout(this.bind(function(){this.selection.attr("tabIndex",this.opts.element.attr("tabIndex"))}),10)})),e.bind("click",this.bind(function(e){r=!0,this.opened()?(this.close(),this.selection.focus()):this.enabled&&this.open(),h(e),r=!1})),n.bind("click",this.bind(function(){this.search.focus()})),e.bind("focus",this.bind(function(){this.container.addClass("select2-container-active"),this.search.attr("tabIndex","-1")})),e.bind("blur",this.bind(function(){this.container.removeClass("select2-container-active"),window.setTimeout(this.bind(function(){this.search.attr("tabIndex",this.opts.element.attr("tabIndex"))}),10)})),e.bind("keydown",this.bind(function(e){if(!this.enabled)return;if(e.which===w.PAGE_UP||e.which===w.PAGE_DOWN){h(e);return}if(e.which===w.TAB||w.isControl(e)||w.isFunctionKey(e)||e.which===w.ESC)return;this.open();if(e.which===w.ENTER){h(e);return}if(e.which<48){h(e);return}var t=String.fromCharCode(e.which).toLowerCase();e.shiftKey&&(t=t.toUpperCase()),this.search.val(t),h(e)})),e.delegate("abbr","click",this.bind(function(e){if(!this.enabled)return;this.clear(),h(e),this.close(),this.triggerChange(),this.selection.focus()})),this.setPlaceholder(),this.search.bind("focus",this.bind(function(){this.container.addClass("select2-container-active")}))},clear:function(){this.opts.element.val(""),this.selection.find("span").empty(),this.selection.removeData("select2-data"),this.setPlaceholder()},initSelection:function(){var e;if(this.opts.element.val()==="")this.close(),this.setPlaceholder();else{var n=this;this.opts.initSelection.call(null,this.opts.element,function(e){e!==t&&e!==null&&(n.updateSelection(e),n.close(),n.setPlaceholder())})}},prepareOpts:function(){var t=this.parent.prepareOpts.apply(this,arguments);return t.element.get(0).tagName.toLowerCase()==="select"&&(t.initSelection=function(t,n){var r=t.find(":selected");e.isFunction(n)&&n({id:r.attr("value"),text:r.text()})}),t},setPlaceholder:function(){var e=this.getPlaceholder();if(this.opts.element.val()===""&&e!==t){if(this.select&&this.select.find("option:first").text()!=="")return;this.selection.find("span").html(n(e)),this.selection.addClass("select2-default"),this.selection.find("abbr").hide()}},postprocessResults:function(t,n){var r=0,s=this,o=!0;this.results.find(".select2-result-selectable").each2(function(e,t){if(i(s.id(t.data("select2-data")),s.opts.element.val()))return r=e,!1}),this.highlight(r),n===!0&&(o=this.showSearchInput=t.results.length>=this.opts.minimumResultsForSearch,this.dropdown.find(".select2-search")[o?"removeClass":"addClass"]("select2-search-hidden"),e(this.dropdown,this.container)[o?"addClass":"removeClass"]("select2-with-searchbox"))},onSelect:function(e){var t=this.opts.element.val();this.opts.element.val(this.id(e)),this.updateSelection(e),this.close(),this.selection.focus(),i(t,this.id(e))||this.triggerChange()},updateSelection:function(e){var r=this.selection.find("span"),i;this.selection.data("select2-data",e),r.empty(),i=this.opts.formatSelection(e,r),i!==t&&r.append(n(i)),this.selection.removeClass("select2-default"),this.opts.allowClear&&this.getPlaceholder()!==t&&this.selection.find("abbr").show()},val:function(){var e,n=null,r=this;if(arguments.length===0)return this.opts.element.val();e=arguments[0];if(this.select)this.select.val(e).find(":selected").each2(function(e,t){return n={id:t.attr("value"),text:t.text()},!1}),this.updateSelection(n),this.setPlaceholder();else{if(this.opts.initSelection===t)throw new Error("cannot call val() if initSelection() is not defined");if(!e){this.clear();return}this.opts.initSelection(this.opts.element,function(e){r.opts.element.val(e?r.id(e):""),r.updateSelection(e),r.setPlaceholder()})}},clearSearch:function(){this.search.val("")},data:function(e){var n;if(arguments.length===0)return n=this.selection.data("select2-data"),n==t&&(n=null),n;!e||e===""?this.clear():(this.opts.element.val(e?this.id(e):""),this.updateSelection(e))}}),x=b(E,{createContainer:function(){var t=e("<div></div>",{"class":"select2-container select2-container-multi"}).html(["    <ul class='select2-choices'>","  <li class='select2-search-field'>","    <input type='text' autocomplete='off' style='width: 25px;' class='select2-input'>","  </li>","</ul>","<div class='select2-drop select2-drop-multi' style='display:none;'>","   <ul class='select2-results'>","   </ul>","</div>"].join(""));return t},prepareOpts:function(){var t=this.parent.prepareOpts.apply(this,arguments);return t.element.get(0).tagName.toLowerCase()==="select"&&(t.initSelection=function(t,n){var r=[];t.find(":selected").each2(function(e,t){r.push({id:t.attr("value"),text:t.text()})}),e.isFunction(n)&&n(r)}),t},initContainer:function(){var e=".select2-choices",t;this.searchContainer=this.container.find(".select2-search-field"),this.selection=t=this.container.find(e),this.search.bind("keydown",this.bind(function(e){if(!this.enabled)return;if(e.which===w.BACKSPACE&&this.search.val()===""){this.close();var n,r=t.find(".select2-search-choice-focus");if(r.length>0){this.unselect(r.first()),this.search.width(10),h(e);return}n=t.find(".select2-search-choice"),n.length>0&&n.last().addClass("select2-search-choice-focus")}else t.find(".select2-search-choice-focus").removeClass("select2-search-choice-focus");if(this.opened())switch(e.which){case w.UP:case w.DOWN:this.moveHighlight(e.which===w.UP?-1:1),h(e);return;case w.ENTER:case w.TAB:this.selectHighlighted(),h(e);return;case w.ESC:this.cancel(e),h(e);return}if(e.which===w.TAB||w.isControl(e)||w.isFunctionKey(e)||e.which===w.BACKSPACE||e.which===w.ESC)return;this.open(),(e.which===w.PAGE_UP||e.which===w.PAGE_DOWN)&&h(e)})),this.search.bind("keyup",this.bind(this.resizeSearch)),this.search.bind("blur",this.bind(function(){this.container.removeClass("select2-container-active")})),this.container.delegate(e,"click",this.bind(function(e){if(!this.enabled)return;this.clearPlaceholder(),this.open(),this.focusSearch(),e.preventDefault()})),this.container.delegate(e,"focus",this.bind(function(){if(!this.enabled)return;this.container.addClass("select2-container-active"),this.dropdown.addClass("select2-drop-active"),this.clearPlaceholder()})),this.clearSearch()},enable:function(){if(this.enabled)return;this.parent.enable.apply(this,arguments),this.search.removeAttr("disabled")},disable:function(){if(!this.enabled)return;this.parent.disable.apply(this,arguments),this.search.attr("disabled",!0)},initSelection:function(){var e;this.opts.element.val()===""&&(this.updateSelection([]),this.close(),this.clearSearch());if(this.select||this.opts.element.val()!==""){var n=this;this.opts.initSelection.call(null,this.opts.element,function(e){e!==t&&e!==null&&(n.updateSelection(e),n.close(),n.clearSearch())})}},clearSearch:function(){var e=this.getPlaceholder();e!==t&&this.getVal().length===0&&this.search.hasClass("select2-focused")===!1?(this.search.val(e).addClass("select2-default"),this.resizeSearch()):this.search.val(" ").width(10)},clearPlaceholder:function(){this.search.hasClass("select2-default")?this.search.val("").removeClass("select2-default"):this.search.val()===" "&&this.search.val("")},opening:function(){this.parent.opening.apply(this,arguments),this.clearPlaceholder(),this.resizeSearch(),this.focusSearch()},close:function(){if(!this.opened())return;this.parent.close.apply(this,arguments)},focus:function(){this.close(),this.search.focus()},isFocused:function(){return this.search.hasClass("select2-focused")},updateSelection:function(t){var n=[],i=[],s=this;e(t).each(function(){r(s.id(this),n)<0&&(n.push(s.id(this)),i.push(this))}),t=i,this.selection.find(".select2-search-choice").remove(),e(t).each(function(){s.addSelectedChoice(this)}),s.postprocessResults()},onSelect:function(e){this.addSelectedChoice(e),this.select&&this.postprocessResults(),this.opts.closeOnSelect?(this.close(),this.search.width(10)):(this.search.width(10),this.resizeSearch(),this.countSelectableResults()>0?this.positionDropdown():this.close()),this.triggerChange({added:e}),this.focusSearch()},cancel:function(){this.close(),this.focusSearch()},addSelectedChoice:function(t){var r=e("<li class='select2-search-choice'>    <div></div>    <a href='javascript:void(0)' class='select2-search-choice-close' tabindex='-1'></a></li>"),i=this.id(t),s=this.getVal(),o;o=this.opts.formatSelection(t,r),r.find("div").replaceWith("<div>"+n(o)+"</div>"),r.find(".select2-search-choice-close").bind("click dblclick",this.bind(function(t){if(!this.enabled)return;e(t.target).closest(".select2-search-choice").fadeOut("fast").animate({width:"hide"},50,this.bind(function(){this.unselect(e(t.target)),this.selection.find(".select2-search-choice-focus").removeClass("select2-search-choice-focus"),this.close(),this.focusSearch()})).dequeue(),h(t)})).bind("focus",this.bind(function(){if(!this.enabled)return;this.container.addClass("select2-container-active"),this.dropdown.addClass("select2-drop-active")})),r.data("select2-data",t),r.insertBefore(this.searchContainer),s.push(i),this.setVal(s)},unselect:function(e){var t=this.getVal(),n,i;e=e.closest(".select2-search-choice");if(e.length===0)throw"Invalid argument: "+e+". Must be .select2-search-choice";n=e.data("select2-data"),i=r(this.id(n),t),i>=0&&(t.splice(i,1),this.setVal(t),this.select&&this.postprocessResults()),e.remove(),this.triggerChange({removed:n})},postprocessResults:function(){var e=this.getVal(),t=this.results.find(".select2-result-selectable"),n=this.results.find(".select2-result-with-children"),i=this;t.each2(function(t,n){var s=i.id(n.data("select2-data"));r(s,e)>=0?n.addClass("select2-disabled").removeClass("select2-result-selectable"):n.removeClass("select2-disabled").addClass("select2-result-selectable")}),n.each2(function(e,t){t.find(".select2-result-selectable").length==0?t.addClass("select2-disabled"):t.removeClass("select2-disabled")}),t.each2(function(e,t){if(!t.hasClass("select2-disabled")&&t.hasClass("select2-result-selectable"))return i.highlight(0),!1})},resizeSearch:function(){var e,t,n,r,i,s=o(this.search);e=p(this.search)+10,t=this.search.offset().left,n=this.selection.width(),r=this.selection.offset().left,i=n-(t-r)-s,i<e&&(i=n-s),i<40&&(i=n-s),this.search.width(i)},getVal:function(){var e;return this.select?(e=this.select.val(),e===null?[]:e):(e=this.opts.element.val(),s(e,this.opts.separator))},setVal:function(t){var n;this.select?this.select.val(t):(n=[],e(t).each(function(){r(this,n)<0&&n.push(this)}),this.opts.element.val(n.length===0?"":n.join(this.opts.separator)))},val:function(){var n,r=[],i=this;if(arguments.length===0)return this.getVal();n=arguments[0];if(!n){this.opts.element.val(""),this.updateSelection([]),this.clearSearch();return}this.setVal(n);if(this.select)this.select.find(":selected").each(function(){r.push({id:e(this).attr("value"),text:e(this).text()})}),this.updateSelection(r);else{if(this.opts.initSelection===t)throw new Error("val() cannot be called if initSelection() is not defined");this.opts.initSelection(this.opts.element,function(t){var n=e(t).map(i.id);i.setVal(n),i.updateSelection(t),i.clearSearch()})}this.clearSearch()},onSortStart:function(){if(this.select)throw new Error("Sorting of elements is not supported when attached to <select>. Attach to <input type='hidden'/> instead.");this.search.width(0),this.searchContainer.hide()},onSortEnd:function(){var t=[],n=this;this.searchContainer.show(),this.searchContainer.appendTo(this.searchContainer.parent()),this.resizeSearch(),this.selection.find(".select2-search-choice").each(function(){t.push(n.opts.id(e(this).data("select2-data")))}),this.setVal(t),this.triggerChange()},data:function(t){var n=this,r;if(arguments.length===0)return this.selection.find(".select2-search-choice").map(function(){return e(this).data("select2-data")}).get();r=e.map(t,function(e){return n.opts.id(e)}),this.setVal(r),this.updateSelection(t),this.clearSearch()}}),e.fn.select2=function(){var n=Array.prototype.slice.call(arguments,0),i,s,o,u,a=["val","destroy","open","close","focus","isFocused","container","onSortStart","onSortEnd","enable","disable","positionDropdown","data"];return this.each(function(){if(n.length===0||typeof n[0]=="object")i=n.length===0?{}:e.extend({},n[0]),i.element=e(this),i.element.get(0).tagName.toLowerCase()==="select"?u=i.element.attr("multiple"):(u=i.multiple||!1,"tags"in i&&(i.multiple=u=!0)),s=u?new x:new S,s.init(i);else{if(typeof n[0]!="string")throw"Invalid arguments to select2 plugin: "+n;if(r(n[0],a)<0)throw"Unknown method: "+n[0];o=t,s=e(this).data("select2");if(s===t)return;n[0]==="container"?o=s.container:o=s[n[0]].apply(s,n.slice(1));if(o!==t)return!1}}),o===t?this:o},e.fn.select2.defaults={width:"copy",closeOnSelect:!0,containerCss:{},dropdownCss:{},containerCssClass:"",dropdownCssClass:"",formatResult:function(e,t,n){var r=[];return d(e.text,n.term,r),r.join("")},formatSelection:function(e,t){return e.text},formatNoMatches:function(){return"No matches found"},formatInputTooShort:function(e,t){return"Please enter "+(t-e.length)+" more characters"},formatSelectionTooBig:function(e){return"You can only select "+e+" items"},formatLoadMore:function(e){return"Loading more results..."},minimumResultsForSearch:0,minimumInputLength:0,maximumSelectionSize:0,id:function(e){return e.id},matcher:function(e,t){return t.toUpperCase().indexOf(e.toUpperCase())>=0}},window.Select2={query:{ajax:v,local:m,tags:g},util:{debounce:f,markMatch:d},"class":{"abstract":E,single:S,multi:x}}}(jQuery);jQuery(document).ready(function(e){function t(e){return'<span class="kad_icomoon"><i class="'+e.id+'"></i>'+e.text+"</span>"}e("select.kad_icomoon").select2({formatResult:t,formatSelection:t})});