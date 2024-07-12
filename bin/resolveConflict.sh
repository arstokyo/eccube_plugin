#/bin/bash
# Author: Ars-Thong

mine=$1
theirs=$2
srcFilePath=$3
searchNamespace=AceClient
replaceNamespace=AceClient43

# overwrite mine file with theirs file
cp -f $theirs $mine 

pattern="(.*)(\/|\\\|^)(${searchNamespace})(\/|\\\)(.*)"
if [[ $srcFilePath =~ $pattern ]]; then
    # replace namespace to specific pattern
    sed -i -E "s/^namespace\s+Plugin\\\\${searchNamespace}\\\/namespace Plugin\\\\${replaceNamespace}\\\/i" $mine 
    sed -i -E "s/^use\s+Plugin\\\\${searchNamespace}\\\/use Plugin\\\\${replaceNamespace}\\\/i" $mine 

    testFilePath=$(sed -E "s/${pattern}/\1\2${replaceNamespace}\4\5/i" <<< ${srcFilePath})

    # copy the folder to destination folder if not exist
    if [[ ! -d $(dirname "$testFilePath") ]]; then
        cp -rf $(dirname "$srcFilePath") $(dirname "$testFilePath")
    fi

    # copy the file to destination folder
    cp -f $mine $testFilePath
fi

exit 0