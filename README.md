# About WIPUP

WIPUP is a web interface of Eadrax. Check it out at http://wipup.org/

You might like WIPUP if you:
 * Love making stuff, and do it often
 * Want a no-nonsense place to track and share your creations
 * Work with different mediums: from images, video, music to code
 * Have a project-oriented workflow
 * Want to visualise your process and progress
 * Prefer open-source software

# System Requirements

 * PHP >= 5.4

The following are unconfirmed requirements for the v3 branch. The most recent
packages are recommended.

# Installing WIPUP

1. You can grab the latest copy of WIPUP from
   http://github.com/Moult/WIPUP
    * **master** - recommended but unstable. Clone head and then pull all git
      submodules via `git submodule update --init --recursive` in project root.
    * Alternatively, grab **master**  branch from the Eadrax repository. This is
      the latest "live" stable version (used by http://wipup.org).  Note that
      this is no longer supported - to install master, please read their README
      instructions instead.

2. Upload a copy of WIPUP to your webserver. It is possible to install WIPUP
   in a subdirectory.

3. Make sure the following directories are writeable by your webserver:
    * application/cache/
    * application/logs/

4. Use the schema in DATABASE to create a new MySQL database

5. Edit configuration files.
    * .htaccess
    * application/bootstrap.php
    * application/config/database.php

6. Read KO docs for extra recommended procedures for public deployment

If you did everything right, point your browser at the location you installed
WIPUP into and everything should work. _As of writing WIPUP is still far from
complete - you can see what has been implemented in `features/`_

# Developer Information

After following the installation instructions above, set up the development
environment as follows:

1. Get [Composer](http://getcomposer.org) `curl -s
   http://getcomposer.org/installer | php` and then run `php composer.phar
   install --dev`. This is needed to set up testing tools (installs into
   `bin/`).
2. Use [Phing](http://www.phing.info/) to run `phing all` in project root. This
   will run `phpspec`, `phpcs`, `pdepend`, `phpmd`, `phpcpd`, `phpdcd`
   and `phpdoc2`. For more information, see `phing -projecthelp`
3. Start developing. Specs are in `spec/`, documentation is in `docs/`. Any
   build logs generated by `phing all-log` useful for CI can be found in
   `build/`. Finally, use `phing` as a shorthand way to run all tests.

That's it! Leave the codebase cleaner than when you found it.
