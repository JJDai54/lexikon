<{if $smarty.const._LEX_SHOW_TPL_NAME==1}>
<div style="text-align: center; background-color: black;"><span style="color: yellow;">Template : <{$smarty.template}></span></div>
<{/if}>

<{* JJDAi - extraction du code pour creation du tpl pour intégration dans plusieur autres tpl *}>
<!-- SEARCH - placement à droite des options de recherche -->
<div class="row">
  <div class="col-md-6 col-xs-12">
    <h3><{$smarty.const._MD_LEXIKON_WEHAVE}></h3>

    <{$smarty.const._MD_LEXIKON_DEFS}><{$publishedwords}><br>
    <{if $multicats == 1}><{$smarty.const._MD_LEXIKON_CATS}><{$totalcats}><br/><{/if}>
    <br/>
    <input class="btn btn-success btn-sm" type="button" value="<{$smarty.const._MD_LEXIKON_SUBMITENTRY}>" onclick="location.href = 'submit.php'"/>
    <input class="btn btn-info btn-sm" type="button" value="<{$smarty.const._MD_LEXIKON_REQUESTDEF}>" onclick="location.href = 'request.php'"/>
  </div>
  <div class="col-md-6 col-xs-12">
    <hr class="visible-sm">
    <h3><{$smarty.const._MD_LEXIKON_SEARCHENTRY}></h3>
    <{$searchform}>
  </div>
</div>


<{if $smarty.const._LEX_SHOW_TPL_NAME==1}>
<div style="text-align: center; background-color: grey;"><span style="color: yellow;">Template : <{$smarty.template}></span></div>
<{/if}>

