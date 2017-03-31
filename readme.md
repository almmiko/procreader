## Procreader

Read news from reddit/programming for fun

- command line posts fetcher from reddit (php artisan fetch:reddit {number_of_posts})
- github login
- user auth
- CRUD posts and categories
- awesome bootstrap design

## REST API

REST API Token based on user credentials

{POST} /api/v1/authenticate
<pre> body => email, password
 response => token </pre>
 
{GET} /api/v1/posts <br />
{GET} /api/v1/categories

<pre> params => limit (optional)
 response => [posts, categories] </pre>
 
{POST} /api/v1/posts <br />
{POST} /api/v1/categories

<pre> params => token
 response => created entity </pre>
 
{PUT} /api/v1/posts/{id} <br />
{PUT} /api/v1/categories/{id}

<pre> params => token
 response => updated entity </pre>
 
{DELETE} /api/v1/posts/{id} <br />
{DELETE} /api/v1/categories/{id}

<pre> params => token </pre>


## Screenshot
![Alt text](http://image.prntscr.com/image/770a763f76b1462fbf58cfbc1df0d288.png "Procreader")

## License

The Procreader is open-sourced project licensed under the [MIT license](http://opensource.org/licenses/MIT).
