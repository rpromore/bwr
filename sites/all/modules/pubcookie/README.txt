
Pubcookie module
================

DESCRIPTION
-----------
This module integrates pubcookie-based authentication with Drupal.

For more information about pubcookie, see http://pubcookie.org.

PREREQUISITES
-------------
Before using this module, make sure that your pubcookie environment
is set up and running correctly.

The best way to do this is to create a subdirectory on your webserver
with an HTML file and an .htaccess file in it. The .htaccess file
would look something like this:

Authname "Testing"
PubcookieAppID foo
Authtype NetID  <-- or whatever Authtype your organization uses
Require valid-user

Upon trying to access the HTML file, Apache should redirect you
to your pubcookie server, and upon authentication the pubcookie
server will redirect back to your HTML file. When all that is
working, you are ready to try pubcookie.module.

INSTALLATION
------------
Place the entire pubcookie module folder into your third-party modules
directory, typically at sites/all/modules.

Enable the module in Drupal by going to Administer -> Site building ->
Modules.

Set up pubcookie.module by going to Administer -> Site configuration -> 
Pubcookie.

Enable the pubcookie login block by going to Administer -> Site building ->
Blocks.

Ensure that Clean URLs are enabled at Administer -> Site configuration ->
Clean URLs.

ID/E-MAIL EQUIVALENCY
---------------------
Checking the ID/E-mail equivalency checkbox says that the distributed
login ID, such as jsmith@example.edu, is also a valid email address.
In some cases the distributed IDs are not valid email addresses
(for example, your drupal.org ID is not a valid email address).
If this box is checked, during the registration process the pubcookie
module will insert the user's ID into the mail column of the user table.

PUBCOOKIE SITE ACCESS (optional)
--------------------------------
Pubcookie Site Access is a module that is bundled with the pubcookie
module. It allows you to restrict login to a list of known usernames.
For example, if you are creating a site for example.edu, all example.edu
users may long in. By enabling the Pubcookie Site Access module, you
can restrict login to just users tom, dick, and harry by going to
Administer / User management / Change who may access this site.

The permission to add/delete users from the list is called "administer
pubcookie site access".

Perhaps a better name for the module would have been Pubcookie Access
Control List.

LDAP INTEGRATION
----------------
LDAP is integrated into pubcookie module. If you don't want to use LDAP,
leave the LDAP server setting blank.

To have profile fields automatically populated by LDAP when users
register, name the Form Name of the profile field to be the same
as the LDAP directory field name. For example, if your LDAP directory
returns a field called "displayname" containing the user's full name,
go to Administer -> User management -> Profiles and create a textfield 
with the form name "profile_displayname".

AUTO-USERNAME ASSIGNMENT
------------------------
By default Drupal gives new users registering via distributed authentication
a username that is the same as their distributed authentication ID.
You may not want this. For one thing, if a user makes a post and the
user's username is joe@example.edu and that is a real email address
(see ID/E-MAIL EQUIVALENCY, above), that real email address will now
appear in "submitted by" links and be picked up by hungry web crawlers.

By assigning an LDAP field to be used as username, this problem is avoided.

GOTCHAS
-------
If you check the ID/E-mail equivalency checkbox so the mail column of the
user table is populated, and if you have local users with the same email
address, you cannot update the accounts through Administer -> User management
-> edit because Drupal says "The email address joe@example.edu is already
registered." That is because email addresses must be unique in the user table.

TROUBLESHOOTING
---------------
If you see the message "Pubcookie request received over non-secure protocol"
while trying to login, you probably haven't created the directory and
.htaccess file that pubcookie's "Login directory" setting points to.
Or you may not have clean URLs enabled; e.g., your login link is pointing
to q=/login/pc when you want it to point to /login/pc.

WHY IT WORKS
------------
When you click on the Log In link provided by the pubcookie block, it takes
you to the directory you specified for "Login directory" under Administration /
Configuration / People / Pubcookie (by default, 'login'). The pubcookie module
takes this path, adds "pc" (an arbitrary string) to the end of it and -- and
here's the key -- registers it as a menu item in the menu hook. So now
http://yourdomain.com/login/pc is not a nonexistent file but a registered
Drupal path that is "located" inside a directory that's protected by a
.htaccess file restricting the contents to pubcookie-server-authenticated
users. So when you reach that path, the pubcookie module receives a call
to pubcookie_page() and goes from there.
