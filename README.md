# Ace Client Plugin - Ver43

## How to Merge main to compatible/eccube43
- From `.git.dist/config` copy `[merge "keepTheirs"]`, `[merge "keepMine"]` to your local `.git/config`
- Override your local `.git/hooks/post-merge` by `.git.dist/hookds/post-merge`
- Run `git merge main`

## Due to a different Symfony version, please manually merge the following files
- `AceClient/Util/Serializer/SoapXmlSerializer.php`
- `AceClient/Util/Denormalizer/AsListDenormalizer.php`
- `AceClient/Util/Normalizer/AceDateTimeNormalizer.php`
- `AceClient/Util/Normalizer/PrmNormalizer.php`
- `AceClient/Util/Serializer/AceConfigSerializer.php`

## How to Test
- Run phpunit with configuration file `AceClient3/phpunit.xml.dist`
- Alternatively, merging from the main branch will trigger PHPUnit to run automatically via the `post-merge` hook.

## How to Release
- Release manually using the GitHub release feature.
- Triggering the release will activate the GitHub Actions workflow. After that, copy the `eccube_plugin-AceClient**.tar.gz` file to the ECCUBE store for release.
