<h1 align="center">First World</h1>


Description
--
It's a blog content management application . The admin of this application can create different blogs . Admin can update and delete blogs .The visitor part of this application maintains a good user interface . Visitors will be able to search blogs category-wise . Every blog contains various informations about that blog .
<br>

How To Run This Project
--
**Step - 1** :- Download or clone this project from this repository .

**Step - 2** :- Go to your directory where your downloaded or cloned project is located . Open your terminal there . Gitbash termninal is preferred . Now run this command :-
<pre>
  composer install
</pre>

**Step - 3** :- Then run this command in your terminal :-
<pre>
cp .env.example .env ( if using gitbash )
copy .env.example .env ( if using windows command prompt )
</pre>

**Step - 4** :- Now create a database named firstworld in your phpmyadmin .

**Step - 5** :-Now open .env file and configure it like this
<pre>
DB_DATABASE=firstworld
DB_USERNAME=root
DB_PASSWORD= 
</pre>
**Step - 6** :-Then run this command in your terminal :-
<pre>
php artisan key:generate
</pre>
**Step - 7** :-Then run this command in your terminal :-
<pre>
php artisan migrate
</pre>
**Step - 8** :-Then run this command in your terminal :-
<pre>
php artisan db:seed
</pre>
**Step - 9** :-Now run this command in your terminal :-
<pre>
php artisan serve
</pre>
Now copy that localhost link and paste it in your browser .<br>

**Step - 9** :- Now to access the administrator account log in with password "password" and email "ashiq@gmail.com"

<h3 align="center">Project Screenshoots</h3>
<p align = center><img src="/Screenshoots/01.PNG" width="400" style="max-width:100%;"><img src="/Screenshoots/0002.PNG" width="400" style="max-width:100%;">
</p>

