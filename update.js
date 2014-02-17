var http = require('http');
var fs = require('fs');


http.get("http://www.tinymce.com/download/download.php", function(response) {
	console.log("yolo");
	//console.log(response);
	/*
	var file = fs.createWriteStream("file.html");
    var url = require('cheerio').load(response)('#twocolumns a.track-tinymce').eq(0).attr('href');
    console.log(url);
    response.pipe(file);
    */
});
