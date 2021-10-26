<?php 
include 'db_connect.php';
$folder_parent = isset($_GET['fid'])? $_GET['fid'] : 0;
$folders = $conn->query("SELECT * FROM folders where parent_id = $folder_parent and user_id = '".$_SESSION['login_id']."'  order by name asc");


$files = $conn->query("SELECT * FROM files where folder_id = $folder_parent and user_id = '".$_SESSION['login_id']."'  order by name asc");

?>
<style>
	.folder-item{
		cursor: pointer;
	}
	.folder-item:hover{
		background: #eaeaea;
	    color: black;
	    box-shadow: 3px 3px #0000000f;
	}
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
.file-item{
	cursor: pointer;
}
a.custom-menu-list:hover,.file-item:hover,.file-item.active {
    background: #80808024;
}
table th,td{
	/*border-left:1px solid gray;*/
}
a.custom-menu-list span.icon{
		width:1em;
		margin-right: 5px
}
.input-search{
	display: flex;
}
.input-search-append{
	display: flex;
}
div{
	color: #000;
}
div b{
	font-weight: bold;
}
.folder-item{
	padding: .5rem;
    border-radius: unset;
    margin-right: 1.25rem;
}
.custom-file{
	display: flex;
}
.custom-file-input{
    opacity: 0;
}
.custom-file-label{
	position: absolute;
    top: 0;
    right: 0;
    left: 72px;
    z-index: 1;
    height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: .25rem;
}
.custom-file-label::after{
	position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 3;
    display: block;
    height: calc(1.5em + .75rem);
    padding: .375rem .75rem;
    line-height: 1.5;
    color: #495057;
    content: "Browse";
    background-color: #e9ecef;
    border-left: inherit;
    border-radius: 0 .25rem .25rem 0;
}
</style>
<div class="state-overview">
	<div class="row">
		<div class="col-xl-12 col-md-12 col-12">
			<div class="container-fluid">
				<nav aria-label="breadcrumb ">
					  <ol class="breadcrumb">
					  
					<?php 
						$id=$folder_parent;
						while($id > 0)
						{ 

						$path = $conn->query("SELECT * FROM folders where id = $id  order by name asc")->fetch_array(); 
					?>
						<li class="breadcrumb-item text-success"><?php echo $path['name']; ?></li>
					<?php
						$id = $path['parent_id'];	
						} 
					?> 
						<li class="breadcrumb-item"><a class="text-success" href="index.php?page=files">Files</a></li>
					  </ol>
				</nav>
				<div class="row">
						<div class="col-xl-12 col-md-14 col-12">
							<button class="btn btn-success btn-sm" id="new_folder"><i class="fa fa-plus"></i> New Folder</button>
						
							<button class="btn btn-success btn-sm ml-4" id="new_file"><i class="fa fa-upload"></i> Upload File</button>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-lg-8 offset-4 input-search">
		  				<input type="text" class="form-control" id="search" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
		  				<div class="input-search-append">
		   					 <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-search"></i></span>
		  				</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<h4><b>Folders</b></h4>
					</div>
				</div>
				<hr>
				<div class="row">
					<?php 
					while($row=$folders->fetch_assoc()):
					?>
						<div class="card col-md-3 mt-2 ml-2 mr-2 mb-2 folder-item" data-id="<?php echo $row['id'] ?>">
							<div class="card-body">
									<large><span><i class="fa fa-folder"></i></span><b class="to_folder"> <?php echo $row['name'] ?></b></large>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
				<hr>

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
                                <?php
                                
                                if ($_SESSION['login_type'] === "1")
                                {
                                    ?>
                                    <a href="javascript:void(0)" class="custom-menu-list file-option delete" data-id = '<?php echo $row['id'] ?>'><span><i class="fa fa-trash"></i> </span> Delete</a> 
                                    <?php
                                }
                                ?>
                                </div>
                                <?php 
                                
                                if ($s % 6 == 0)
                                {
                                    echo '</div><div class="row">';
                                }
                                $s++;
                                endwhile; ?>
                            
                </div>

				<div class="row" style="display: none;">
					<div class="card col-md-12">
						<div class="card-body">
							<table width="100%">
								<tr>
									<th width="25%" class="">Filename</th>
									<th width="25%" class="">Date</th>
									<th width="15%" class="">File Size</th>
									<th width="20%" class="">Action</th>
								</tr>
								<?php 
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
								<tr  data-id="<?php echo $row['id'] ?>" data-name="<?php echo $name ?>">
									<td><large><span><i class="fa <?php echo $icon ?>"></i></span><?php echo $name ?></large>
									<input type="text" class="rename_file" value="<?php echo $row['name'] ?>" data-id="<?php echo $row['id'] ?>" data-type="<?php echo $row['file_type'] ?>" style="display: none">

									</td>
									<td><?php echo date('Y/m/d h:i A',strtotime($row['date_updated'])) ?></td>
									
                                                                        <td>
                                                                            <?php
                                                                            $filesize = filesize("assets/uploads/".$row['file_path']); //echo $name
                                                                                echo convert_filesize($filesize);
                                                                            ?>
                                                                        </td>
									<td class="file-action">
										<a href="javascript:void(0)" class="custom-menu-list file-option edit" data-id = '<?php echo $row['id'] ?>'><span><i class="fa fa-edit"></i></span>Rename</a>
										<a href="javascript:void(0)" class="custom-menu-list file-option download" data-id = '<?php echo $row['id'] ?>'><span><i class="fa fa-download"></i> </span>Download</a>
										<a href="javascript:void(0)" class="custom-menu-list file-option delete" data-id = '<?php echo $row['id'] ?>'><span><i class="fa fa-trash"></i> </span>Delete</a> 
									</td>
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
		
<div id="menu-folder-clone" style="display: none;">
	<a href="javascript:void(0)" class="custom-menu-list file-option edit">Rename</a>
	<a href="javascript:void(0)" class="custom-menu-list file-option delete">Delete</a>
</div>
<div id="menu-file-clone" style="display: none;">
	<a href="javascript:void(0)" class="custom-menu-list file-option edit"><span><i class="fa fa-edit"></i> </span>Rename</a>
	<a href="javascript:void(0)" class="custom-menu-list file-option download"><span><i class="fa fa-download"></i> </span>Download</a>
	<a href="javascript:void(0)" class="custom-menu-list file-option delete"><span><i class="fa fa-trash"></i> </span>Delete</a>
</div>

<script>
	
	$('#new_folder').click(function(){
		uni_modal('','manage_folder.php?fid=<?php echo $folder_parent ?>')
	})
	$('#new_file').click(function(){
		uni_modal('','manage_files.php?fid=<?php echo $folder_parent ?>')
	})
	$('.folder-item').dblclick(function(){
		location.href = 'index.php?page=files&fid='+$(this).attr('data-id')
	})
	$('.folder-item').bind("contextmenu", function(event) { 
    event.preventDefault();
    $("div.custom-menu").hide();
    var custom =$("<div class='custom-menu'></div>")
        custom.append($('#menu-folder-clone').html())
        custom.find('.edit').attr('data-id',$(this).attr('data-id'))
        custom.find('.delete').attr('data-id',$(this).attr('data-id'))
    custom.appendTo("body")
	custom.css({top: event.pageY + "px", left: event.pageX + "px"});

	$("div.custom-menu .edit").click(function(e){
		e.preventDefault()
		uni_modal('Rename Folder','manage_folder.php?fid=<?php echo $folder_parent ?>&id='+$(this).attr('data-id') )
	})
	$("div.custom-menu .delete").click(function(e){
		e.preventDefault()
		_conf("Are you sure to delete this Folder?",'delete_folder',[$(this).attr('data-id')])
	})
})

	/*//FILE
	$('.file-item').bind("contextmenu", function(event) { 
    event.preventDefault();

    $('.file-item').removeClass('active')
    $(this).addClass('active')
    $("div.custom-menu").hide();
    var custom =$("<div class='custom-menu file'></div>")
        custom.append($('#menu-file-clone').html())
        custom.find('.edit').attr('data-id',$(this).attr('data-id'))
        custom.find('.delete').attr('data-id',$(this).attr('data-id'))
        custom.find('.download').attr('data-id',$(this).attr('data-id'))
    custom.appendTo("body")
	custom.css({top: event.pageY + "px", left: event.pageX + "px"});

	
	

})*/
//FILE


	$('.file-item').click(function(){
		if($(this).find('input.rename_file').is(':visible') == true)
    	return false;
		uni_modal($(this).attr('data-name'),'manage_files.php?<?php echo $folder_parent ?>&id='+$(this).attr('data-id'))
	})
	$(document).bind("click", function(event) {
    $("div.custom-menu").hide();
    $('#file-item').removeClass('active')

});
	$(document).keyup(function(e){

    if(e.keyCode === 27){
        $("div.custom-menu").hide();
    $('#file-item').removeClass('active')

    }

});
	$(document).ready(function(){
		$('#search').keyup(function(){
			var _f = $(this).val().toLowerCase()
			$('.to_folder').each(function(){
				var val  = $(this).text().toLowerCase()
				if(val.includes(_f))
					$(this).closest('.card').toggle(true);
					else
					$(this).closest('.card').toggle(false);

				
			})
			$('.to_file').each(function(){
				var val  = $(this).text().toLowerCase()
				if(val.includes(_f))
					$(this).closest('tr').toggle(true);
					else
					$(this).closest('tr').toggle(false);

				
			})
		})
	})
	function delete_folder($id){
		start_load();
		$.ajax({
			url:'ajax.php?action=delete_folder',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp == 1){
					alert_toast("Folder successfully deleted.",'success')
						setTimeout(function(){
							location.reload()
						},1500)
				}
			}
		})
	}
	function delete_file($id){
		start_load();
		$.ajax({
			url:'ajax.php?action=delete_file',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp == 1){
					alert_toast("File successfully deleted.",'success')
						setTimeout(function(){
							location.reload()
						},1500)
				}
			}
		})
	}
$(".edit").click(function(e){
		e.preventDefault()
		$('.rename_file[data-id="'+$(this).attr('data-id')+'"]').siblings('large').hide();
		$('.rename_file[data-id="'+$(this).attr('data-id')+'"]').show();
	})
	$(".delete").click(function(e){
		e.preventDefault()
		_conf("Are you sure to delete this file?",'delete_file',[$(this).attr('data-id')])
	})
	$(".download").click(function(e){
		e.preventDefault()
		window.open('download.php?id='+$(this).attr('data-id'))
	})
$('.rename_file').keypress(function(e){
	debugger;
		var _this = $(this)
		if(e.which == 13){
			start_load()
			$.ajax({
				url:'ajax.php?action=file_rename',
				method:'POST',
				data:{id:$(this).attr('data-id'),name:$(this).val(),type:$(this).attr('data-type'),folder_id:'<?php echo $folder_parent ?>'},
				success:function(resp){
					if(typeof resp != undefined){
						resp = JSON.parse(resp);
						if(resp.status== 1){
								_this.siblings('large').find('b').html(resp.new_name);
								end_load();
								_this.hide()
								_this.siblings('large').show()
						}
					}
				}
			})
		}
	})
</script>