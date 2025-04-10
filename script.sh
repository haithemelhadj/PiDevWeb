#!/bin/bash

# Get all entity names from the Entity directory
ENTITIES=$(ls src/Entity | sed 's/.php//')

# Loop through each entity and generate CRUD
for ENTITY in $ENTITIES; do
    echo "Generating CRUD for $ENTITY..."
    symfony console make:crud $ENTITY
done

echo "CRUD generation completed!"