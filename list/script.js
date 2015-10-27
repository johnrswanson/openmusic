// register
(function (window) {
		
	window.deleteListItem = function (itemId) {
		$('#plist'+itemId+'').slideUp(300);
		$.post('list/listremove.php', { deleteme: itemId },
		function () {
				// 200, it worked; resource deleted
			}, function () {
				// it didn't delete			
		});
	}
	
	
	
	window.loadBand = function (mytitle){
		var value=mytitle;
		$('#list').hide(300);
		$("#search").val(''+value+'');
		$('#searcher').submit();
		$('#result').show(300);
	}
			

			
						
window.loadUserBands= function (thisuser, name){
		$("#listcontent").html('<i class="fa fa-circle-o-notch fa-spin"></i>');
		var url="list/otherlist.php?userID="+thisuser+"";
		$.getJSON(url,function(json){
			$("#listcontent").html("<p class='listhead'>"+name+"'s Music List</p>");
			$.each(json.otherlist,function(i,fdat){
				$("#listcontent").append(''+
				'<p class="plist" ID="plist'+fdat.ID+'"> <a href="#" onclick="loadBand(\''+fdat.title+'\');">'+fdat.title+'</a></p>');
				$('#result').hide(300);	
				$('#list').show(300);
			});	
		});	
	}

			
window.showUsers= function (){
	$("#listactions").html('');
		$("#listcontent").html('<i class="fa fa-circle-o-notch fa-spin"></i>');
		var url="login/users.php";
		$.getJSON(url,function(json){
			$("#search").val('');
			$("#listcontent").html('<p class="listhead">Users</p>');
			$.each(json.info,function(i,udat){
				$("#listcontent").append(''+
				'<p class="plist" ID="plist'+udat.ID+'"> <a href="#" onclick="loadUserBands(\''+udat.ID+'\', \''+udat.shortname+'\');">'+udat.shortname+'\'s Music</a></p>');
				$('#result').hide(300);	
				$('#list').show(300);
			});	
		});	
	}

	
	window.showList= function (){
		$("#listcontent").html('<i class="fa fa-circle-o-notch fa-spin"></i>');
		var url="list/listdata.php";
			$("#search").val('');
			$("#listactions").html('<a href="#" class="editOn" onclick="showEditButtons()">Edit <i class="fa fa-remove"></i></a>'+
		'<a href="#" class="editOff" onclick="hideEditButtons()">Done <i class="fa fa-remove"></i></a>');
		
		$.getJSON(url,function(json){
			$("#listcontent").html('<p class="listhead">My Music List </p>');
			$.each(json.listinfo,function(i,ldat){
				$("#listcontent").append(''+
				'<p class="plist" ID="plist'+ldat.ID+'">'+
					'<a class="editbutton dlist" ID="dlist'+ldat.ID+'" href="#" onclick="deleteListItem(' + ldat.ID + ');">'+
					'<i class="fa fa-remove"></i></a>'+
					' <a href="#" onclick="loadBand(\''+ldat.title+'\');">'+ldat.title+'</a> ' + 
				'</p>');
				$('#result').hide(300);	
				$('#list').show(300);
			});	
		});	
	}
	
	
	window.addListItem = function (){	
	    var data= $( "#searcher" ).serialize();
	  	var myresult = $.post("list/listconfirm.php" , data);
	  	
	  $('#result').hide(300);
	  window.showList(); 	
	}
		
	window.addNew= function(){
		$("#listadd").html(''+
		'<form  ID="newItem" method="POST">'+
		'<input type="hidden" name="new" value="add">'+
		'<input type="text" name="title" placeholder="Enter A Title"><br>'+
		'<input type="text" name="link" placeholder="Enter Link">'+
		'<input type="button" name="submit" value="Add" onclick="addListItem()">'+
		'</form>');
		$("#listadd").slideDown(300);	
		$(".addon").hide(0);
		$(".addoff").show(0);
		
	}
	
	window.hideAddNew= function(){
		$("#listadd").slideUp(500);
		$(".addoff").hide(0);
		$(".addon").show(0);
		}

	
	window.showEditButtons= function(){
		$(".editbutton").show(0);
		$(".editOn").hide(0);
		$(".editOff").show(0);
		}
		
	window.hideEditButtons= function(){
		$(".editbutton").hide(0);
		$(".editOn").show(0);
		$(".editOff").hide(0);
		}	
}(this));


	$(function() {
	$( "#lightbox" ).draggable({cancel:".ui-sortable",cancel:"form",
	stop: function( z, ui ) {
		$( "#lightbox" ).attr('style', $(this).attr("style") + " width:auto;");
		
		}
	});
  });
  
  
$(document).ready(function(){

	$("#list").html(''+
	'<div id="listactions">'+
		''+
		
		
	'</div>'+
	'<div id="lightbox">'+
		'<a href="" onclick="closeLightBox(); return false;">'+
		'<img src="list/close.png"></a>'+
		'<div id="content"></div>'+
	'</div>'+
	'<div id="listadd"></div>'+
	'<div id="listcontent"></div>'+'');
	
	window.showList();	
});

