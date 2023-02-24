# Revista Documentation
## Section 1 - How to install & basic setup
To setup Revista:
- Clone the [Github Repo](https://github.com/cosmixcode/revtube) into your webservers public_html or htdocs folder (on Linux, it's /var/www/html)
- Make a new SQL database
- Import the SQL file located at `sql/db.sql` into your database
- Edit the file `assets/mod/db.php` to include your database credentials
 
If all these steps were followed correctly, your instance should look like this:
![Revista: Empty instance](https://user-images.githubusercontent.com/124375533/219940862-bfaf7a1e-46c2-4bbd-bdd3-655f424cfe29.png)
## Section 2 - Prepare for production environment
Now that your instance is setup, you might want to make some changes to your configuration file. To disable the debugging statistics header:
Open the file `assets/mod/db.php` and set `$debug` to false in the file.
# THIS DOCUMENTATION IS NOT YET FINISHED!
It is not recommended to follow this at the moment as steps might change.

