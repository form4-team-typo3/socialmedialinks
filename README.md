# form4 Social Media Links

Short overview for Git / Packagist; the **full manual** is `Documentation/` (Sphinx) and, once published, [docs.typo3.org](https://docs.typo3.org/p/form4/form4-socialmedialinks/main/en-us/).

This TYPO3 extension stores **social and share links** as backend records (URL or small HTML fragment). Editors choose which records appear on a page via the provided **content element**; the same list can be rendered **globally** with TypoScript. **Icons** and **placeholders** (e.g. current page URL or title) are optional and filled from TypoScript.

**Requirements:** TYPO3 13.4

**Install**

```bash
composer require form4/form4-socialmedialinks
```

Or install from the [TYPO3 Extension Repository (TER)](https://extensions.typo3.org/extension/form4_socialmedialinks).

**Typical setup:** Activate the extension, include the static TypoScript *“form4 Social Media Links”*, keep link records in a sysfolder, add the “Social Media Links” plugin on the target page, and select records in the plugin.

More detail (installation, TypoScript, update script, changelog): see `Documentation/`.

**Packagist:** Package name `form4/form4-socialmedialinks` — maintainers should confirm repo URL and auto-update on [packagist.org](https://packagist.org/packages/form4/form4-socialmedialinks). See [Publish your extension](https://docs.typo3.org/m/typo3/reference-coreapi/main/en-us/ExtensionArchitecture/PublishExtension/Index.html).

License: GPL-2.0-or-later · [form4 GmbH](mailto:typo3@form4.de)
