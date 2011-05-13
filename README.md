SilverStripe Status Message Module
================================

Maintainer Contacts
-------------------
*  Frank Mullenger (frankmullenger_AT_gmail(dot)com)
   [My Blog](http://deadlytechnology.com)

Requirements
------------
* SilverStripe 2.4

Documentation
-------------
To store a message with an attached status in the session and 'flash' that message in the browser.
Based on [code from Will Rossiter](http://silverstripe.org/general-questions/show/13404#post291417)

Installation Instructions
-------------------------
1. Place this directory in the root of your SilverStripe installation, rename the folder 'statusmessage'.
2. Visit yoursite.com/dev/build?flush=1 to rebuild the database.

Usage Overview
--------------
1. Set a status message in a controller or similar e.g: `StatusMessage::set(StatusMessage::STATUS_SUCCESS, "Here is some message");`
2. Get a status message out of the session in a template e.g: `<% include StatusMessage %>`

Known Issues
------------
[GitHub Issue Tracker](https://github.com/frankmullenger/silverstripe-statusmessage/issues)
