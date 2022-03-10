<{if $smarty.const._LEX_SHOW_TPL_NAME==1}>
<div style="text-align: center; background-color: black;"><span style="color: yellow;">Template : <{$smarty.template}></span></div>
<{/if}>

<ol class="breadcrumb">
  <li><a href="<{$xoops_url}>"><{$smarty.const._MD_LEXIKON_HOME}></a></li>
  <li><a href="<{$xoops_url}>/modules/<{$lang_moduledirname}>/index.php"><{$lang_modulename}></a></li>
  <li><{$smarty.const._MD_LEXIKON_SUBMITART}></li>
</ol>

<div class="row lex_input_new_term" >
  <div class="col-md-12">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h4><{$send_def_to}></h4>
      </div>
      <div class="panel-body">
        <p><{$smarty.const._MD_LEXIKON_GOODDAY}></p>
        <p><b><{$lx_user_name}></b>, <{$smarty.const._MD_LEXIKON_SUB_SNEWNAMEDESC}></p>
      </div>
    </div>
  </div>

  <{* <div class="col-md-6 col-sm-12"> *}>
  <div class="">
  <{$storyform.javascript}>
  <h3><{$storyform.title}></h3>
  <form id="sub-lex" name="<{$storyform.name}>" action="<{$storyform.action}>" method="<{$storyform.method}>" <{$storyform.extra}>>
    <{foreach item=element from=$storyform.elements}>
      <{if $element.hidden != true}>
      <div class="form-group lex_form_group">
        <label><{$element.caption}></label>
        <{$element.body}>
      </div>
      <{else}>
        <{$element.body}>
      <{/if}>
    <{/foreach}>
  </form>
  </div>
</div>
<script type="text/javascript">
$('#sub-lex select').each(function(){
  $( this ).addClass( "form-control" );
});
$('#sub-lex input[type=text]').each(function(){
  $( this ).addClass( "form-control" );
});
$('#sub-lex textarea').each(function(){
  $( this ).addClass( "form-control" );
});
$('#definition_preview_button').addClass( "btn btn-info btn-sm" );
$('input[type=submit]').addClass( "btn btn-success btn-sm" );
</script>

<{if $smarty.const._LEX_SHOW_TPL_NAME==1}>
<div style="text-align: center; background-color: grey;"><span style="color: yellow;">Template : <{$smarty.template}></span></div>
<{/if}>
