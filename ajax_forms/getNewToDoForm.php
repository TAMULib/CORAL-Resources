<form id='quickToDoForm'>
	<table class="thickboxTable" style="width:98%;background-image:url('images/title.gif');background-repeat:no-repeat;">
		<tr>
			<td><label>PO:</label></td>
			<td>
				<input type="text" name="search[po]" />
				<span id='span_error_search_po' class='error smallDarkRedText'></span>
			</td>
		</tr>
		<tr>
			<td><label>ISSN:</label></td>
			<td>
				<input type="text" name="search[issn]" />
				<span id='span_error_search_issn' class='error smallDarkRedText'></span>
			</td>
		</tr>
	</table>
	<table class='noBorderTable' style='width:125px;'>
		<tr>
			<td style='text-align:left'><input type='button' value='submit' name='submitQuickToDo' id='submitQuickToDo'></td>
			<td style='text-align:right'><input type='button' value='cancel' onclick="tb_remove();"></td>
		</tr>
	</table>

</form>
<script type="text/javascript" src="js/forms/quickToDo.js?random=<?php echo rand(); ?>"></script>
