<div id="blocktext_block_home" class="block">
    <h4>{l s='Welcome!' mod='blocktext'}</h4>
    <div class="block_content">
      <p>Hello,
             {if isset($blocktext_name) && $block_text_name}
                 {$blocktext_name}
             {else}
                 World
             {/if}
             !
      </p>
      <ul>
        <li><a href="{$blocktext_link}" title="Click this link">Click me!</a></li>
      </ul>
    </div>
  </div>