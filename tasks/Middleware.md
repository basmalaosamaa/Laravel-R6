<h1>Middleware :</h1>
   <p>Middleware acts as a layer between the user and the request. It means that when the user requests the server then the request will pass through the middleware, and then the middleware verifies whether the request is authenticated or not. If the user's request is authenticated then the request is sent to the backend. If the user request is not authenticated, then the middleware will redirect the user to the login screen.</p>

<p> additional middleware can be used to perform a variety of tasks except for authentication. For example, CORS middleware is responsible for adding headers to all the responses.<p>

<p>Laravel framework includes several middleware such as authentication and CSRF protection, and all these are located in the <em> app/Http/Middleware </em> directory.</p>

<p>We can say that middleware is an http request filter where you can check the conditions.</p>

<h1>The difference between Global & Custom Middleware :</h1>
<dl>
  <dt>Global Middleware :</dt>
  <dd>Runs on every HTTP request to your application, You can append it to the global middleware stack in bootstrap/app.php file</dd>
  <dd></dd>
  <dt>Custom Middleware :</dt>
  <dd>Specific to certain routes or groups of routes, You create custom middleware to suit your application’s needs. For instance, you might create middleware to validate tokens or handle specific authorization logic</dd>
</dl>