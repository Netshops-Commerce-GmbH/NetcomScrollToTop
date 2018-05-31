{extends file='frontend/index/index.tpl'}

{block name='frontend_index_footer_container'}
    {$smarty.block.parent}

    {block name='frontend_index_footer_totop_link'}
        <a class="scroll-to-top-link btn is--secondary{strip}
                {if $netcomScrollToTop.buttonForm === 'circle'} is--rounded{else} is--square{/if}
                {if !$netcomScrollToTop.showButtonMobile} hidden--xs hidden--s{/if}
                {if !$netcomScrollToTop.showButtonDesktop} hidden--l hidden--xl{/if}
                {if $netcomScrollToTop.buttonPosition === 'center'} is--center{/if}
           {/strip}"
           style="{strip}
                background-color: {$netcomScrollToTop.backgroundColor};
                border-color: {$netcomScrollToTop.frameColor};
                bottom: {$netcomScrollToTop.buttonMarginBottom};
                {if $netcomScrollToTop.buttonPosition === 'left'}left: {$netcomScrollToTop.buttonMarginLeft}; right: auto;{/if}
                {if $netcomScrollToTop.buttonPosition === 'right'}right: {$netcomScrollToTop.buttonMarginRight}; left: auto;{/if}
           {/strip}"
           title="{s name="FooterToTopLinkTitle"}Nach oben{/s}"
           href="#top" data-scroll="true">
            <i class="{$netcomScrollToTop.arrowIconClass}" style="color: {$netcomScrollToTop.arrowColor};"></i>
        </a>
    {/block}
{/block}
