<div class="wrap">
	<h2>SantoPixel Youtube Importer</h2>
	<p>Coletador de vídeos do Youtube (playlist).<br/>
	O coletador é executado de 10 em 10 minutos*, atualizando os vídeos da playlist do Youtube selecionados abaixo.</p>
	<p>* De 10 em 10 minutos, mas não automaticamente <i>(como um linux job)</i>. A cada requisição o WordPress verifica se há alguma task à ser executada. Isto significa que se o site ficar inativo durante 1 hora (sem acessos), durante este período não haverão execuções do coletador de vídeos.</p>

	<?php if ( $feedback == '1') : ?>
		<div class="updated">
			<p><strong>Opções salvas.</strong></p>
		</div>
	<?php endif; ?>

	<form method="get" action="admin-ajax.php">
		<input type="hidden" name="action" value="spyiUpdatePage" />

		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">Status</th>
					
					<td>
						<fieldset>
							<label>
								<input type="radio" id="status1" name="status" value="0" <?php if ( $status == '0') echo 'checked="checked"' ?> />
								<span>Inativo</span>
							</label>
							<br />
							<label>
								<input type="radio" id="status2" name="status" value="1" <?php if ( $status == '1') echo 'checked="checked"' ?> />
								<span>Ativo</span>
							</label>
						</fieldset>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row">
						<label for="ytPlaylistId">Youtube Playlist ID</label>
					</th>
					
					<td>
						<input name="ytPlaylistId" type="text" id="ytPlaylistId" value="<?php echo $ytPlaylistId ?>" class="regular-text" />
					</td>
				</tr>

				<tr valign="top">
					<th scope="row">
						<label for="googleApiKey">Google API Key</label>
					</th>
					
					<td>
						<input name="googleApiKey" type="text" id="googleApiKey" value="<?php echo $googleApiKey ?>" class="regular-text" />
					</td>
				</tr>
			</tbody>
		</table>

		<p class="submit">
			<input type="submit" id="submit" class="button button-primary" value="Salvar alterações" />
		</p>
	</form>
</div>
