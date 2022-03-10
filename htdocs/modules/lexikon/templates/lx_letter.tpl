<{if $smarty.const._LEX_SHOW_TPL_NAME==1}>
<div style="text-align: center; background-color: black;"><span style="color: yellow;">Template : <{$smarty.template}></span></div>
<{/if}>

<{* New Header block *}>
<ol class="breadcrumb">
  <li><a href="<{$xoops_url}>"><{$smarty.const._MD_LEXIKON_HOME}></a></li>
  <li><a href="<{$xoops_url}>/modules/<{$lang_moduledirname}>/index.php"><{$lang_modulename}></a></li>
  <li><a href="<{$xoops_url}>/modules/<{$lang_moduledirname}>/letter.php"><{$pageinitial}></a></li>
</ol>

<!-- SEARCH - ajout JJDai -->
<{include file='db:lx_search-main-left.tpl'}>

<{* Alphabet block *}>
<{* deplacement du div de l'alphabet dans le tpl lx_alphabet.tpl pour integration dans plusieurs autres tpl *}>
<!-- SEARCH - ajout JJDai -->
<{include file='db:lx_alphabet.tpl'}>

<div class="row" style="margin-bottom: 20px">
  <div class="col-md-12">

    <{if $pagetype == '0'}>
       <h2 style="text-align: center"><{$smarty.const._MD_LEXIKON_ALL}></h2>
        <div class="letters"><{$smarty.const._MD_LEXIKON_WEHAVE}>&nbsp;<{$totalentries}>&nbsp;<{$smarty.const._MD_LEXIKON_INALLGLOSSARIES}></div>
        <br>
        <div align='left'><{$entriesarray.navbar}></div>
        <{foreach item=eachentry from=$entriesarray.single}>
            <h4 class="lex_term" style="clear:both;">
                <a href="<{$xoops_url}>/modules/<{$eachentry.dir}>/entry.php?entryID=<{$eachentry.id}>"><{$eachentry.term}></a>
                <{if $multicats == 1}>
                <a style="color: #456;" href="<{$xoops_url}>/modules/<{$eachentry.dir}>/category.php?categoryID=<{$eachentry.catid}>">
                    [<{$eachentry.catname}>]
                </a>
                <{/if}>
                <div class="microlinks"><{$eachentry.microlinks}></div>
            </h4>

            <div class="lex_term_definition"><p><{$eachentry.definition}></p></div>
            <{if $eachentry.url <> ''}>
                <div class="lex_url"><b><{$smarty.const._MD_LEXIKON_ENTRYRELATEDURL}></b>
                  <a href = "<{$eachentry.url}>"><{$eachentry.url}></a>
                </div>
            <{/if}>


            <{if $eachentry.comments }><{$eachentry.comments}><br><{/if}>
            <br>
            <br>
        <{/foreach}>
        <div align='left'><{$entriesarray.navbar}></div>
        <div class="letters"> [ <a href='javascript://history.go(-1);'><{$smarty.const._MD_LEXIKON_RETURN}></a><b> | </b><a
                    href='./index.php'><{$smarty.const._MD_LEXIKON_RETURN2INDEX}></a> ]
        </div>
    <{elseif $pagetype == '1'}>
        <div align="left"><{$entriesarray2.navbar}></div>
        <div class="letters">
          <h2 style="text-align: center"><{$firstletter}></h2>
          <{$smarty.const._MD_LEXIKON_WEHAVE}>&nbsp;<{$totalentries}>&nbsp;<{$smarty.const._MD_LEXIKON_BEGINWITHLETTER}>
        </div>
        <br>
        <{foreach item=eachentry from=$entriesarray2.single}>
            <h4 class="lex_term" style="clear:both;">
                <a href="<{$xoops_url}>/modules/<{$eachentry.dir}>/entry.php?entryID=<{$eachentry.id}>"><{$eachentry.term}></a> 
                <{if $multicats == 1}>
                <a style="color: #456;" href="<{$xoops_url}>/modules/<{$eachentry.dir}>/category.php?categoryID=<{$eachentry.catid}>">
                    [<{$eachentry.catname}>]</A><{/if}>
             <div class="microlinks"><{$eachentry.microlinks}></div>
             </h4>
            <div class="lex_term_definition"><p><{$eachentry.definition}></p></div> <{* JJDai *}>
            <{if $eachentry.url <> ''}>
                <div class="lex_url"><b><{$smarty.const._MD_LEXIKON_ENTRYRELATEDURL}></b>
                  <a href = "<{$eachentry.url}>"><{$eachentry.url}></a>
                </div>
            <{/if}>

            <{if $eachentry.comments }><{$eachentry.comments}><br><{/if}>
            <br>
            <br>
        <{/foreach}>
        <div align="left"><{$entriesarray2.navbar}></div>
        <div class='letters'> [ <a href='javascript://history.go(-1);'><{$smarty.const._MD_LEXIKON_RETURN}></a><b> | </b>
            <a href='./index.php'><{$smarty.const._MD_LEXIKON_RETURN2INDEX}></a> ]
        </div>
    <{/if}>

</div>
</div>

<{if $smarty.const._LEX_SHOW_TPL_NAME==1}>
<div style="text-align: center; background-color: grey;"><span style="color: yellow;">Template : <{$smarty.template}></span></div>
<{/if}>
