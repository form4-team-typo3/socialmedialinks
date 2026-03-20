.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _admin-manual:

Configuration
=============

Include social links on each page of your website
-------------------------------------------------

Option 1: Static include per typoscript
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

Use 'settings.elements' to configure the visible social media links. Configure as comma separated list of social media link identifiers or uids.

.. code:: typoscript

  lib.socialmedialinks < plugin.tx_form4socialmedialinks_list.show
  lib.socialmedialinks.settings.elements = 2,facebooklikebutton,4

Option 2: Editable global social media links element
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

1. Create a social media links plugin on a sys_folder page
2. Configure the plugin to your needs
3. Add a constant (e.g. socialbookmarks_uid) to declare the uid of the global social media links plugin
4. Include the content per typoscript on your page

.. code:: typoscript

  lib.socialmedialinks = RECORDS
  lib.socialmedialinks.source = {$socialbookmarks_uid}
  lib.socialmedialinks.tables = tt_content
  lib.socialmedialinks.conf.tt_content < tt_content

Placeholder
-----------

All defined placeholder will be replaced while rendering the social media link. That means all occurrences of ###TOKEN### (casesensitive) will be replaced for URL or script value of a social media link.

Available placeholder token
^^^^^^^^^^^^^^^^^^^^^^^^^^^

=========================  ==============================================
Token                      Description
=========================  ==============================================
URL                        The current url of this page urlencoded.
URLGET                     The current url of this page urlencoded and with GET parameters.
TITLE                      The title of the current page.
TWITTER_FOLLOWME_ACCOUNT   The twitter account name. The value can be changed by TypoScript configuration. Default: followme
TWITTER_HASHTAG            The twitter hashtag. The value can be changed by TypoScript configuration. Default: hastag
TWITTER_USERNAME           The twitter username. The value can be changed by TypoScript configuration. Default: username
=========================  ==============================================