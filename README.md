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

---

## How to Merge from modern AceClient (AceClient43) into our AceClient43 (preserve full history)

We import `app/Plugin/AceClient43` from the modern repository into this repo’s `app/Plugin/AceClient43` using `git subtree` on branch `compatible/eccube43`.

Prerequisites
- Working tree clean (no uncommitted changes).
- You can fetch the remote branch `origin/compatible/eccube43`.

Remote details
- Modern repo URL: `ar-system@ar-system.git.backlog.com:/BITSUHAN_ECCUBE43/eccube.git`
- Modern branch: `main`
- Modern path to import: `app/Plugin/AceClient43`

### One-time setup and initial import

1) Checkout the target branch
2) git fetch modern-aceclient --tags
3) git branch -f aceclient-split $(git subtree split --prefix=app/Plugin/AceClient43 modern-aceclient/merge/aceclient)
4) git stash
5) git subtree pull --prefix=app/Plugin/AceClient . aceclient-split -m "chore(aceclient): sync from modern repo"

