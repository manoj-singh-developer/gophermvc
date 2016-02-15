<?php
namespace SMVC\Core;
	
class DataTable{
	protected $table = array();
	protected $tableHeader;
	protected $tableBody;
	private   $tableID = 'dataTable';
	
/***************************************************************************/
function __construct($data = array()){
	$this->tBody($data['body']);
	$this->tHeader($data['tableHeaders']);
	
	return $this->table;
}		
/***************************************************************************/
public function getTable(){
	ob_start();
	?>
	
	<table class="table table-striped dataTable" id="dataTable" name="dataTable" width="100%">
		<?=$this->tableHeader?>
		<?=$this->tableBody?>
	</table>
	
	<?php
	$this->table['table'] = ob_get_contents();
	ob_end_clean();
	return $this->table['table'];
}
/***************************************************************************/
private function tBody( $rows ){
	ob_start();
	?>
	<tBody>
		<?php
			foreach($rows as $row){
		?>
		<tr>
			<?php
				foreach($row as $key=>$value){
			?>
			<td><?=$value?></td>
			<?php
				}
			?>
		</tr>
		<?php
			}
		?>
	</tBody>
	
	<?php
	$this->tableBody = ob_get_clean();
	ob_end_clean();
	return;
	
}		
/***************************************************************************/
private function tHeader( $headers ){
	ob_start();
	?>
	
	<thead>
		<tr>
			<?php
				foreach($headers as $header){
			?>
			<th><?=$header?></th>
			<?php
				}
			?>
		</tr>
	</thead>
	
	<?php
	$this->tableHeader = ob_get_contents();
	ob_end_clean();
	return;
	
}			
/***************************************************************************/
public function getDocReady(){
	ob_start();
	?>
//Initiate datatable
	$('.dataTable').DataTable({ });
	
	
	<?php
	$this->table['docReady'] = ob_get_contents();
	ob_end_clean();
	return $this->table['docReady'];
}		
/***************************************************************************/		
/***************************************************************************/		
/***************************************************************************/		
/***************************************************************************/		
}//End class DataTable	