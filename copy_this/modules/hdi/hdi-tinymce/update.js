var r = require('request'),
    f = require('fs'),
    c = require('cheerio'),
    z = require('zlib');


r("http://www.tinymce.com/download/download.php", function(err, res, body) {
	console.info("fetching newest tinymce zip url");
	if (err || res.statusCode != 200)
	{
        console.error(err) // Print the google web page.
        process.exit(1);
    }
    var url = c.load(body)('#twocolumns a.track-tinymce').eq(0).attr('href');
    console.log('downloading '+url+' ...');
    
    r(url).pipe(f.createWriteStream('temp_tinymce.zip'));
    console.log('newest tinymce version downloaded');
    
    z.unzip(f.readFileSync('temp_tinymce.zip'), function() {
        //dance
    });
    r(url).pipe(f.createWriteStream('tinymce_zip'));
    console.log('tinymce updated');
    
    
    
	
	/*
	var file = fs.createWriteStream("file.html");
    var url = require('cheerio').load(response)('#twocolumns a.track-tinymce').eq(0).attr('href');
    console.log(url);
    response.pipe(file);
    */
});
