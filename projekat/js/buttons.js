var selected_id = undefined;
var selected_name = undefined;

function resettab(name)
{
	if(selected_id != undefined && selected_name != name)
	{
		hideedit(selected_id, selected_name);
	
	
	selected_id = undefined;
	selected_name = undefined;
	}
}

function showedit(id, name)
{
	var els = document.getElementsByClassName('input_'+name+'_'+id);
	var hide_els = document.getElementsByClassName('text_'+name+'_'+id);

	if(selected_id != undefined)
	{
		hideedit(selected_id, selected_name);
	}
	
	selected_id = id;
	selected_name = name;
	
	for(i in els)
	{
		if(els[i].style != undefined)
			els[i].style.display = "block";
	}
	
	for(i in hide_els)
	{
		if(hide_els[i].style != undefined)
			hide_els[i].style.display = "none";
	}
	
	return false;
}

function hideedit(id, name)
{
	var els = document.getElementsByClassName('input_'+name+'_'+id);
	var hide_els = document.getElementsByClassName('text_'+name+'_'+id);
	for(i in els)
	{
		if(els[i].style != undefined)
			els[i].style.display = "none";
	}
	
	for(i in hide_els)
	{
		if(hide_els[i].style != undefined)
			hide_els[i].style.display = "block";
	}
	
	return false;
}