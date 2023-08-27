	<form class="form-horizontal" method="post" action="process.php?action=certificate" enctype="multipart/form-data" name="form" id="form">
		<?php
			$crt = $conn->prepare("SELECT * FROM tbl_certificate WHERE is_deleted != '1'");
			$crt->execute();
			if($crt->rowCount() > 0)
			{
				while($crt_data = $crt->fetch())
				{
		?>												
					<div class="form-group">
						<label for="exampleInputuname" class="col-sm-3 control-label"><?php echo $crt_data['cer_name']; ?> : </label>
						<div class="col-sm-9">
							<div class="input-group">
								<select name="res_<?php echo $crt_data['cer_id']; ?>[]" class="select2" style="width:117px; border:solid 1px #666600; padding:7px;">
									<?php if($crt_data['is_show'] == 1){ ?>
											<option value="1">Show</option><option value="0">Hide</option>
									<?php }else{ ?>
											<option value="0">Hide</option><option value="1">Show</option>
									<?php } ?>
								</select>										
							</div>
						</div>
					</div>
					<input name="hidCartId[]" type="hidden" value="<?php echo $crt_data['cer_id']; ?>">
		<?php
				} // End While
			}else{}
		?>	
				
		<div class="form-group m-b-0">
			<div class="col-sm-offset-3 col-sm-9">
				<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" onClick="return confirmSubmit()">Save</button>
				<br /><br />
			</div>
		</div>
		
	</form>