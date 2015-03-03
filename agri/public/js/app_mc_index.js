//------------------------------------
// @calling : 
// @purpose :
// @date    :
// @argment :
// @return  :
//------------------------------------

function show_report(dir, id, mmdd){
  w = window.open(dir + "/mc_show.php?id="+id+"&mmdd="+mmdd, "_blank" );
};

function edit_mc(dir, id ){
  w = window.open(dir + "/mc_edit.php?id="+id, "_blank" );
};

onload = function() {
};

