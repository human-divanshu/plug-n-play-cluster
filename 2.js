function process(){
	var input = JSON.parse(data).content;
	var res = input.split(/\s+/);
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
	console.log(task);
}
