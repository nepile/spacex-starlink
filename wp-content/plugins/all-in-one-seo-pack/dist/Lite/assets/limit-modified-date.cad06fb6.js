import{o as r,c as m,a as e,Q as h,Z as g,b as l,t as P,Y as S}from"./js/runtime-dom.esm-bundler.5c3c7d72.js";import{l as x}from"./js/index.7c01c5f2.js";import{l as b}from"./js/index.b359096c.js";import{l as k}from"./js/index.d80c2c2c.js";import{e as E,A as a,c as y}from"./js/index.7377ee90.js";import{e as L}from"./js/elemLoaded.2921fc72.js";import{s as v}from"./js/metabox.8f8ea589.js";import"./js/translations.d159963e.js";import{_ as B}from"./js/_plugin-vue_export-helper.eefbdd86.js";import{_ as D}from"./js/default-i18n.20001971.js";import"./js/Caret.a21d4ca8.js";import"./js/helpers.53868b98.js";const M="all-in-one-seo-pack",A={emits:["standalone-update-post"],setup(){return{postEditorStore:E()}},data(){return{strings:{label:D("Don't update the modified date",M)}}},watch:{"postEditorStore.currentPost.limit_modified_date"(t){window.aioseoBus.$emit("standalone-update-post",{limit_modified_date:t})}},computed:{canShowSvg(){return a()&&this.postEditorStore.currentPost.limit_modified_date}},methods:{addLimitModifiedDateAttribute(){a()&&window.wp.data.dispatch("core/editor").editPost({aioseo_limit_modified_date:this.postEditorStore.currentPost.limit_modified_date})}}},C={key:0},I={class:"components-checkbox-control__input-container"},V={key:0,xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",width:"24",height:"24",role:"img",class:"components-checkbox-control__checked","aria-hidden":"true",focusable:"false"},N=e("path",{d:"M18.3 5.6L9.9 16.9l-4.6-3.4-.9 1.2 5.8 4.3 9.3-12.6z"},null,-1),U=[N],z={class:"components-checkbox-control__label",for:"aioseo-limit-modified-date-input"};function Q(t,o,d,i,w,n){return i.postEditorStore.currentPost.id?(r(),m("div",C,[e("span",I,[h(e("input",{id:"aioseo-limit-modified-date-input",class:"components-checkbox-control__input",type:"checkbox","onUpdate:modelValue":o[0]||(o[0]=s=>i.postEditorStore.currentPost.limit_modified_date=s),onChange:o[1]||(o[1]=(...s)=>n.addLimitModifiedDateAttribute&&n.addLimitModifiedDateAttribute(...s))},null,544),[[g,i.postEditorStore.currentPost.limit_modified_date]]),n.canShowSvg?(r(),m("svg",V,U)):l("",!0)]),e("label",z,P(w.strings.label),1)])):l("",!0)}const R=B(A,[["render",Q]]);var u,p,f,_;if(a()&&window.wp){const{createElement:t}=window.wp.element,{registerPlugin:o}=window.wp.plugins,d=((p=(u=window.wp)==null?void 0:u.editor)==null?void 0:p.PluginPostStatusInfo)||((_=(f=window.wp)==null?void 0:f.editPost)==null?void 0:_.PluginPostStatusInfo);o("aioseo-limit-modified-date",{render:()=>t(d,{},t("div",{id:"aioseo-limit-modified-date"}))})}const c=()=>{let t=S({...R,name:"Standalone/LimitModifiedDate"});t=x(t),t=b(t),t=k(t),y(t),t.mount("#aioseo-limit-modified-date")};v()&&window.aioseo&&window.aioseo.currentPost&&window.aioseo.currentPost.context==="post"&&(document.getElementById("aioseo-limit-modified-date")?c():(L("#aioseo-limit-modified-date","aioseoLimitModifiedDate"),document.addEventListener("animationstart",function(o){o.animationName==="aioseoLimitModifiedDate"&&c()},{passive:!0})));
