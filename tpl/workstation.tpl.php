
<div>
	<table width="100%" class="border">
		<tr><td width="20%">[langs.transnoentitiesnoconv(Label)]</td><td>[ws.name; strconv=no]</td></tr>
		<tr><td width="20%">[langs.transnoentitiesnoconv(WSCode)]</td><td>[ws.code; strconv=no]</td></tr>
		<tr><td width="20%">[onshow;block=tr;when [view.isMachine]==0][langs.transnoentitiesnoconv(WSUsergroup)]</td><td>[ws.fk_usergroup; strconv=no]</td></tr>
		<tr><td width="20%">[langs.transnoentitiesnoconv(WSType)]</td><td>[ws.type; strconv=no]</td></tr>
		<tr><td width="20%">[langs.transnoentitiesnoconv(WSMaxNbHours)]</td><td>[ws.nb_hour_capacity; strconv=no]</td></tr>
		<tr><td>[langs.transnoentitiesnoconv(WSNbHoursBeforeProd)]</td><td>[ws.nb_hour_before; strconv=no]h</td></tr>
		<tr><td>[langs.transnoentitiesnoconv(WSNbHoursAfterProd)]</td><td>[ws.nb_hour_after; strconv=no]h</td></tr>


	    <tr><td width="20%">[langs.transnoentitiesnoconv(WSNbResourcesAvailable)]</td><td>[ws.nb_ressource; strconv=no]</td></tr>
        <tr><td>[onshow;block=tr;when [view.isMachine]==0][langs.transnoentitiesnoconv(WSAverageHourlyRate)]</td><td>[ws.thm; strconv=no]</td></tr>
        <tr><td>[onshow;block=tr;when [view.isMachine]==0][langs.transnoentitiesnoconv(WSOvertimeAverageHourlyRate)]</td><td>[ws.thm_overtime; strconv=no]</td></tr>
        <tr><td>[onshow;block=tr;when [view.isMachine]==0][langs.transnoentitiesnoconv(WSNightWeekEndAverageHourlyRate)]</td><td>[ws.thm_night; strconv=no]</td></tr>
        <tr><td width="20%">[langs.transnoentitiesnoconv(WSMachineAverageHourlyRate)]</td><td>[ws.thm_machine; strconv=no]</td></tr>
        <tr><td width="20%">[langs.transnoentitiesnoconv(WSColumnColor)]</td><td>[ws.background; strconv=no]</td></tr>
	</table>
</div>


[onshow;block=begin;when [view.mode]!='edit']
    <div class="tabsAction">
        <a href="?id=[ws.id]&action=edit" class="butAction">[langs.transnoentitiesnoconv(Modify)]</a>
        <span class="butActionDelete" id="action-delete"  
        onclick="if (window.confirm('[langs.transnoentitiesnoconv(DeleteWSConfirmMsg)]')){document.location.href='?id=[ws.id]&action=delete'};">[langs.transnoentitiesnoconv(Delete)]</span>
    </div>
[onshow;block=end]  

[view.scheduleTitle;strconv=no;]
<div style="margin-top:15px;">
    <table width="100%" class="border">     
        <tr class="liste_titre">
            <th align="left" width="10%">[langs.transnoentitiesnoconv(Date)]</th>
            <th>[langs.transnoentitiesnoconv(WSOrDayOfWeek)]</th>
            <th>[langs.transnoentitiesnoconv(WSMomentOfTheDay)]</th>
            <th>[langs.transnoentitiesnoconv(WSNumberOfUnavailableResources)]</th>
            <th>&nbsp;</th>
        </tr>
        
        <tr style="background-color:#fff;">
            <td>[TWorkstationSchedule.date_off;block=tr;strconv=no]</td>
            <td>[TWorkstationSchedule.week_day;strconv=no]</td>
            <td>[TWorkstationSchedule.day_moment;strconv=no]</td>
            <td>[TWorkstationSchedule.nb_ressource;strconv=no]</td>
            <td align="center">[TWorkstationSchedule.action;strconv=no]</td>
        </tr>
        
        <tr>
            <td colspan="4" align="center">[TWorkstationSchedule;block=tr;nodata][langs.transnoentitiesnoconv(WSNoTimePlanned)]</td>
        </tr>
    </table>    
</div>



[onshow;block=begin;when [view.mode]=='edit']
    <div class="tabsAction" style="text-align:center;">
        <input type="submit" value="[langs.transnoentitiesnoconv(Save)]" name="save" class="button"> 
        &nbsp; &nbsp; <input type="button" value="[langs.transnoentitiesnoconv(Cancel)]" name="cancel" class="button" onclick="document.location.href='?action=view&id=[ws.id]'">
    </div>
[onshow;block=end]


[onshow;block=begin;when [view.conf_defined_task]==1]
	[onshow;block=begin;when [view.editTask]=='1']
		<div style="margin-top:15px;">
			<!-- déjà un formulaire, à recoder <form action="[view.actionForm;strconv=no]" method="POST">
				<input type="hidden" name="action" value="editTaskConfirm" />
				<input type="hidden" name="id" value="[ws.id]" />
				<input type="hidden" name="id_task" value="[formTask.id_task;noerr]" />
				-->
				<table width="100%" class="border">
					<tr><th align="left" colspan="2">[formTask.id_task;noerr;if [val]==0;then '[langs.transnoentitiesnoconv(WSAddTask)]';else '[langs.transnoentitiesnoconv(WSModifyTask)]']</th></tr>
					<tr><td>[langs.transnoentitiesnoconv(Label)]</td><td><input size="45" type="text" name="libelle" value="[formTask.libelle;noerr;strconv=no]" /></td></tr>
					<tr><td>[langs.transnoentitiesnoconv(Description)]</td><td><textarea cols="45" rows="3" name="description">[formTask.description;noerr;strconv=no]</textarea></td></tr>
				</table>
				
				<div class="tabsAction" style="text-align:center;">
					<input class="button" type="submit" value="[langs.transnoentitiesnoconv(Save)]" />
					<a style="font-weight:normal;text-decoration:none" href="?action=view&id=[ws.id]" class="button">[langs.transnoentitiesnoconv(Cancel)]</a>
				</div>
			<!-- </form> -->
		</div>
	[onshow;block=end]
[onshow;block=end]	

[onshow;block=begin;when [view.conf_defined_task]==1]
	<div style="margin-top:15px;">
		<table width="100%" class="border">		
			<tr height="40px;">
				<td colspan="4">&nbsp;&nbsp;<b>[langs.transnoentitiesnoconv(WSAssociatedTasks)]</b></td>
			</tr>
			<tr style="background-color:#dedede;">
				<th align="left" width="10%">&nbsp;&nbsp;[langs.transnoentitiesnoconv(WSTask)]</th>
				<th align="left" width="30%">&nbsp;&nbsp;[langs.transnoentitiesnoconv(Description)]</th>
				<th align="center" width="5%">&nbsp;&nbsp;[langs.transnoentitiesnoconv(WSAction)]</th>
			</tr>
			
			<tr style="background-color:#fff;">
				<td>&nbsp;&nbsp;[wst.libelle;strconv=no;block=tr]</td>
				<td>[wst.description;strconv=no;block=tr]</td>
				<td align="center">[wst.action;strconv=no;block=tr]</td>
			</tr>
			
			<tr>
				<td colspan="4" align="center">[wst;block=tr;nodata][langs.transnoentitiesnoconv(WSNoTaskAssociated)]</td>
			</tr>
		</table>	
	</div>
[onshow;block=end]

[onshow;block=begin;when [view.mode]!='edit']
	<div class="tabsAction">
		[onshow;block=begin;when [view.conf_defined_task]==1]
			<a href="?id=[ws.id]&action=editTask" class="butAction">[langs.transnoentitiesnoconv(WSAddTask)]</a>
		[onshow;block=end]
	</div>
[onshow;block=end]	


<div style="clear:both"></div>

