# Ace Client Plugin - Ver43

## How to Merge main to compatible/eccube43
- From `.git.dist/config` copy `[merge "keepTheirs"]`, `[merge "keepMine"]` to your local `.git/config`
- Override your local `.git/hooks/post-merge` by `.git.dist/hookds/post-merge`
- Run `git merge main`
