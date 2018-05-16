var text = document.getElementsByClassName("project-desc");
var character_limit = FindShortest();

function FindShortest()
{
	for(var i = 1; i < text.length; i++)
	{
		var shortest = text[0].children[3].innerText.length;
		var prospect = text[i].children[3].innerText.length;
		if(shortest > prospect)
		{
			shortest = text[i].children[3].innerText.length;
		}
	}
	return shortest - (shortest/2);
}

function ReduceText()
{
	var desc;
	var link="";
	for(var i = 0; i < text.length; i++)
	{
		if(character_limit < text[i].children[3].innerText.length)
		{
			desc = text[i].children[3].innerText;
			desc = desc.substring(0,character_limit);
			text[i].children[3].innerText = desc;
			link = "... <a class=\"readmore\" href=\"projects.php#project" + i + "\">Read More</a>";  
			text[i].children[3].innerHTML += link;
		}
	}
}

ReduceText();
