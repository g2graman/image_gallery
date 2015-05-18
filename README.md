# image_gallery

A hiring assignment I had been assigned with the following description:

>The following test is to evaluate the skill set of a potential candidate. The test is to
be programmed in PHP, MySQL and any front end tools/frameworks you prefer to
solve the following task. You may reference any material you may require on the
internet or books as this is not only intended to test your ability to program but also
your ability to find help should you need it. You may assume any PHP extensions are
available. You may also include a list of assumptions so that we know that you are
using any other libraries that are available.

>Please include a “.sql” file to initialize the database. You may assume the following
properties for the database:
DB name: itdept_test DB user: itdept_test DB pass: rawitdept

>Create a image gallery [sic.] with the following requirements:
- file uploader
- pagination
- automatic thumbnail generation
- ability to delete multiple images
- display a large version of an image on thumbnail click

------------------

Things I considered
======================

In the interview, it came up that the company uses laravel and uses both NoSQL (connectors for which must have beed added separately to laravel's shipped ORM) and MySQL databases. Using an adapter-based ORM allows you to use a unified syntax for queries. To reflect an example solution to the workflow issue of having to switch between query syntaxes for NoSQL and MySQL, I was considering, on top of building the assignment on laravel, shipping the instance of laravel with a different adapter-based ORM for php. Laravel's Eloquent ORM seems to be adapter-based, but it currently only has support for SQL adapters (quote from https://github.com/illuminate/database -- 'It currently supports MySQL, Postgres, SQL Server, and SQLite'). The only one I could find -- for whatever reason that others don't exist, I don't know -- was UniMapper (https://github.com/unimapper/unimapper).
