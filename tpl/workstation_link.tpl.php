
	[view.liste;strconv=no]

	<div class="tabsAction">
			<input class="butAction" type="submit" value="[langs.transnoentitiesnoconv(Save)]" name="bt_save" />
			<a href="#" class="butAction btnaddworkstation">[langs.transnoentitiesnoconv(AddWS)]</a>
	</div>
	<div id="dialog-workstation" title="[langs.transnoentitiesnoconv(AddingWS)]"  style="display:none;">
		<table>
			<tr>
				<td>[langs.transnoentitiesnoconv(WorkStations)] : </td>
				<td>
					[view.select_workstation;strconv=no]
				</td>
			</tr>
		</table>
	</div>
	<script type="text/javascript">
		
		$(".btnaddworkstation" ).click(function() {
				
				$( "#dialog-workstation" ).dialog({
					show: {
						effect: "blind",
						duration: 200
					},
					modal:true,
					buttons: {
						"[langs.transnoentitiesnoconv(Cancel)]": function() {
							$( this ).dialog( "close" );
						},				
						"[langs.transnoentitiesnoconv(Add)]": function(){
							
							var fk_workstation = $('#fk_workstation').val();
							
							document.location.href="?fk_product=[view.fk_product]&action=add&fk_workstation="+fk_workstation;
						}
					}
				});
			});
			
			
	</script>
