{block name="widgets_emotion_components_nnweb_emotion_hover_two"}
	{if $Data.nnwebEmotionHoverTwo_button_link_produkt_id}
		{$link = {url controller="detail" sArticle=$Data.nnwebEmotionHoverTwo_button_link_produkt_id}}
	{else}
		{$link = $Data.nnwebEmotionHoverTwo_button_link}
	{/if}
	
	<{if $Data.nnwebEmotionHoverTwo_button_link_element eq 'button'}div{else}a
		href="{$link}"
		target="{$Data.nnwebEmotionHoverTwo_button_link_target}"
	{/if}
		class="nnweb_emotion_hover_two {$Data.nnwebEmotionHoverTwo_style}"
		style="
			background-image:url('{$Data.nnwebEmotionHoverTwo_hintergrundbild}');
			background-position:{$Data.nnwebEmotionHoverTwo_hintergrundposition};">
		
		<div class="helper"></div>
		
		<div class="wrapper">
			
			{if $Data.nnwebEmotionHoverTwo_ueberschrift_anzeigen}
				<{$Data.nnwebEmotionHoverTwo_ueberschrift_tag}
					class="headline {$Data.nnwebEmotionHoverTwo_ueberschrift_cls}"
					style="
						color:{$Data.nnwebEmotionHoverTwo_ueberschrift_schriftfarbe};
						font-size:{$Data.nnwebEmotionHoverTwo_ueberschrift_schriftgroesse};
						background:{$Data.nnwebEmotionHoverTwo_ueberschrift_hintergrundfarbe};">
					{$Data.nnwebEmotionHoverTwo_ueberschrift_text}
				</{$Data.nnwebEmotionHoverTwo_ueberschrift_tag}>
			{/if}
			
			{if $Data.nnwebEmotionHoverTwo_text_anzeigen}
				<p
					class="{$Data.nnwebEmotionHoverTwo_text_cls}"
					style="
						color:{$Data.nnwebEmotionHoverTwo_text_schriftfarbe};
						font-size:{$Data.nnwebEmotionHoverTwo_text_schriftgroesse};
						background:{$Data.nnwebEmotionHoverTwo_text_hintergrundfarbe};">
					{$Data.nnwebEmotionHoverTwo_text_text}
				</p>
			{/if}
			
			{if $Data.nnwebEmotionHoverTwo_button_anzeigen}
					<{if $Data.nnwebEmotionHoverTwo_button_link_element ne 'button'}span{else}a
						href="{$link}"
						target="{$Data.nnwebEmotionHoverTwo_button_link_target}"
					{/if}
					class="btn {$Data.nnwebEmotionHoverTwo_button_cls}"
					href="{$link}"
					target="{$Data.nnwebEmotionHoverTwo_button_link_target}"
					style="
						color:{$Data.nnwebEmotionHoverTwo_button_schriftfarbe};
						font-size:{$Data.nnwebEmotionHoverTwo_button_schriftgroesse};
						background:{$Data.nnwebEmotionHoverTwo_button_hintergrundfarbe};">
					<span>{$Data.nnwebEmotionHoverTwo_button_text}</span>
				
				{if $Data.nnwebEmotionHoverTwo_button_link_element ne 'button'}
				</div>
				{else}
				</a>
				{/if}
			{/if}
		</div>
	{if $Data.nnwebEmotionHoverTwo_button_link_element eq 'button'}
	</div>
	{else}
	</a>
	{/if}
{/block}