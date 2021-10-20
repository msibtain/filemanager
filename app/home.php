<style>
	.custom-menu {
        z-index: 1000;
	    position: absolute;
	    background-color: #ffffff;
	    border: 1px solid #0000001c;
	    border-radius: 5px;
	    padding: 8px;
	    min-width: 13vw;
}
a.custom-menu-list {
    width: 100%;
    display: flex;
    color: #4c4b4b;
    font-size: 1em;
    padding: 1px 11px;
}
	span.card-icon {
    position: absolute;
    font-size: 3em;
    bottom: .5em;
    color: #ffffff80;
}
.file-item{
	cursor: pointer;
}
a.custom-menu-list:hover,.file-item:hover,.file-item.active {
    background: #80808024;
}
tr{
	color: #000;
}
a.custom-menu-list span.icon{
		width:1em;
		margin-right: 5px
}
.user-value,.files-value{
	text-align: right !important;
}
.card{
	border-radius: unset;
}
</style>

<div class="state-overview">
	<div class="row">
		<div class="col-xl-12 col-md-12 col-12">

			<div class="containe-fluid">
				<?php include('db_connect.php') ;
				$files = $conn->query("SELECT f.*,u.name as uname FROM files f inner join users u on u.id = f.user_id where  f.is_public = 1 order by date(f.date_updated) desc");

				?>
				<div class="row">
					<div class="card col-md-4 offset-1 bg-success float-left">
						<div class="card-body text-white">
							<h4><b>Users</b></h4>
							<hr>
							<span class="card-icon"><i class="fa fa-users"></i></span>
							<h3 class="user-value"><b><?php echo $conn->query('SELECT * FROM users')->num_rows ?></b></h3>
						</div>
					</div>
					<div class="card col-md-4 offset-1 bg-success ml-4 float-left">
						<div class="card-body text-white">
							<h4><b>Files</b></h4>
							<hr>
							<span class="card-icon"><i class="fa fa-file"></i></span>
							<h3 class="files-value"><b><?php echo $conn->query('SELECT * FROM files')->num_rows ?></b></h3>
						</div>
					</div>
				</div>
                            
                                    <div class="row">
                                        
                                            
                                            <?php
                                            $s = 1;
                                            while($row=$files->fetch_assoc()):
									$name = explode(' ||',$row['name']);
									$name = isset($name[1]) ? $name[0] ." (".$name[1].").".$row['file_type'] : $name[0] .".".$row['file_type'];

									$img_arr = array('png','jpg','jpeg','gif','psd','tif');
									$doc_arr =array('doc','docx');
									$pdf_arr =array('pdf','ps','eps','prn');
									$icon ='fa-file';
									if(in_array(strtolower($row['file_type']),$img_arr))
										$icon ='fa-image';
									if(in_array(strtolower($row['file_type']),$doc_arr))
										$icon ='fa-file-word';
									if(in_array(strtolower($row['file_type']),$pdf_arr))
										$icon ='fa-file-pdf';
									if(in_array(strtolower($row['file_type']),['xlsx','xls','xlsm','xlsb','xltm','xlt','xla','xlr']))
										$icon ='fa-file-excel';
									if(in_array(strtolower($row['file_type']),['zip','rar','tar']))
										$icon ='fa-file-archive';

								?>
                                        <div class="col-lg-2 filecol <?php echo $s; ?>">
                                            <div class="card col-md-12">
                                <div class="card-body">
                                    <span class="fileimage"><i class="fa fa-3x <?php echo $icon ?>"></i></span> 
                                    </div>
                            </div>
                                            <large>
                                                <?php echo $name ?></large>
                                            <br>
                                            <a href="javascript:void(0)" class="custom-menu-list file-option download" data-id = '<?php echo $row['id'] ?>'><span><i class="fa fa-download"></i> </span>Download</a>
                                            </div>
                                            <?php 
                                            
                                            if ($s % 6 == 0)
                                            {
                                                echo '</div><div class="row">';
                                            }
                                            $s++;
                                            endwhile; ?>
                                        
                            </div>
                                
                            

				<div class="row mt-3 ml-3 mr-3" style="display: none;">
						<div class="card col-md-12">
							<div class="card-body">
								<table width="100%">
									<tr>
										<th width="25%" class="">Filename</th>
										<th width="15%" class="">Owner</th>
										<th width="15%" class="">Date</th>
										<th width="15%" class="">File Size</th>
										<th width="20%" class="">Action</th>
									</tr>
									<?php 
                                                                        $files = $conn->query("SELECT f.*,u.name as uname FROM files f inner join users u on u.id = f.user_id where  f.is_public = 1 order by date(f.date_updated) desc");
								while($row=$files->fetch_assoc()):
									$name = explode(' ||',$row['name']);
									$name = isset($name[1]) ? $name[0] ." (".$name[1].").".$row['file_type'] : $name[0] .".".$row['file_type'];

									$img_arr = array('png','jpg','jpeg','gif','psd','tif');
									$doc_arr =array('doc','docx');
									$pdf_arr =array('pdf','ps','eps','prn');
									$icon ='fa-file';
									if(in_array(strtolower($row['file_type']),$img_arr))
										$icon ='fa-image';
									if(in_array(strtolower($row['file_type']),$doc_arr))
										$icon ='fa-file-word';
									if(in_array(strtolower($row['file_type']),$pdf_arr))
										$icon ='fa-file-pdf';
									if(in_array(strtolower($row['file_type']),['xlsx','xls','xlsm','xlsb','xltm','xlt','xla','xlr']))
										$icon ='fa-file-excel';
									if(in_array(strtolower($row['file_type']),['zip','rar','tar']))
										$icon ='fa-file-archive';

								?>
									<tr class='file-item' data-id="<?php echo $row['id'] ?>" data-name="<?php echo $name ?>">
										<td><large><span><i class="fa <?php echo $icon ?>"></i></span> <?php echo $name ?></large>
										<input type="text" class="rename_file" value="<?php echo $row['name'] ?>" data-id="<?php echo $row['id'] ?>" data-type="<?php echo $row['file_type'] ?>" style="display: none">

										</td>
										<td><?php echo ucwords($row['uname']) ?></td>
										<td><?php echo date('Y/m/d h:i A',strtotime($row['date_updated'])) ?></td>
										<td><?php 
                                                                                $filesize = filesize("assets/uploads/".$row['file_path']); //echo $name
                                                                                echo convert_filesize($filesize);
                                                                                
                                                                                ?></td>
										<td><a href="javascript:void(0)" class="custom-menu-list file-option download" data-id = '<?php echo $row['id'] ?>'><span><i class="fa fa-download"></i> </span>Download</a></td>
									</tr>
										
								<?php endwhile; ?>
								</table>
								
							</div>
						</div>
						
				</div>
			</div>

		</div>
	</div>
</div>
<!-- <div id="menu-file-clone" style="display: none;">
	<a href="javascript:void(0)" class="custom-menu-list file-option download"><span><i class="fa fa-download"></i> </span>Download</a>
</div> -->
<script>
	//FILE
	/*$('.file-item').bind("contextmenu", function(event) { 
    event.preventDefault();

    $('.file-item').removeClass('active')
    $(this).addClass('active')
    $("div.custom-menu").hide();
    var custom =$("<div class='custom-menu file'></div>")
        custom.append($('#menu-file-clone').html())
        custom.find('.download').attr('data-id',$(this).attr('data-id'))
    custom.appendTo("body")
	custom.css({top: event.pageY + "px", left: event.pageX + "px"});

	
	

	

})*/
	$(document).bind("click", function(event) {
    $("div.custom-menu").hide();
    $('#file-item').removeClass('active')

});
	$(document).keyup(function(e){

    if(e.keyCode === 27){
        $("div.custom-menu").hide();
    $('#file-item').removeClass('active')

    }
})
	$(".download").click(function(e){
		e.preventDefault()
		window.open('download.php?id='+$(this).attr('data-id'))
	})
</script>