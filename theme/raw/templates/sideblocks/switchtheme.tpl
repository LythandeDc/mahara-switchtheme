{if $USER->is_logged_in()}

<div class="panel panel-default">
    <h3 class="panel-heading">
        Institutions
    </h3>   
    
{foreach from=$sbdata.viewthemes key=themeid item=themename}
    <form action="{$WWWROOT}local/switchtheme.php" method="post">
        <input value="{$themeid}" type="hidden" name="viewtheme">
        <input class="list-group-item bouton-instit-theme {if $themename|count_characters gte 25}laboiteaafficher{/if}" type="submit" value="{if $themename|count_characters gte 25}{$themename|substr:0:25} [...]{else}{$themename}{/if}">
        {if $themename|count_characters gte 25}<div id="dialoginst" title="Le nom de votre institution"><span class='institution-over-hidden'>{$themename}</span></div>{/if}
    </form>
{/foreach}

<span class="list-group-item add-institution"><i class="fa fa-plus-circle" aria-hidden="true"></i> <a href="{$WWWROOT}account/institutions.php">Afficher toutes les institutions</a></span>

</div>

{/if}
