# Welcome to Ace Client Plugin - Ver43

## Purpose of the two folders: `AceClient` and `AceClient43`
- The `AceClient` folder contains the final release version.
- The `AceClient43` folder is for the test version.

## How to Merge `main` to `compatible/eccube43`
1. Copy the `[merge "keepTheirs"]` and `[merge "keepMine"]` sections from `.git.dist/config` to your local `.git/config`.
2. Replace your local `.git/hooks/post-merge` with the version from `.git.dist/hooks/post-merge`.
3. Run `git merge main`.

## Manual Merging Due to Symfony Version Differences
Please manually merge the following files due to differences in the Symfony version
- `AceClient/Util/Serializer/SoapXmlSerializer.php`
- `AceClient/Util/Denormalizer/AsListDenormalizer.php`
- `AceClient/Util/Normalizer/AceDateTimeNormalizer.php`
- `AceClient/Util/Normalizer/PrmNormalizer.php`
- `AceClient/Util/Serializer/AceConfigSerializer.php`
- `AceClient/Controller/Admin/ConfigController.php`
- `AceClient/Entity/Config.php`
- `AceClient/Form/Type/Admin/ConfigType.php`
- `AceClient/Repository/ConfigRepository.php`
- `AceClient/Resource/config/*.yaml`

## How to Test
- Run phpunit with configuration file `AceClient3/phpunit.xml.dist`.
- Alternatively, merging from the main branch will trigger PHPUnit to run automatically via the `post-merge` hook.

## How to Release
1. After merge from `main`, release manually using the GitHub release feature.
2. Triggering the release will activate the GitHub Actions workflow. Afterward, copy the `eccube_plugin-AceClient**.tar.gz` file to the ECCUBE store for release.
