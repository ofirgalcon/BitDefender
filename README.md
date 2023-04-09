BitDefender Module
===================

Gets data about the current BitDefender status.

Requires BitDefender API key

Run the command below replacing $APIKEY with your BitDefender API key.

defaults write /Library/Preferences/com.galcon.bitdefender.plist YOUR_API_KEY $APIKEY

Table Schema
----

* av_enabled - BOOLEAN - AV Enabled
* product_version - VARCHAR(255) - Product Version
* av_signature_version - VARCHAR(255) - AV Signature Version
* last_update - INT - Last Update
* error_num - INT - Error
