<{if $smarty.const._LEX_SHOW_TPL_NAME==1}>
<div style="text-align: center; background-color: black;"><span style="color: yellow;">Template : <{$smarty.template}></span></div>
<{/if}>

<{* JJDai - Ajout d'un style pour marquer les initiales qui ont des termes *}>
<style>
.letter_has_terme{
  /*text-decoration: underline overline #FF3028;*/
  text-decoration: underline;
  font-weight: 900;
  color: #18507F;
}

</style>

<{* Alphabet block *}>
<div class="row" style="margin-bottom: 10px">
  <div class="col-md-12">
    <h3><{$smarty.const._MD_LEXIKON_BROWSELETTER}></h3>

    <ul class="pagination pagination-sm">
      <li><a href="<{$xoops_url}>/modules/<{$lang_moduledirname}>/letter.php" title="[ <{$publishedwords}> ]"><{$smarty.const._MD_LEXIKON_ALL}></a></li>
      <{foreach item=letterlinks from=$alpha.initial}>
          <{if $letterlinks.total > 0}>
            <li><a href="<{$xoops_url}>/modules/<{$lang_moduledirname}>/letter.php?init=<{$letterlinks.id}>" title="[ <{$letterlinks.total}> ]" >
              <span class="letter_has_terme"><{$letterlinks.linktext}></span>
            </a></li>
          <{else}>
            <li><a href="#"><{$letterlinks.linktext}></a></li>
          <{/if}>
      <{/foreach}>

      <{if $totalother > 0}>
        <li><a href="<{$xoops_url}>/modules/<{$lang_moduledirname}>/letter.php?init=<{$smarty.const._MD_LEXIKON_OTHER}>" title="[ <{$totalother}> ]">
          <span class="letter_has_terme"><{$smarty.const._MD_LEXIKON_OTHER}></span>
        </a></li>
      <{else}>
        <li><a href="#"><{$smarty.const._MD_LEXIKON_OTHER}></a></li>
      <{/if}>
    </ul>
  </div>
</div>

<{* <hr> *}>

<{if $smarty.const._LEX_SHOW_TPL_NAME==1}>
<div style="text-align: center; background-color: grey;"><span style="color: yellow;">Template : <{$smarty.template}></span></div>
<{/if}>
