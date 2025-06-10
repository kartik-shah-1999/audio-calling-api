<h1>Project details and setup instructions</h1>

<h3>Requirements</h3>
<ul>
<li>Composer ^v2.5</li>
<li>PHP ^v8.1</li>
<li>MySQL v8.4.5</li> 
</ul>

<h3>Instructions to setup the project</h3>
<ul>
<li>Clone the repo : <code>git clone git@github.com:kartik-shah-1999/audio-calling-api.git</code></li>
<li>Create a .env file : <code>cp .env.example .env</code></li>
<li>Setup database for your project</li>
<li>Configure your database settings in the .env file</li>
<li>Install all the project dependencies : <code>composer install</code></li>
<li>Generate secret key for your application : <code>php artisan key:generate</code></li>
<li>Run the migrations : <code>php artisan migrate</code></li>
<li>Run your application : <code>php artisan serve</code></li>
</ul>