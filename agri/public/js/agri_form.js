//------------------------------------
// @calling : 
// @purpose :
// @date    :
// @argment :
// @return  :
//------------------------------------

onload = function() {
  //$('div#id-div-version').append('<p>version: ' + mAppVersion +  '</p>')
		
  $('a.btn-delete').click(function(e){
// alert( $('input#h_mc_id').val() );
	if(confirm('delete [micon] OK? ID=' + $('input#h_mc_id').val())){
	  location.href="/agri/php/mc_delete.php?id="+ $('input#h_mc_id').val();
	}
  });
  
  $('a#btn-save-new').click(function(e){
  	 var sName= $('input#txt_mc_name').val();
   if( sName==''){
     alert('Failure, [Micon name ] is Input ,require');
     return false;
   }
  	document.form1.submit();
  });
  
  $('a#btn-save-edit').click(function(e){
  	 var sName= $('input#txt_mc_name').val();
   if( sName==''){
     alert('Failure, [Micon name ] is Input ,require');
     return false;
   }
  	document.form1.submit();
  });
  
  
};

