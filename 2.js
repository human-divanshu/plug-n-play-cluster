
function process() 
{
	task = {};
	var input = JSON.parse(data).content;
	var res =  input.split(/(\s+)/).filter( function(e) { return e.trim().length > 0; } );
	var i;
	for(i=0;i<res.length;i++)
	{
		var word = res[i];
		if(word in task)
		{
			task[word] +=1;
		}
		else
		{
			task[word] =1;
		}
	}
	
	var str = "";	
	for(var key in task){
		var t = key+"	"+task[key]+"\n";
		str = str.concat(t);
		//console.log(str);
	}
	
	return_data = str;
}
process();
