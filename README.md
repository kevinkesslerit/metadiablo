# metadiablo.com

MetaDiablo is a community made project for Diablo II, and Diablo II: Lord of Destruction that is founded on a legit gaming vision that is to be as close to what we feel was intended by Blizzard North (to have fun, and enjoy playing, including support for game mods/servers such as D2GA). This means we do not support any sort of battle.net hacking, cheating, or exploiting.

## Installation

1. Setup [devilbox](https://devilbox.readthedocs.io/en/latest/read-first.html).
2. Setup [valid HTTPS](https://devilbox.readthedocs.io/en/latest/intermediate/setup-valid-https.html).
3. Run the [PHP container](https://devilbox.readthedocs.io/en/latest/getting-started/enter-the-php-container.html).
4. Install a fresh [Laravel](https://laravel.com/docs/6.x/installation) directory in `/shared/httpd` with `composer create-project --prefer-dist laravel/laravel {website}.com "6.*"` where {website} can be any name you choose. We recommend that you use metadiablo.com.
5. Create a symlink for htdocs to stop devilbox from complaining. While in your main Laravel directory run `ln -s /shared/httpd/{website}.com/public htdocs`
6. Modify your hosts file and add `127.0.0.1 {website}.com.loc`. [Windows](https://devilbox.readthedocs.io/en/latest/howto/dns/add-project-dns-entry-on-win.html),
 [Linux](https://devilbox.readthedocs.io/en/latest/howto/dns/add-project-dns-entry-on-linux.html), or [MacOS](https://devilbox.readthedocs.io/en/latest/howto/dns/add-project-dns-entry-on-mac.html)
7. Set up the mysql database in phpmyadmin using whatever login credentials you wish, it must reflect your Laravel `.env` configuration file.
8. Run `composer install` in the website's main directory.
9. Run `php artisan migrate:fresh --seed` in the website's main directory.
10. Create your first user in phpmyadmin or mariadb (yourself) The flags are base64 encoded, and your password is a Bcryt encrypted hash. (there are many bcrypt generators out there; I recommend that you use a completely new password for security reasons)


## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.


## License
[GNU AGPLv3](https://choosealicense.com/licenses/agpl-3.0/)