# TestCronInterface

The key words "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL NOT", "SHOULD",
"SHOULD NOT", "RECOMMENDED", "MAY", and "OPTIONAL"
in this document are to be interpreted as described in
[RFC 2119](https://www.ietf.org/rfc/rfc2119.txt).

**Table of Contents**

* [Requirements](#requirements)
* [Installation](#installation)
    * [Composer](#composer)
* [Configuration](#configuration)
* [Other information](#other-information)
    * [Correlations](#correlations)
    * [Bugs](#bugs)
    * [License](#license)

## Requirements

* PHP: [![Minimum PHP Version](https://img.shields.io/badge/Minimum_PHP-8.2.x-blue.svg)](https://php.net/) [![Maximum PHP Version](https://img.shields.io/badge/Maximum_PHP-8.3.x-blue.svg)](https://php.net/)
* ILIAS: [![Minimum ILIAS Version](https://img.shields.io/badge/Minimum_ILIAS-10.x-orange.svg)](https://ilias.de/) [![Maximum ILIAS Version](https://img.shields.io/badge/Maximum_ILIAS-10.x-orange.svg)](https://ilias.de/)

## Installation

This plugin MUST be installed as a
[User Interface Plugin](https://www.ilias.de/docu/goto_docu_pg_39405_42.html).

The files MUST be saved in the following directory:

	<ILIAS>/public/Customizing/global/plugins/Services/UIComponent/UserInterfaceHook/TestCronInterface

Correct file and folder permissions MUST be
ensured by the responsible system administrator.

The plugin's files and folder SHOULD NOT be created as root.

### Composer

After the plugin files have been installed as described above,
please install the [`composer`](https://getcomposer.org/) dependencies:

```bash
cd <ILIAS>/public/Customizing/global/plugins/Services/UIComponent/UserInterfaceHook/TestCronInterface
composer install --no-dev
```

Developers MUST omit the `--no-dev` argument.

## Configuration

None

To update the baseline file for `Psalm`, you MUST follow these steps:

1. Execute:

```bash
vendor/bin/psalm -c CI/Psalm/psalm.xml --set-baseline=./CI/Psalm/psalm-baseline.xml
```

More details are provider [here](https://psalm.dev/docs/running_psalm/dealing_with_code_issues/#using-a-baseline-file).

## Other information

None

### Correlations

None

### Bugs

None

### License

See [LICENSE](./LICENSE) file in this repository.