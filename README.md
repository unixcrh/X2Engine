# X2CRM 3.7 #
Release 3.7.3 2/18/2014

New in 3.7.3 (see [CHANGELOG](CHANGELOG.md) for full history):

* Multiple security vulnerabilities patched in web forms, data import/export, and docs import/export
* "Lookup" fields performance and functionality restoration overhaul:
  * Search/sort works without sorting on columns in joined tables
  * All such fields store all the necessary data to create a link, eliminating joins in grid view queries
* More robust error handling in the module importer
* Consistent branding throughout app (see [release notes](RELEASE-NOTES.md) for full details)
* Date/time picker input widget now available in relevant grid view column filters
* New "action timer sum" field type computes/displays sums of time spent on a record.
* Fields editor has the ability to create indexes on fields
* Users can add custom percentage type fields via the fields manager
* New in Professional Edition:
  * "Case Timer" has been generalized to the "action timer" and is available in most modules now
  * Action timer editing interface available to admins and users with action backdating privileges
  * Case creation via the email dropbox (experimental)
* Fixed Bugs:  
  * [254](http://x2software.com/index.php/bugReports/254): User Report  
  * [800](http://x2software.com/index.php/bugReports/800): User Report  
  * [803](http://x2software.com/index.php/bugReports/803): Unable to resolve the request "financiala33/financiala33/index".  
  * [848](http://x2software.com/index.php/bugReports/848): Undefined variable: timestamp  
  * [850](http://x2software.com/index.php/bugReports/850): Could not attach files to emails (user report)  
  * [867](http://x2software.com/index.php/bugReports/867): MyBugReportsController and its behaviors do not have a method or closure named "getDateRange".  
  * [875](http://x2software.com/index.php/bugReports/875): User Report  
  * [885](http://x2software.com/index.php/bugReports/885): User Report  
  * [888](http://x2software.com/index.php/bugReports/888): User Report
  * [935](http://x2software.com/index.php/bugReports/935): Unable to resolve the request "products/id/update".
  * [939](http://x2software.com/index.php/bugReports/939): No es posible resolver la solicitud "docs/view/id"
* Minor/unlisted bugs fixed:
  * (Professional Edition) "Record viewed" X2Flow trigger wasn't working in Contacts
  * API failures due to Profile class not being auto-loaded
  * 404 error on "convert to invoice" button in Quotes
  * Pro-only link was displayed (incorrectly) in the Marketing module
  * Backwards compatibility safeguards in link type fields migration script
* Numerous additional bugs reported via our forums have been fixed - thanks!

# Introduction #
Welcome to  X2CRM!
X2CRM is a next-generation,  open source social sales application for small and 
medium sized businesses.  X2CRM  was designed to  streamline  contact and sales 
actions into  one  compact blog-style user interface.  Add to this contact  and
colleague social feeds  and  sales  representatives  become  smarter  and  more
effective resulting in increased sales and higher customer satisfaction.

X2CRM is  unique  in the  crowded  Customer Relationship Management (CRM) field 
with its compact blog-style user interface. Interactive and collaborative tools 
which  users are already  familiar  with from  social networking  sites such as  
tagging,  pictures,  docs,  web pages,  group chat, discussions boards and rich 
mobile and tablet apps are combined within a  compact  and  fast  contact sales 
management application. Reps  are  able  to  make  more  sales  contacts  while 
leveraging the combined  social intelligence of peers enabling them to add more 
value to their customer interactions resulting in higher close rates. 

# Documentation and Support #
* [Community Forums](http://x2community.com/)
* [Wiki](http://wiki.x2engine.com)
* [Class Reference](http://doc.x2engine.com/)
* [Live Demo Server](http://demo.x2engine.com/)

# System Requirements #
* A web server that can execute PHP
* A password-protected MySQL database server connection, and a database on 
  which the user of the connection has full permissions rights (i.e. SELECT, 
  DROP, CREATE and UPDATE)
* PHP 5.3 or later
* PHP must be run as the same system user that owns the directory where X2CRM 
  will be installed
* The server must have internet access for automatic updates
* The server must be publicly accessible for web lead capture, service requests 
  and email tracking to work

X2CRM comes with a requirements check script, 
[requirements.php](https://x2planet.com/installs/requirements.php) (also can be 
found in x2engine/protected/components/views), which can be uploaded by itself 
to your server. Simply visit the script in your browser to see if your server 
will run X2CRM.

# Installation #
1. Upload X2Engine to the web directory of your choice. Be sure to set your FTP 
   client to use binary mode.
2. Create a new MySQL database for X2Engine to use
3. Browse to the x2engine folder and you will be redirected to the installer.
4. Fill out the form, click install, and that's it!
5. You are now ready to use X2Engine.  If you chose to install Dummy Data,  you 
   will have numerous sample records (i.e. about 1100 contacts) to play with.


# Creating the Action Reminder Cronjob #
As we don't have access to your server, you'll need to create a cronjob to make 
the server send out action reminders. You can either do this on your own server 
or use a free service on the internet to run it for you.  All you need to do is 
have the cronjob access the url once a day to send out action reminders:

    http://www.[yourserver].com/[path to x2engine]/actions/sendReminder

# Languages #
Most of the  included language packs were produced by  copy/paste  from  Google 
Translate and copy/paste.  If you have any  corrections,  suggestions or custom 
language packs, please feel free to post them on www.x2community.com

We greatly appreciate your input for internationalization!


# Tips and Tricks #
X2CRM  is designed to be intuitive,  but we have included a few tips and tricks 
to get you started!
* To change the background color,  menu color,  language  or any other setting, 
  click on Profile in the top right and select 'Settings'.
* The admin's settings  can be found from the admin page,  as well as a variety 
  of other tools to help you manage the application.
* Contacts are ordered by most  recently  updated  by default,  but this can be 
  changed by clicking on one of the other attributes to sort them differently.
* It is not recommended to use the Import Data function on the admin tab UNLESS 
  you are importing data that was exported from a  prior version.  The template 
  is very finnicky and prone to bugs,  so if you do it  without  using properly 
  exported data, we take no responsibility for errors.


# Known Issues #
- The  .htaccess  file  may  cause  issues  on  some  servers.  If  you  get  a 
  500 Internal Server Error  when you  try  to load the installer,  delete  the
  .htaccess file (the application will still work without it.)
- eAccelerator may cause PHP errors on various pages  ("Invalid Opcode").  This 
  is due to a bug in eAccelerator, and can be fixed by disabling or updating
  eAccelerator.
