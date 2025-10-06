#!/bin/bash
set -e

# Generate random user and password
USER="user_$(openssl rand -hex 4)"
PASS="$(openssl rand -hex 16)"
DB="duplexdb"

# Store them in a file inside the container (not shared)
echo "POSTGRES_USER=$USER" > /run/secrets/db.env
echo "POSTGRES_PASSWORD=$PASS" >> /run/secrets/db.env
echo "POSTGRES_DB=$DB" >> /run/secrets/db.env

export POSTGRES_USER=$USER
export POSTGRES_PASSWORD=$PASS
export POSTGRES_DB=$DB

echo "🔐 Generated random Postgres credentials:"
echo "    USER: $USER"
echo "    PASSWORD: $PASS"
echo "    DB: $DB"

# Create SQL init script dynamically
cat <<EOF > /docker-entrypoint-initdb.d/init.sql
CREATE DATABASE $DB;
CREATE USER $USER WITH PASSWORD '$PASS';
GRANT ALL PRIVILEGES ON DATABASE $DB TO $USER;
EOF

exec docker-entrypoint.sh postgres
