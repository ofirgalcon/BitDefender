#!/bin/bash

# bitdefender controller
CTL="${BASEURL}index.php?/module/bitdefender/"

# Get the scripts in the proper directories
"${CURL[@]}" "${CTL}get_script/bitdefender.sh" -o "${MUNKIPATH}preflight.d/bitdefender.sh"

# Check exit status of curl
if [ $? = 0 ]; then
	# Make executable
	chmod a+x "${MUNKIPATH}preflight.d/bitdefender.sh"

	# Set preference to include this file in the preflight check
	setreportpref "bitdefender" "${CACHEPATH}bitdefender.txt"

else
	echo "Failed to download all required components!"
	rm -f "${MUNKIPATH}preflight.d/bitdefender.sh"

	# Signal that we had an error
	ERR=1
fi
