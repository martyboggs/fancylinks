# Fancylinks
#### WordPress Theme with Bootstrap and History API

This is the future of a WordPress Theme!

Are you tired of your webpage loading forever?
What if you didn't have to load the header and footer every time!?
Guess what? Give up? You don't! Just use the **Fancylinks Starter Theme**.

That means no reloading of Bootstrap CSS/JS, jQuery, Google Scripts, AddThis, blahblahblah

That means no complex routes to the PHP engine and endless MySQL queries

Turn your website into a **web-flight**!

## How does it work?
Fancylinks has templates like any WordPress theme. The magic happens whenever a link is clicked.

The first time someone visits a site made with Fancylinks, the entire document is downloaded as it normally would. Then as soon as a link is clicked, Fancylinks uses AJAX to return the content without the bulky header and footer.
## What about caching?
Because only necessary content is loaded from the server, your website will already be lightning fast. But to make it even faster, Fancylinks saves all the content into localstorage with a custom expiration you can set in the theme's settings.
## What about SEO?
Each time a link is clicked, HTML5 pushstate will update the URL, the page title and meta tags to the information that belongs on the page. If you are using Google Analytics, just put your tracking code in the theme settings to register a new pageview for every AJAX request.
## Are old browsers supported?
Yes! Fancylinks uses the History.js library from Balupton to bring you HTML5 pushstate functionality and fallbacks for older browsers, and because it is built on top of a normal WordPress templates, browsers with JavaScript disabled can still access your site. You can even use it on your GameBoy!
