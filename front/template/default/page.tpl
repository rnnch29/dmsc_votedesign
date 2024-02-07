<!DOCTYPE html>
<html lang="{$langon}">

<head>
    {include file="{$incfile.metatag}" title=title}
    {include file="{$incfile.loadstyle}" title=title}
</head>

<body>
    {include file="{$incfile.header}" title=title}
    {include file="{$fileInclude|templateInclude}" title=pageContent}
    {include file="{$incfile.loadscript}" title=title}
    {include file="{$incfile.footer}" title=title}
</body>

</html>