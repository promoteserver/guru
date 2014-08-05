// JavaScript Document

//remove a category from list
function deleteCat(idcat){
	if (confirm('I you sure ?')){
		//alert('Aceptaste');
		window.location ='delete_user.php?cat='+idcat;
	}else{
		return false;
	}
}

function deletePost(idcat){
	if (confirm('I you sure ?')){
		//alert('Aceptaste');
		window.location ='delete_singlePost.php?cat='+idcat;
	}else{
		return false;
	}
}



function deleteEvent(idcat){
	if (confirm('I you sure ?')){
		//alert('Aceptaste');
		window.location ='delete_singleEvent.php?cat='+idcat;
	}else{
		return false;
	}
}

//remove a pic from album
function deletePic(idpic){
	if (confirm('I you sure ?')){
		//alert('Aceptaste');
		window.location ='delete_pic.php?pic='+idpic;
	}else{
		return false;
	}
}
function deletePicEvent(idpic){
	if (confirm('I you sure ?')){
		//alert('Aceptaste');
		window.location ='delete_pic_event.php?pic='+idpic;
	}else{
		return false;
	}
}

function deletePicPost(idpic){
	if (confirm('I you sure ?')){
		//alert('Aceptaste');
		window.location ='delete_pic_post.php?pic='+idpic;
	}else{
		return false;
	}
}

function deletePicPaint(idpic){
	if (confirm('I you sure ?')){
		//alert('Aceptaste');
		window.location ='delete_pic_paints.php?pic='+idpic;
	}else{
		return false;
	}
}

function addDetails(idpic){
	$("#thumb_"+idpic).fadeIn(1000);
}

//Album is not activated
function unsetAlbum(idA){
	window.location = 'album_status.php?alb='+idA+'&ac=off';
}

function setAlbum(idA){
	window.location = 'album_status.php?alb='+idA+'&ac=on';
}

function warningAlbum(){
	alert('No se puede activar más de 3 Album !');
}

function setAlbumBy(letter,idA){
	window.location = 'setalbumby.php?ord='+letter+'&alb='+idA;
}