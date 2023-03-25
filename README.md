# Stellarium Plugin For Dokuwiki

A simple plugin that adds support for links that can open objects in [Stellarium](https://stellarium.org/).

## Syntax

```
<stellarium>M31</stellarium>
```

## Installation

1. Install plugin in DokuWiki
2. Make sure that the Stellarium Plugin `Remote Control` is installed and the server running
3. In the `Remote Control`  plugin configuration, enable CORS and add your DokuWiki instance's URL
4. If you have changed the `Remote Control` port or set a password, make sure to set them in your DokuWiki configuration (Admin / Configuration / Stellarium)

### Note regarding the Remote Control password

Please note, if you are using a password, it can be viewed in plain text by any user that is able to see the DokuWiki page containing the Stellarium link!
