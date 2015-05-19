# image_gallery

A hiring assignment I had been assigned with the following description:

>The following test is to evaluate the skill set of a potential candidate. The test is to
be programmed in PHP, MySQL and any front end tools/frameworks you prefer to
solve the following task. You may reference any material you may require on the
internet or books as this is not only intended to test your ability to program but also
your ability to find help should you need it. You may assume any PHP extensions are
available. You may also include a list of assumptions so that we know that you are
using any other libraries that are available.

>Please include a `.sql` file to initialize the database. You may assume the following
properties for the database:
**DB name**: *itdept_test* **DB user**: *itdept_test* **DB pass**: *rawitdept*

>Create a image gallery with the following requirements:
- file uploader
- pagination
- automatic thumbnail generation
- ability to delete multiple images
- display a large version of an image on thumbnail click

------------------

Things I considered
======================

### Miscellaneous
In the interview, it came up that the company uses laravel and uses both NoSQL (connectors for which must have been added separately to laravel's shipped ORM) and MySQL databases. Using an adapter-based ORM allows you to use a unified syntax for queries. To reflect an example solution to the workflow issue of having to switch between query syntaxes for NoSQL and MySQL, I was considering, on top of building the assignment on laravel, shipping the instance of laravel with a different adapter-based ORM for php. Laravel's Eloquent ORM seems to be adapter-based, but it currently only has support for SQL adapters. Re: quote from https://github.com/illuminate/database -- 
>It currently supports MySQL, Postgres, SQL Server, and SQLite

The only one I could find -- for whatever reason that others don't exist, I don't know -- was UniMapper (https://github.com/unimapper/unimapper).

### Storing Images
It came to the choice of how I would store the images that would be uploaded. From reading [a Microsoft Research paper on BLOBs](http://research-srv.microsoft.com/pubs/64525/tr-2006-45.pdf) I considered that upon being uploaded an image I would serialize it with PHP5's native [`base64_encode`](http://php.net/manual/en/function.base64-encode.php) and use [`chunk_split`](http://php.net/manual/en/function.chunk-split.php) to split the encoding of the image into 256K chunks. Since I had no reason to believe the images would later have to be modified, I was not worried about reading/writing thoroughput to be affected as in the Microsoft paper. But before using `chunk_split` the serialization of the image could be compressed with [`gzcompress`](http://php.net/manual/en/function.gzcompress.php). Each of the 256K chunks would be stored in the database as the [`BLOB`](https://dev.mysql.com/doc/refman/5.0/en/blob.html) type, with each chunk numbered in order so they could reassemble the original image. When it came to retrieving an image from the database, I would query the database for all of the chunks pertaining to the image I wanted, concatenate all of the chunks together, use [`gzuncompress`](http://php.net/manual/en/function.gzuncompress.php) to get a raw serialization of the original image, use [`imagecreatefromstring`](http://php.net/manual/en/function.imagecreatefromstring.php) to create an image resource from the serialization, then [`imagejpeg`](http://php.net/manual/en/function.imagejpeg.php) to spit that image onto a page, notwithstanding pagination. In spite of this elaborate process for avoiding clutter in the file system, however, images were stored as files to simplify logic and due to self-imposed time-constraints.

### App scale vs. Enterprise scale
The following question comes to mind: why is the repository so large for an assignment with such relatively simple requirements?
######TODO: complete this

------------------------------

##Resources
Aside from the embedded citations (which appear as links in this document), throughout development of the assignment I used other reasons. To list a few:

- [An issue I submitted](https://github.com/mitchellh/vagrant/issues/5727), while configuring [Laravel Homestead](http://laravel.com/docs/5.0/homestead)
- [The Laravel documentation](http://laravel.com/docs/5.0)
- [The AngularJS documentation](https://docs.angularjs.org/api)
- [The Angular Material documentation](https://material.angularjs.org/#/)
- [StackOverflow](http://stackoverflow.com/)
