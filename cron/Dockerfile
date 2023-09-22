FROM ubuntu:latest

# Copy script
COPY script.sh /

# Chmod script.sh
RUN chmod 0555 /script.sh

# Switch user 
USER nobody

# Run the command on container startup
CMD ["/script.sh"]
