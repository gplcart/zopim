[![Build Status](https://scrutinizer-ci.com/g/gplcart/zopim/badges/build.png?b=master)](https://scrutinizer-ci.com/g/gplcart/zopim/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gplcart/zopim/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gplcart/zopim/?branch=master)

Zopim is a [GPL Cart](https://github.com/gplcart/gplcart) module that integrates [Zopim live chat](https://www.zopim.com) into your site. In order to use this module you must register an account on zopim.com. Free and paid plans are available.


**Installation**

1. Download and extract to `system/modules` manually or using composer `composer require gplcart/zopim`. IMPORTANT: If you downloaded the module manually, be sure that the name of extracted module folder doesn't contain a branch/version suffix, e.g `-master`. Rename if needed.
2. Go to `admin/module/list` end enable the module
3. Go to https://dashboard.zopim.com > Settings > Widget, copy your widget code and paste it on `admin/module/settings/zopim`
3. Choose when to show the widget by selecting a system trigger