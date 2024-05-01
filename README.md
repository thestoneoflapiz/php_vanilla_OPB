<div align="center">
  <img src="assets/blog.png" alt="Logo" height="80">

  <h3 align="center">ONE PAPER BLOG</h3>

  <p align="center">
    A one paper blog with a simple admin blog editor showcasing a PHP vanilla mini project with routing & jQuery ajax. 
  </p>
</div>

------


## Built With

This section list major frameworks/libraries used create the mini project.

* [![PHP 8.2.4][php.net]][php-url]
* [![Bootstrap 5.3.3][Bootstrap.com]][Bootstrap-url]
* [![JQuery 3.1.7][JQuery.com]][JQuery-url]

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[php.net]: https://img.shields.io/badge/PHP%208.2.4-7A86B8?style=for-the-badge&logo=php&logoColor=white
[php-url]: https://www.php.net/
[Bootstrap.com]: https://img.shields.io/badge/Bootstrap%205.3.3-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com
[JQuery.com]: https://img.shields.io/badge/jQuery%203.1.7-0769AD?style=for-the-badge&logo=jquery&logoColor=white
[JQuery-url]: https://jquery.com 

## Installation

_using WINDOWS OS follow this steps._

1. Install XAMPP or use any alternative open-source cross-platform web server solution app
2. Navigate to `C:\xampp\htdocs`
3. Clone the repo
   ```sh
    git clone https://github.com/thestoneoflapiz/php_vanilla_OPB.git
   ```
4. Open phpMyAdmin to import `blog.sql` database
5. Configure `database.php` dbHost, dbUser, and dbPass
6. Use Notepad and run as admin to open XAMPP Vhost `C:\xampp\apache\conf\extra\httpd-vhosts` and copy and paste the content from `vhost.txt` then save
7. Use Notepad and run as admin to open `C:\Windows\System32\drivers\etc\hosts` and paste this <br/>
`127.0.0.1		onepaperblog.local` <br/>
then save
8. Stop and start Apache & MySQL from XAMPP
9. Paste `http://onepaperblog.local` to any browser's search

_If you experience XAMPP technical issues feel free to check their documentation or seek help online._

## Access

default access: <br/>
<b>username:</b> superadmin <br/>
<b>password:</b> admin123 <br/>