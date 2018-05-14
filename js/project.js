function outputProjectModule(file, name, group, description, link, icon, linktitle)
{
   document.write("<div class=\"project--container\">");
   document.write("<div class=\"project--photo\">");
   document.write("<img src=\"img/" + file + "\" alt=\"project image\">");
   document.write("</div>");
   document.write("<div class=\"project--text\">");
   document.write("<h2>" + name + "</h2>");
   document.write("<h4>" + group + "</h4>");
   document.write("<br />");
   document.write("<p>" + description + "</p>");
   document.write("<br />");
   document.write("<a class=\"githublink\" href=\"" + link + "\"><i class=\"" + icon + "\" aria-hidden=\"true\"></i>&nbsp;&nbsp;" + linktitle + "</a>");
   document.write("</div>");
   document.write("</div>");
   document.write("<div class=\"separator\">");
   document.write("</div>");
}

function createProjectModules()
{
   for (i = 0; i < pphoto.length; i++)
   {
     outputProjectModule(pphoto[i], pname[i], pgroup[i], pdescription[i], plink[i], plinkicon[i], plinktitle[i]);
   }
}

function outputExperienceModule(file, name, position, description)
{
  document.write("<div class=\"project--container\">");
  document.write("<div class=\"project--photo\">");
  document.write("<img src=\"img/" + file + "\" alt=\"project image\">");
  document.write("</div>");
  document.write("<div class=\"project--text\">");
  document.write("<h2>" + name + "</h2>");
  document.write("<h4>" + position + "</h4>");
  document.write("<br />");
  document.write("<p>" + description + "</p>");
  document.write("<br />");
  document.write("</div>");
  document.write("</div>");
  document.write("<div class=\"separator\">");
  document.write("</div>");
}

function createExperienceModules()
{
  for (i = 0; i < vphoto.length; i++)
  {
    outputExperienceModule(vphoto[i], vname[i], vposition[i], vdescription[i]);
  }
}
