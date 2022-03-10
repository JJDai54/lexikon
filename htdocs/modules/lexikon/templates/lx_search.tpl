<{if $smarty.const._LEX_SHOW_TPL_NAME==1}>
<div style="text-align: center; background-color: black;"><span style="color: yellow;">Template : <{$smarty.template}></span></div>
<{/if}>

<ol class="breadcrumb">
  <li><a href="<{$xoops_url}>"><{$smarty.const._MD_LEXIKON_HOME}></a></li>
  <li><a href="<{$xoops_url}>/modules/<{$lang_moduledirname}>/index.php"><{$lang_modulename}></a></li>
  <li><{$smarty.const._MD_LEXIKON_SEARCHHEAD}></li>
</ol>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h4><{$smarty.const._MD_LEXIKON_SEARCHHEAD}></h4>
      </div>
      <div class="panel-body">
        <p><{$intro}></p>
      </div>
    </div>
  </div>
</div>

<!-- SEARCH - modif JJDai ajout du tpl a gauche et deplacement du div de droite -->
<{include file='db:lx_search-main-left.tpl'}>
<{* deplacement du div de recheche dans le tpl lx_search-main-right *}>
<!-- SEARCH - ajout JJDai -->

<{* Alphabet block *}>
<{* deplacement du div de l'alphabet dans le tpl lx_alphabet.tpl pour integration dans plusieurs autres tpl *}>
<!-- SEARCH - ajout JJDai -->
<{include file='db:lx_alphabet.tpl'}>

<div class="row">
  <div class="col-md-12">
    <{foreach item=eachresult from=$resultset.match}>
        <h4><img src="<{$xoops_url}>/modules/<{$eachresult.dir}>/assets/images/lx.png"/>&nbsp;
          <a href="<{$xoops_url}>/modules/<{$eachresult.dir}>/entry.php?entryID=<{$eachresult.id}><{if $highlight == 1}><{$eachresult.keywords}><{/if}>">
            <{$eachresult.term}>
          </a>
          <{if $multicats == 1}>
            <a href="<{$xoops_url}>/modules/<{$eachresult.dir}>/category.php?categoryID=<{$eachresult.categoryID}>">
                [<{$eachresult.catname}>]
            </a>
          <{/if}>
        </h4>
        <p><{$eachresult.definition}></p>
        <{if $eachresult.ref}>
            <i><{$eachresult.ref}></i>
        <{/if}>
    <{/foreach}>
    <div><{$resultset.navbar}></div>
  </div>
</div>
<script type="text/javascript">
$('select').each(function(){
  $( this ).addClass( "form-control" );
  $( this ).css("margin-bottom", "5px");
});
$('input[type=text]').each(function(){
  $( this ).addClass( "form-control" );
});
$( "input[name*='term']" ).css("background-position","1px 8px");
$('.btnDefault').addClass( "btn btn-success btn-sm" );
</script>


<{if $smarty.const._LEX_SHOW_TPL_NAME==1}>
<div style="text-align: center; background-color: grey;"><span style="color: yellow;">Template : <{$smarty.template}></span></div>
<{/if}>
