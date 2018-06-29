{extends file='frontend/index/index.tpl'}

{block name='frontend_index_footer_container'}
    {$smarty.block.parent}

    {block name='frontend_index_footer_to_top_link'}
        <a href="#top"
           class="scroll-to-top-link {$netcomScrollToTop.buttonStyle} {$netcomScrollToTop.buttonForm}{strip}
                {if !$netcomScrollToTop.showButtonMobile} hidden--xs hidden--s{/if}
                {if !$netcomScrollToTop.showButtonDesktop} hidden--l hidden--xl{/if}
                {if $netcomScrollToTop.buttonPosition === 'center'} is--center{/if}
           {/strip}"
           style="{strip}
                background-color: {$netcomScrollToTop.backgroundColor};
                border-color: {$netcomScrollToTop.frameColor};
                bottom: {$netcomScrollToTop.buttonMarginBottom};
                width: {$netcomScrollToTop.width};
                height: {$netcomScrollToTop.height};
                {if $netcomScrollToTop.buttonPosition === 'left'}left: {$netcomScrollToTop.buttonMarginLeft}; right: auto;{/if}
                {if $netcomScrollToTop.buttonPosition === 'right'}right: {$netcomScrollToTop.buttonMarginRight}; left: auto;{/if}
           {/strip}"
           title="{s name="FooterToTopLinkTitle"}Nach oben{/s}"
           data-animationSpeed="{$netcomScrollToTop.animationSpeed}"
           data-scroll="true">
            {block name='frontend_index_footer_to_top_link_icon'}
                {* Customize this area *}

                <svg class="icon {$netcomScrollToTop.arrowIconClass}" style="color: {$netcomScrollToTop.arrowColor};">
                    <use xlink:href="{link file='frontend/_public/src/icomoon/symbol-defs.svg'}#{$netcomScrollToTop.arrowIconClass}"></use>
                </svg>

                <i class="{$netcomScrollToTop.arrowIconClass}" style="color: {$netcomScrollToTop.arrowColor};"></i>
            {/block}
        </a>
    {/block}
{/block}
