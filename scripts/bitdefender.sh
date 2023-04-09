#!/bin/sh

# Script to collect data
# and put the data into outputfile

CWD=$(dirname $0)
CACHEDIR="$CWD/cache/"
OUTPUT_FILE="${CACHEDIR}bitdefender.txt"
SEPARATOR=' = '

# Business logic goes here

# Get status
apiKey=`defaults read /Library/Preferences/com.galcon.bitdefender.plist YOUR_API_KEY 2>/dev/null` 
BitDefStatus=`/Library/Bitdefender/AVP/Product/bin/productConfigurationTool -authToken $apiKey -asksForStatus 2>/dev/null` || exit 0

# Extract the values
errorNum=$(echo "$BitDefStatus" | grep error | grep -o '[0-9]\+')
avEnabled=$(echo "$BitDefStatus" | awk -F '"' '/avEnabled/ {print $4}')
avSignaturesVersion=$(echo "$BitDefStatus" | awk -F '"' '/avSignaturesVersion/ {print $4}')
productVersion=$(echo "$BitDefStatus" | awk -F '"' '/productVersion/ {print $4}')
lastUpdateTime=$(echo "$BitDefStatus" | awk -F ':' '/lastUpdateTime/ {print $2}')

if [[ "${avEnabled}" == "YES" ]]; then
    av_enabled_boolean=1
else
    av_enabled_boolean=0
fi


###############################################################

# Output data here
echo "av_enabled${SEPARATOR}${av_enabled_boolean}" > ${OUTPUT_FILE}
echo "product_version${SEPARATOR}${productVersion}" >> ${OUTPUT_FILE}
echo "av_signature_version${SEPARATOR}${avSignaturesVersion}" >> ${OUTPUT_FILE}
echo "last_update${SEPARATOR}${lastUpdateTime}" >> ${OUTPUT_FILE}
echo "error_num${SEPARATOR}${errorNum}" >> ${OUTPUT_FILE}
