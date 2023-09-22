#!/bin/bash

# Main loop
while true
do
	# Resetting error status
        error=false

	# Going to the correct folder
	cd /upload/users/

	# Tar every folder
	find . -maxdepth 1 -mindepth 1 -type d -exec bash -c 'cd "$0" && echo "Tar $0" && rm -rf archive.tar && tar cf archive.tar *' {} \;
	# We cannot monitor errors here because they may be normal (users can break tar, it's a challenge target)

	# Sleep 3 minutes
	echo "Sleep"
	sleep 3m

	# Delete old folders
	echo "Del"
	rm  -rf -v /upload/users/*
	# Checking for errors
        if [ $? -ne 0 ]; then
                error=true
        fi

	# If there are no errors, create a file monitored by healthcheck
        if [ "$error" = false ] ; then
                touch /tmp/healthcheck_file
        fi

	# Sleep 3 minutes
        echo "Sleep"
        sleep 3m
done
