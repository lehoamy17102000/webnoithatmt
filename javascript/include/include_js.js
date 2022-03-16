
function IncludeMainScripts(contextPath,arrFileName){var i;var scriptsToInclude="";var len=arrFileName.length;if(typeof(len)=="undefined")return;for(i=0;i<len;i++)scriptsToInclude+=getScriptInc(contextPath+"/"+arrFileName[i]);document.writeln(scriptsToInclude);};function getScriptInc(scriptFilePath){return "<script src='"+scriptFilePath+"' type='text/javascript'></script>";}
