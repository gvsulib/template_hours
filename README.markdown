# Today's Hours for Template

PHP script triggered each morning by a cron job, and a small jQuery function that loads today's hours in remotely-hosted systems

## Getting Started

The PHP file outputs formatted HTML suitable for inclusion into any GVSU Library website. All you need to do is include the HTML in the `div` with the `.library-hours` class in the header. A sample JavaScript/jQuery file using the `.load()` method is also included.

## Background

This relies heavily on [Kyle Felker's Hours API](https://github.com/gvsulib/hours_api) for the GVSU Libraries. But the API requires a server call for each location, and since this will be on every web page on all of our tools, I wanted to cut things down to a single server call for the hours each time the page loads. So the PHP script runs each morning at 2:15am and generates a new PHP file, which contains a PHP header allowing cross-domain requests, and the HTML for the header hours. You can grab the hours in any way you want, but since all of our external sites use jQuery, I am using the extremely simple `.load()` method. 

## License

The code in this project is licensed under MIT license.