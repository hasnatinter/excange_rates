<p>RUN docker composer up -d --build</p>
<p>RUN docker composer exec php composer install</p>
<p>RUN docker composer exec php php artisan migrate --seed</p>
<p>The API will be available at <b>http://localhost:90/api/products?currency=EUR</b></bb></p>
<p>Scheduler will run by default</p>
<p>For tests run <b>docker composer exec php php artisan test</b></p>